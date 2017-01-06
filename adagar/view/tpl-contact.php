<?php
    /* Template Name: CONTACTS */
    get_header();
    get_template_part("inc/header/banner");
?>

    <main class="main_container">
        <div class="wrapper">
            <div class="page_description">

                <div class="page_icon_decoration">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>

                <?php while( have_posts() ) : the_post(); ?>
                    <div class="wp_the_content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; wp_reset_query(); ?>

                <form class="adagar_contact_form">
                    <div class="form_row">
                        <div class="for_description">
                            **כל השדות חובה.
                        </div>
                    </div>
                    <div class="form_row">
                        <label for="full_name">* שם מלא:</label>
                        <input type="text" name="full_name" id="full_name" class="req">
                    </div>
                    <div class="form_row">
                        <label for="email">* אימייל:</label>
                        <input type="text" name="email" id="email" class="req">
                    </div>
                    <div class="form_row">
                        <label for="phone">* טלפון/נייד:</label>
                        <input type="text" name="phone" id="phone" class="req">
                    </div>
                    <div class="form_row">
                        <label for="subject">* נושא הפניה:</label>
                        <select name="subject" id="subject" class="req">
                            <option value="">נא לבחור נושא הפניה</option>
                            <option value="website">בניית אתר תדמיתי</option>
                            <option value="woocommerce">בניית חנות וירטואלית</option>
                            <option value="plugin development">פיתוח תוסף וורדפרס</option>
                            <option value="visual composer module development">פיתוח מודול ל-Visual Composer</option>
                            <option value="general question">שאלה כללית</option>
                        </select>
                    </div>
                    <div class="form_row">
                        <label for="message">תוכן ההודעה:</label>
                        <textarea name="message" id="message"></textarea>
                    </div>
                    <div class="form_row">
                        <input type="submit" value="שלח טופס">
                    </div>
                </form>

            </div>
        </div>
    </main>

<?php get_footer();?>
