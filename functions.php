<?php
/**
 * YCB Theme.
 *
 * @package   YCB
 * @link      https://seothemes.com/themes/ycb
 * @author    Seo Themes
 * @copyright Copyright © 2017 Seo Themes
 * @license   GPL-2.0+
 */

// Child theme (do not remove).
include_once( get_template_directory() . '/lib/init.php' );

// Define theme constants.
define( 'CHILD_THEME_NAME', 'YCB' );
define( 'CHILD_THEME_URL', 'https://ycb.vn' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

// Set Localization (do not remove).
load_child_theme_textdomain( 'ycb', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'ycb' ) );

// Remove unused sidebars and layouts.
unregister_sidebar( 'sidebar-alt' );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Reposition the primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
//add_action( 'genesis_header', 'genesis_do_nav' );

// Reposition footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_footer', 'genesis_footer_widget_areas', 6 );

// Genesis style trump.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Remove default page header.
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_posts_page_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_date_archive_title' );
remove_action( 'genesis_before_loop', 'genesis_do_blog_template_heading' );
remove_action( 'genesis_before_loop', 'genesis_do_taxonomy_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_author_title_description', 15 );
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
remove_action( 'genesis_before_loop', 'genesis_do_search_title' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

// Add custom page header.
add_action( 'genesis_after_header', 'genesis_do_posts_page_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_date_archive_title', 24 );
add_action( 'genesis_after_header', 'genesis_do_blog_template_heading', 24 );
add_action( 'genesis_after_header', 'genesis_do_taxonomy_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_author_title_description', 24 );
add_action( 'genesis_after_header', 'genesis_do_cpt_archive_title_description', 24 );

// Remove search results and shop page titles.
add_filter( 'woocommerce_show_page_title', '__return_null' );
add_filter( 'genesis_search_title_output', '__return_false' );

// Enable shortcodes in HTML widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Set portfolio image size to override plugin.
add_image_size( 'portfolio', 620, 380, true );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Add support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'footer-widgets',
	'footer',
) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

// Enable custom navigation menus.
add_theme_support( 'genesis-menus' , array(
	'primary' => __( 'Header Menu', 'ycb' ),
) );

// Enable support for footer widgets.
add_theme_support( 'genesis-footer-widgets', 4 );

// Enable viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

// Enable support for post formats.
add_theme_support( 'post-formats', array(
	'aside',
	'audio',
	'chat',
	'gallery',
	'image',
	'link',
	'quote',
	'status',
	'video',
) );

// Enable support for post thumbnails.
add_theme_support( 'post-thumbnails' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable support for WooCommerce.
add_theme_support( 'woocommerce' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background', array(
	'default-color' => 'f4f5f6',
) );

// Display custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 1 );

// Add support for custom logo.
add_theme_support( 'custom-logo', array(
	'width'       => 600,
	'height'      => 160,
	'flex-width' => true,
	'flex-height' => true,
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'ycb' ),
	),
) );

// Register custom layout.
genesis_register_layout( 'centered-content', array(
	'label' => __( 'Centered Content', 'ycb' ),
	'img'   => get_stylesheet_directory_uri() . '/assets/images/layout.gif',
) );

// Register before footer widget area.
genesis_register_sidebar( array(
	'id'          => 'before-footer',
	'name'        => __( 'Before Footer', 'ycb' ),
	'description' => __( 'This is the before footer widget area.', 'ycb' ),
) );

add_action( 'genesis_footer', 'business_before_footer_widget_area', 5 );
/**
 * Display before-footer widget area.
 *
 * @since 1.0.0
 *
 * @return void
 */
