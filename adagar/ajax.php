<?php
/****************************
    AJAX
****************************/
add_action( 'init', 'ajax_script_enqueuer' );

function ajax_script_enqueuer() {
   wp_register_script( "front_ajax", THEME.'/js/ajax.js', array('jquery') ); wp_enqueue_script( 'front_ajax' );
   wp_localize_script( 'front_ajax', 'ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
}

add_action("wp_ajax_send_contact_form", "send_contact_form");
add_action("wp_ajax_nopriv_send_contact_form", "send_contact_form");
function send_contact_form(){

    $response  = array();
    $full_name = isset($_POST['full_name']) ? sanitize_text_field($_POST['full_name']) : '';
    $email     = isset($_POST['email']) ? sanitize_text_field($_POST['email']) : '';
    $phone     = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $subject   = isset($_POST['subject']) ? sanitize_text_field($_POST['subject']) : '';
    $content   = isset($_POST['message']) ? sanitize_text_field($_POST['message']) : '';

    if( $full_name && $email && $phone && $subject ) {

        $to      = 'adagarweb@gmail.com';

        $subject = $subject;

        $message = '<html><body style="direction:rtl; text-align:right;">';
            $message .= '<h4>פרטי משתמש</h4>';
            $message .= '<p>שם מלא: '.$full_name.'</p>';
            $message .= '<p>אימייל: '.$email.'</p>';
            $message .= '<p>טלפון: '.$phone.'</p>';
            $message .= '<p>נושא: '.$subject.'</p>';
            $message .= '<p>תוכן ההודעה: '.$content.'</p>';
            $message .= '<h4>פרטים נוספים:</p>';
            $message .= '<p style="direction:ltr;">'. $_SERVER['HTTP_X_FORWARDED_FOR'] .'</p>';
            $message .= '<p style="direction:ltr;">'. $_SERVER['REMOTE_ADDR']. '</p>';
            $message .= '<p style="direction:ltr;">'. date('d/m/Y H:i:s') . '</p>';
        $message .= '</body></html>';

        $headers = "From: " . strip_tags($email) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        //wp_mail($to, $subject, $message, $headers);
        $response['status'] = 'done';
        $response['message'] = 'הודעה נשלחה בהצלחה. תודה.';
    }

    echo json_encode($response);

    die();

}

add_action("wp_ajax_load_step", "load_step");
add_action("wp_ajax_nopriv_load_step", "load_step");
function load_step(){
    $next_step            = isset($_POST['next']) ? sanitize_text_field( $_POST['next'] )       : '';
    $post_id              = isset($_POST['post_id']) ? sanitize_text_field( $_POST['post_id'] ) : '';
    $response             = array();
    $response['redirect'] = 0;
    ob_start();
        set_query_var('args',$post_id);
        get_template_part("inc/steps/step-".$next_step);
    $response['html'] = ob_get_clean();

    if( $next_step == 6 ){
        $response['redirect'] = get_permalink(84);
    }

    echo json_encode($response);

    die();
}
