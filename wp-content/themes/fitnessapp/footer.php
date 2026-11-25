    <footer>
        <div class="wrapper">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="footer_logo">
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

            <div class="footer_links">
                <a href="<?php echo esc_url(get_theme_mod('fitnessapp_tg_url', '#')); ?>" class="footer_tg" target="_blank" rel="noopener noreferrer">
                    <span>TG</span>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('fitnessapp_vk_url', '#')); ?>" class="footer_vk" target="_blank" rel="noopener noreferrer">
                    <span>VK</span>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('fitnessapp_ig_url', '#')); ?>" class="footer_ig" target="_blank" rel="noopener noreferrer">
                    <span>IG</span>
                </a>
            </div>

            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>

</html>
