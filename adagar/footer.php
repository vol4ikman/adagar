<?php
if( is_home() || is_front_page() ){
    get_template_part("inc/footer/contacts");
}
?>

    <footer class="footer" role="contentinfo">

        <div class="footer_inner">
            <div class="wrapper">
                <div class="row">
                    <div class="footer_right_column">

                    </div>
                    <div class="footer_left_column">

                    </div>
                </div>
                <div class="row">
                    <div class="footer_credits">
                        All Rights Reserved to ADAGAR 2011-<?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>

    </footer><!-- /footer -->

</div><!-- /adagar_website_container -->

<?php get_template_part("inc/loader"); ?>

<?php if( !is_home() ) : ?>
    <nav class="hidden_desktop_nav" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => false ) ); ?>
        <div class="menu_socials">
            <?php get_template_part("inc/social"); ?>
        </div>
    </nav>
<?php endif; ?>

<?php wp_footer(); ?>

</body>

</html>
