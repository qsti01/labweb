<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <header>
        <div class="wrapper">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header_logo">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_src = '';
                if ($custom_logo_id) {
                    $logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if ($logo_data) {
                        $logo_src = $logo_data[0];
                    }
                }
                if (empty($logo_src)) {
                    $logo_src = get_template_directory_uri() . '/assets/logo.svg';
                }
                ?>
                <img src="<?php echo esc_url($logo_src); ?>" alt="<?php bloginfo('name'); ?>">
                <p><?php bloginfo('name'); ?></p>
            </a>

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => 'nav',
                'container_class'=> 'header_nav',
                'container_id'   => 'header-nav',
                'fallback_cb'    => 'fitnessapp_default_header_nav',
            ));
            ?>

            <div class="header_actions">
                <a href="<?php echo esc_url(home_url('/#connect')); ?>" class="green-button header_button">
                    <span>Оставить заявку</span>
                </a>
                <button class="header_burger" id="burger-btn" aria-label="Открыть меню">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
