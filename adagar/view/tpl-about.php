<?php
    /* Template Name: ABOUT */
    get_header();
    get_template_part("inc/header/banner");
?>

    <main class="main_container">
        <div class="wrapper">
            <div class="page_description">

                <?php while( have_posts() ) : the_post(); ?>
                    <div class="wp_the_content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    </main>

<?php get_footer();?>
