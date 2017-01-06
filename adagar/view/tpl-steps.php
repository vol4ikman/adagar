<?php
    /* Template Name: Steps */
    get_header();
    get_template_part("inc/header/banner");
    $steps = get_field('steps');
?>

<main class="main_container step_sections">

    <?php if( have_posts() ): ?>
        <section class="section description">
            <div class="wrapper">

                <?php while( have_posts() ): the_post(); ?>
                    <div class="wp_the_content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if($steps): ?>
        <section class="section">
            <div class="step_section_inner">
                <div class="wrapper ajax_wrapper">
                    <div class="progress-bar-container">
                        <div class="progress-wrap progress" data-progress-percent="20">
                            <div class="progress-bar progress"></div>
                        </div>
                    </div>
                    <div class="steps_ajax"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
