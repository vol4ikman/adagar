<?php
    /* Template Name: HOMEPAGE */
    get_header();
?>

<main class="main_container fullheight">
    <table class="fullheight_table">
        <tr>
            <td>
                <div class="wrapper">
                    <div class="home_fullscreen">
                        <div class="row">
                            <div class="left_side">
                                <div class="side_inner">
                                    <h1><span>ADAGAR</span></h1>
                                    <h2><span class="white">Creative Web</span> <span class="yellow">Solutions</span></h2>
                                    <div class="home_creative_description">
                                        <?php while( have_posts() ): the_post(); ?>
                                            <?php the_content(); ?>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="right_side">
                                <div class="side_inner">
                                    <div class="adagar_logo">
                                        <img src="<?php echo THEME; ?>/images/adagar-logo-full.png" alt="Adagar - Creative Web Solutions" />
                                    </div>
                                    <div class="home_buttons clear">
                                        <?php wp_nav_menu( array( 'theme_location' => 'home-menu', 'container' => false ) ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</main>

<?php get_footer('empty'); ?>