function business_before_footer_widget_area() {
	genesis_widget_area( 'before-footer', array(
		'before' => '<div class="before-footer"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

add_action( 'wp_enqueue_scripts', 'business_scripts_styles', 99 );
/**
 * Enqueue theme scripts and styles.
 *
 * @since  1.0.0
 *
 * @return void
 */
function business_scripts_styles() {

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Enqueue Google fonts.
	//wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:600|Hind:400', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:700|Roboto:300,500&amp;subset=latin-ext,vietnamese', array(), CHILD_THEME_VERSION );

	// Enqueue Line Awesome icon font.
	wp_enqueue_style( 'line-awesome', '//maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css', array(), CHILD_THEME_VERSION );

	// Enqueue WooCommerce styles conditionally.
	global $post;
	if ( class_exists( 'WooCommerce' ) && ( has_shortcode( $post->post_content, 'products' ) ||  has_shortcode( $post->post_content, 'sale_products' ) || is_woocommerce() || is_front_page() || is_shop() || is_product_category() || is_product_tag() || is_product() || is_cart() || is_checkout() || is_account_page() ) ) {
		wp_enqueue_style( 'ycb-woocommerce', get_stylesheet_directory_uri() . '/assets/styles/min/woocommerce.min.css', array(), CHILD_THEME_VERSION );
	}

	// Enqueue theme scripts.
	wp_enqueue_script( 'ycb', get_stylesheet_directory_uri() . '/assets/scripts/min/ycb.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Enqueue responsive menu script.
	wp_enqueue_script( 'ycb-menu', get_stylesheet_directory_uri() . '/assets/scripts/min/menus.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Localize responsive menus script.
	wp_localize_script( 'ycb-menu', 'genesis_responsive_menu', array(
		'mainMenu'         => __( 'Menu', 'ycb' ),
		'subMenu'          => __( 'Menu', 'ycb' ),
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
		),
	) );
}

// Load theme helper functions.
include_once( get_stylesheet_directory() . '/includes/helpers.php' );

// Load Customizer settings and output.
include_once( get_stylesheet_directory() . '/includes/customize.php' );

// Load default settings for the theme.
include_once( get_stylesheet_directory() . '/includes/defaults.php' );

// Load theme's recommended plugins.
include_once( get_stylesheet_directory() . '/includes/plugins.php' );


//* Remove the default header
remove_action( 'genesis_header', 'genesis_do_header' );


//* Add Site Title in custom header
add_action( 'genesis_header', 'ycb_do_header' );
function ycb_do_header() {
	
	if( function_exists( 'ubermenu' ) ) {
		ubermenu( 'main' , array( 'menu' => 16 ) );
		wp_enqueue_style( 'ycb-ubermenu', get_stylesheet_directory_uri() . '/ubermenu.css', array(), CHILD_THEME_VERSION );
	}

	genesis_markup( array(
			'html5'   => '<div %s>',
			'xhtml'   => '<div id="title-area">',
			'context' => 'title-area',
		) );
	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );
	echo '</div>';
	
	genesis_markup( array(
			'html5'   => '<aside %s>',
			'xhtml'   => '<div class="widget-area header-widget-area">',
			'context' => 'header-widget-area',
		) );

			do_action( 'genesis_header_right' );
			add_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			add_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );
			dynamic_sidebar( 'header-right' );
			remove_filter( 'wp_nav_menu_args', 'genesis_header_menu_args' );
			remove_filter( 'wp_nav_menu', 'genesis_header_menu_wrap' );

		genesis_markup( array(
			'html5' => '</aside>',
			'xhtml' => '</div>',
		) );

}

// Remove default stylesheet.
wp_deregister_style( 'ycb' );
wp_dequeue_style( 'ycb' );

// Load minified child theme stylesheet.
wp_register_style( 'ycb', get_stylesheet_directory_uri() . '/assets/styles/min/style.min.css', array(), CHILD_THEME_VERSION );
wp_enqueue_style( 'ycb' );

//Load custom css
wp_register_style( 'ycb-custom', get_stylesheet_directory_uri() . '/custom.css', array(), CHILD_THEME_VERSION );
wp_enqueue_style( 'ycb-custom' );

add_filter( 'genesis_seo_title', 'custom_header_inline_logo', 10, 3 );
/**
 * Add an image inline in the site title element for the logo
 *
 * @param string $title Current markup of title.
 * @param string $inside Markup inside the title.
 * @param string $wrap Wrapping element for the title.
 *
 * @author @_AlphaBlossom
 * @author @_neilgee
 * @author @_JiveDig
 * @author @_srikat
 */
function custom_header_inline_logo( $title, $inside, $wrap ) {
	// If the custom logo function and custom logo exist, set the logo image element inside the wrapping tags.
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$inside = sprintf( '<span class="screen-reader-text">%s</span>%s', esc_html( get_bloginfo( 'name' ) ), get_custom_logo() );
	} else {
		// If no custom logo, wrap around the site name.
		$inside	= sprintf( '<a href="%s">%s</a>', trailingslashit( home_url() ), esc_html( get_bloginfo( 'name' ) ) );
	}

	// Build the title.
	$title = genesis_markup( array(
		'open'    => sprintf( "<{$wrap} %s>", genesis_attr( 'site-title' ) ),
		'close'   => "</{$wrap}>",
		'content' => $inside,
		'context' => 'site-title',
		'echo'    => false,
		'params'  => array(
			'wrap' => $wrap,
		),
	) );

	return $title;
}

add_filter( 'genesis_attr_site-description', 'custom_add_site_description_class' );
/**
 * Add class for screen readers to site description.
 * This will keep the site description markup but will not have any visual presence on the page
 * This runs if there is a logo image set in the Customizer.
 *
 * @param array $attributes Current attributes.
 *
 * @author @_neilgee
 * @author @_srikat
 */
function custom_add_site_description_class( $attributes ) {
	if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) {
		$attributes['class'] .= ' screen-reader-text';
	}

	return $attributes;
}

add_filter( 'get_custom_logo', 'sk_custom_logo' );
/**
 * Filter the output of logo to add a custom class for the img element.
 *
 * @return string Custom logo markup.
 */
function sk_custom_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo style-svg',
                'itemprop' => 'logo',
            ) )
        );
    return $html;
}