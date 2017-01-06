<?php
get_template_part("ajax");
// Load styles
function adagar_theme_styles(){
    wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), NULL, 'all'); wp_enqueue_style('font-awesome');
    wp_register_style('normalize', THEME . '/css/normalize.css', array(), NULL, 'all'); wp_enqueue_style('normalize');
    wp_register_style('adagar-style', THEME . '/css/style.css', array(), NULL, 'all'); wp_enqueue_style('adagar-style');
    wp_register_style('responsive', THEME . '/css/responsive.css', array(), NULL, 'all'); wp_enqueue_style('responsive');
}
add_action('wp_enqueue_scripts', 'adagar_theme_styles');

// Load scripts
function adagar_theme_scripts() {
    wp_register_script( 'vide', THEME . '/js/vide.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'vide' );
    wp_register_script( 'waypoints', THEME . '/js/jquery.waypoints.min.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'waypoints' );
	wp_register_script( 'scripts', THEME . '/js/scripts.js', array( 'jquery' ), NULL, true ); wp_enqueue_script( 'scripts' );
}
add_action( 'wp_enqueue_scripts', 'adagar_theme_scripts' );

if ( ! function_exists( 'add_body_class' ) ){
    function add_body_class( $classes ) {
        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
        if( $is_lynx ) $classes[] = 'lynx';
        elseif( $is_gecko ) $classes[] = 'gecko';
        elseif( $is_opera ) $classes[] = 'opera';
        elseif( $is_NS4 ) $classes[] = 'ns4';
        elseif( $is_safari ) $classes[] = 'safari';
        elseif( $is_chrome ) $classes[] = 'chrome';
        elseif( $is_IE ) {
            $classes[] = 'ie';
            if( preg_match( '/MSIE ( [0-11]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) )
            $classes[] = 'ie' . $browser_version[1];
        } else $classes[] = 'unknown';
        if( $is_iphone ) $classes[] = 'iphone';

        if ( stristr( $_SERVER['HTTP_USER_AGENT'],"mac") ) {
                 $classes[] = 'osx';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"linux") ) {
                 $classes[] = 'linux';
        } elseif ( stristr( $_SERVER['HTTP_USER_AGENT'],"windows") ) {
                 $classes[] = 'windows';
        }
        if (defined('LANG')){
            $classes[] = 'lang-'.LANG;
        }
        $classes[] = 'adagar_website';
        return $classes;
    }
    add_filter( 'body_class','add_body_class' );
}
// Add Theme Stylesheet To ADMIN
add_action('admin_enqueue_scripts', 'adagar_admin_theme_styles');
function adagar_admin_theme_styles(){
    wp_register_style('admin-style', THEME . '/admin/css/style.css', array(), NULL, 'all'); wp_enqueue_style('admin-style');
}


// Register THEME Navigation
function register_adagar_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu','adagar' ),
            'home-menu' => __( 'Home Menu','adagar' )
        )
    );
}
add_action( 'init', 'register_adagar_menus' );

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images
// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

/*****************************************
**  Define
*****************************************/
if( !defined('THEME') ){
    define("THEME", get_template_directory_uri());
}

if( !defined('TEMPLATEPATH') ) {
    define( 'TEMPLATEPATH', get_template_directory() );
}
/*****************************************
**  Languages
*****************************************/
add_action('after_setup_theme', 'qstheme_textdomain');
function qstheme_textdomain(){
    load_theme_textdomain('qstheme', THEME . '/languages');
}

add_filter('show_admin_bar', '__return_false');
