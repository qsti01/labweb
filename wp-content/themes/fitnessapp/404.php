<?php
get_header();
?>

    <main class="site-main page-404">
        <div class="wrapper">
            <div class="error-404-container">
                <h1 class="error-code">404</h1>
                <h2>Страница не найдена</h2>
                <p>К сожалению, запрашиваемая страница не существует или была перемещена.</p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="green-button">
                    <span>Вернуться на главную</span>
                </a>
            </div>
        </div>
    </main>

<?php
get_footer();
