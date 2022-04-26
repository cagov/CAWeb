<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'GENERATE_VERSION', '3.1.0' );

if ( ! function_exists( 'cagov_setup' ) ) {
	add_action( 'after_setup_theme', 'cagov_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function cagov_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		$color_palette = cagov_get_editor_color_palette();

		if ( ! empty( $color_palette ) ) {
			add_theme_support( 'editor-color-palette', $color_palette );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height' => 70,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			)
		);

		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'generatepress' ),
			)
		);

		/**
		 * Set the content width to something large
		 * We set a more accurate width in cagov_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'assets/css/admin/editor-style.css' );
	}
}


/**
 * Walker menu
 */
class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		 if (array_search('menu-item-has-children', $item->classes)) {
			  $output .= sprintf("\n<li class='expanded-menu-col js-cagov-navoverlay-expandable expanded-menu-section %s'><div class='expanded-menu-section'><strong class='expanded-menu-section-header'><button href='%s' class=\"expanded-menu-section-header-link js-event-hm-menu\" data-toggle=\"dropdown\" >%s <span class='expanded-menu-section-header-arrow'>
			  <svg width='11' height='7' class='expanded-menu-section-header-arrow-svg' viewBox='0 0 11 7' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M1.15596 0.204797L5.49336 5.06317L9.8545 0.204797C10.4293 -0.452129 11.4124 0.625368 10.813 1.28143L5.90083 6.82273C5.68519 7.05909 5.32606 7.05909 5.1342 6.82273L0.174341 1.28143C-0.400433 0.6245 0.581838 -0.452151 1.15661 0.204797H1.15596Z' />
			  </svg></span></button></strong></div>\n", ( array_search('current-menu-item', $item->classes) || array_search('current-page-parent', $item->classes) ) ? 'active' : '', $item->url, $item->title
			  );
		 } else {
			  $output .= sprintf("\n<li class='expanded-menu-col js-cagov-navoverlay-expandable %s'><div class='expanded-menu-section'><strong class='expanded-menu-section-header'><a class='expanded-menu-section-header-link js-event-hm-menu' href='%s'>%s</a></strong></div>\n", ( array_search('current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title
			  );
		 }
	}

	function start_lvl(&$output, $depth) {
		 $indent = str_repeat("\t", $depth);
		 $output .= "\n$indent<ul class=\"expanded-menu-dropdown\" role=\"menu\">\n";
	}
}


add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( 'generate-style' );
	wp_deregister_style( 'generate-widget-areas' );
}

function my_deregister_javascript() {
	wp_deregister_script( 'generate-menu' );
	wp_deregister_script( 'generate-dropdown-click' );
	wp_deregister_script( 'generate-navigation-search' );
	wp_deregister_script( 'generate-back-to-top' );
	wp_deregister_script( 'comment-reply' );
	wp_deregister_script( 'generate-classlist' );
}

/* REMOVE JQUERY */
add_action('wp_enqueue_scripts', 'no_more_jquery');
function no_more_jquery(){
wp_deregister_script('jquery');
}


function theme_styles()  
{ 

	// Load all of the styles that need to appear on all pages
	wp_enqueue_style( 'main', get_stylesheet_directory_uri(). '/style.css' );
	wp_enqueue_style( 'custom', get_stylesheet_directory_uri(). '/css/ds-cagov.css' );

	// Conditionally load the FlexSlider CSS on the homepage
	if(is_page('home')) {
		wp_enqueue_style('flexslider');
	}

}
add_action('wp_enqueue_scripts', 'theme_styles');



/**
 * Get all necessary theme files
 */
$theme_dir = get_template_directory();

require $theme_dir . '/inc/theme-functions.php';
require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/class-css.php';
require $theme_dir . '/inc/css-output.php';
require $theme_dir . '/inc/general.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/markup.php';
require $theme_dir . '/inc/typography.php';
require $theme_dir . '/inc/plugin-compat.php';
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/class-typography.php';
require $theme_dir . '/inc/class-typography-migration.php';
require $theme_dir . '/inc/class-html-attributes.php';
require $theme_dir . '/inc/class-theme-update.php';
require $theme_dir . '/inc/class-rest.php';
require $theme_dir . '/inc/deprecated.php';

if ( is_admin() ) {
	require $theme_dir . '/inc/meta-box.php';
	require $theme_dir . '/inc/class-dashboard.php';
}

/**
 * Load our theme structure
 */
require $theme_dir . '/inc/structure/archives.php';
require $theme_dir . '/inc/structure/comments.php';
require $theme_dir . '/inc/structure/featured-images.php';
require $theme_dir . '/inc/structure/footer.php';
require $theme_dir . '/inc/structure/header.php';
// require $theme_dir . '/inc/structure/navigation.php';
require $theme_dir . '/inc/structure/post-meta.php';
require $theme_dir . '/inc/structure/sidebars.php';
