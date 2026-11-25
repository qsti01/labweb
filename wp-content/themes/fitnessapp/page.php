<?php
get_header();
?>

    <main class="site-main page-template">
        <div class="wrapper">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
                    <header class="page-header">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="page-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">Страницы: ',
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </main>

<?php
get_footer();
