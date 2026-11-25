<?php
if (!defined('ABSPATH')) exit;

function fitnessapp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    register_nav_menus(array(
        'primary' => 'Главное меню',
    ));
    fitnessapp_create_leads_table();
}
add_action('after_setup_theme', 'fitnessapp_setup');

function fitnessapp_scripts() {
    wp_enqueue_style('fitnessapp-fonts', 'https://fonts.googleapis.com/css2?family=Carlito:ital,wght@0,400;0,700;1,400;1,700&family=Dela+Gothic+One&display=swap', array(), null);
    wp_enqueue_style('fitnessapp-style', get_stylesheet_uri(), array('fitnessapp-fonts'), '1.0.0');
    wp_enqueue_script('fitnessapp-main', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

    wp_localize_script('fitnessapp-main', 'fitnessapp_ajax', array(
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('fitnessapp_lead_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'fitnessapp_scripts');

function fitnessapp_default_header_nav() {
    echo '<ul class="header_nav">';
    echo '<li><a href="' . esc_url(home_url('/#functions')) . '">Возможности</a></li>';
    echo '<li><a href="' . esc_url(home_url('/#how')) . '">Как это работает</a></li>';
    echo '<li><a href="' . esc_url(home_url('/#faq')) . '">FAQ</a></li>';
    echo '</ul>';
}

function fitnessapp_create_leads_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fitnessapp_leads';
    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        email varchar(255) NOT NULL,
        source varchar(50) DEFAULT 'landing' NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $wpdb->query($sql);
}

function fitnessapp_ajax_submit_lead() {
    check_ajax_referer('fitnessapp_lead_nonce', 'nonce');

    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $source = isset($_POST['source']) ? sanitize_text_field($_POST['source']) : 'Главная';

    if (!is_email($email)) {
        wp_send_json_error(array('message' => 'Некорректный email'));
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'fitnessapp_leads';

    $existing = $wpdb->get_var($wpdb->prepare("SELECT id FROM $table_name WHERE email = %s", $email));
    if ($existing) {
        wp_send_json_success(array('message' => 'Вы уже есть в списке ожидания!'));
    }

    $wpdb->insert(
        $table_name,
        array(
            'email'      => $email,
            'source'     => $source,
            'created_at' => current_time('mysql'),
        )
    );

    wp_send_json_success(array('message' => 'Спасибо! Вы успешно добавлены в список ожидания.'));
}
add_action('wp_ajax_fitnessapp_submit_lead', 'fitnessapp_ajax_submit_lead');
add_action('wp_ajax_nopriv_fitnessapp_submit_lead', 'fitnessapp_ajax_submit_lead');

function fitnessapp_add_leads_admin_menu() {
    add_menu_page(
        'Заявки',
        'Заявки',
        'manage_options',
        'fitnessapp-leads',
        'fitnessapp_render_leads_admin_page',
        'dashicons-email-alt',
        25
    );
}
add_action('admin_menu', 'fitnessapp_add_leads_admin_menu');

function fitnessapp_render_leads_admin_page() {
    if (!current_user_can('manage_options')) return;

    global $wpdb;
    $table_name = $wpdb->prefix . 'fitnessapp_leads';
    $leads = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");
    ?>
    <div class="wrap">
        <h1>Заявки с сайта</h1>
        <table class="wp-list-table widefat fixed striped" style="margin-top: 15px; max-width: 850px;">
            <thead>
                <tr>
                    <th style="width: 50px;">ID</th>
                    <th>Email</th>
                    <th style="width: 180px;">Источник</th>
                    <th style="width: 160px;">Дата</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($leads)) : ?>
                    <tr>
                        <td colspan="4" style="text-align: center; color: #888;">Заявок пока нет</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($leads as $lead) : ?>
                        <tr>
                            <td><?php echo esc_html($lead->id); ?></td>
                            <td><strong><?php echo esc_html($lead->email); ?></strong></td>
                            <td><?php echo esc_html($lead->source); ?></td>
                            <td><?php echo esc_html(date('d.m.Y H:i', strtotime($lead->created_at))); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
