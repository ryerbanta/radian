<?php
/**
 * radian functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package radian
 */

if ( ! function_exists( 'radian_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function radian_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on radian, use a find and replace
		 * to change 'radian' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'radian', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'radian' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'radian_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'radian_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function radian_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'radian_content_width', 640 );
}
add_action( 'after_setup_theme', 'radian_content_width', 0 );

function radian_get_blog_posts_page_url() {
    // If front page is set to display a static page, get the URL of the posts page.
    if ( 'page' === get_option( 'show_on_front' ) ) {
        return get_permalink( get_option( 'page_for_posts' ) );
    }
    // The front page IS the posts page. Get its URL.
    return get_home_url();
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function radian_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'radian' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'radian' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'radian_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function radian_scripts() {

    wp_enqueue_style('radian-font', 'https://fonts.googleapis.com/css?family=Roboto:300,400' );
	wp_enqueue_style( 'radian-style', get_template_directory_uri() . '/public/radian.css' );
	wp_enqueue_script( 'radian-scripts', get_template_directory_uri() . '/public/radian.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'radian_scripts' );

/**
 * We need to add our bootstrap class to WordPress-generated menus.
 */
function radian_menu_item_class ( $classes, $item, $args, $depth ){
    $classes[] = 'nav-item';
    return $classes;
}
add_filter ( 'nav_menu_css_class', 'radian_menu_item_class', 10, 4 );

/**
 * We need to add yet another Bootstrap class to links generated in WP Menus.
 */
function radian_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link ' . ($item->current ? 'active' : '');
    $atts['class'] = $class;
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'radian_menu_add_class', 10, 3 );

function createButton($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => "",
        'class' => "",
        'href' => "",
    ), $atts));
    return '<a id="'. $id . '" class="btn btn-primary '. $class . '" href="' . $href . '" />' . $content . '</a>';
}
add_shortcode('button', 'createButton');

function createLead($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => "",
        'class' => "",
    ), $atts));
    return '<p id="'. $id . '" class="lead '. $class . '" />' . $content . '</p>';
}
add_shortcode('lead', 'createLead');

function createSection($atts, $content = null) {
    extract(shortcode_atts(array(
        'id' => "",
        'class' => "",
        'title' => "",
    ), $atts));
    $content = wpautop(trim($content));
    return '<section id="'. $id . '" class="mb-5 mt-5 pb-5 pt-5 '. $class . '" title="' . $title .'"/>' . do_shortcode($content) . '</section>';
}
add_shortcode('section', 'createSection');

function embedSearch($atts) {
    extract(shortcode_atts(array(), $atts));
    $content = '<form action="/" class="d-flex justify-content-center form mb-4 mt-3" method="get" role="form"><div class="col-md-8 col-lg-6 d-flex form-group p-md-0">
            <label for="s" class="sr-only">Search resources</label>
            <input class="col form-control form-control-lg mr-3" id="s" name="s" placeholder="What kind of resource are you looking for?" type="search">
            <button class="btn btn-primary" type="submit">Find</button></div></form>';
    $content = wpautop(trim($content));
    return $content;
}
add_shortcode('search', 'embedSearch');

function embedTeam($atts, $content = null)
{
    extract(shortcode_atts(array(), $atts));
    return '<div class="radian__team row">' . do_shortcode($content) . '</div>';
}
add_shortcode('team', 'embedTeam');

function embedTeamMember($atts) {
    extract(shortcode_atts(array(
        'email' => '',
        'name' => '',
        'title' => '',
        'size' => '512',
    ), $atts));
    $content = '<div class="col-6 col-md-4 p-0 text-center"><div class="radian__team__member__image p-4">' . get_avatar($email, $size) . '</div><h3 class="col-12 h6 m-0 p-0 radian__team__member__name">' . $name . '</h3><p class="col-12 m-0 p-0 radian__team__member__title small">' . $title . '</p></div>';
    return $content;
}
add_shortcode('team-member', 'embedTeamMember');

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);

function radian_remove_dimensions_from_avatars($avatar)
{
    $avatar = preg_replace("/(width|height)=\'\d*\'\s/", "", $avatar);
    return $avatar;
}
add_filter('get_avatar', 'radian_remove_Dimensions_from_avatars', 10);


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/resources/templates/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/resources/templates/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/resources/templates/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/resources/templates/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/resources/templates/jetpack.php';
}

