<?php
get_header();
?>

    <main class="site-main index-template">
        <div class="wrapper">
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    if (is_home() && !is_front_page()) {
                        single_post_title();
                    } elseif (is_archive()) {
                        the_archive_title();
                    } elseif (is_search()) {
                        echo 'Результаты поиска: ' . get_search_query();
                    } else {
                        echo 'Записи';
                    }
                    ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>
                <div class="posts-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="post-meta">
                                <span class="post-date"><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="green-button read-more-btn">
                                <span>Читать далее</span>
                            </a>
                        </article>
                    <?php endwhile; ?>
                </div>

                <div class="pagination">
                    <?php the_posts_pagination(array(
                        'prev_text' => '&laquo; Назад',
                        'next_text' => 'Вперед &raquo;',
                    )); ?>
                </div>
            <?php else : ?>
                <div class="no-posts">
                    <p>Ничего не найдено.</p>
                </div>
            <?php endif; ?>
        </div>
    </main>

<?php
get_footer();
