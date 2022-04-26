<?php

/**
 * cagov theme
 * This theme is a child theme of cagov-wp-theme, a performant WordPress theme.
 * We hope to create a parent theme out of this. 
 * If that's going to be useful to you, please reach out on Github.
 *
 * @package ca-design-system
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

// Set our theme version.
define('CAGOV_THEME__VERSION', '1.0.1');
define('CAGOV_THEME__DIR_PATH', plugin_dir_path(__FILE__));

/** Remove all Generate Press CSS */
// function cagov_deregister_styles()
// {

// }

// add_action('wp_print_styles', 'cagov_deregister_styles', 100);

/* Remove unnecessary cagov-wp-theme code.  */
function cagov_deregister_javascript()
{
	/* Remove jQuery */
	wp_deregister_script('jquery');
}
add_action('wp_print_scripts', 'cagov_deregister_javascript', 100);
add_action('wp_enqueue_scripts', 'cagov_deregister_javascript');

// Load Design System stylesheets
function theme_styles()
{
	// Load all of the styles that need to appear on all pages
	// wp_enqueue_style('main', get_stylesheet_directory_uri() . '/style.css');

	// Load setting from theme settings.
	$cagov_color_theme_setting = get_theme_mod('cagov_color_theme', 'cagov');
	$cagov_color_theme = "" !== $cagov_color_theme_setting ? $cagov_color_theme_setting : "cagov";

	// REFERENCE: toggle back to stylesheets (good for development, but not performance)
	// wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/css/' . $cagov_color_theme . '.1_0_3.css');
	// wp_enqueue_style('cagov-navigation', get_stylesheet_directory_uri() . '/css/ds-cagov-navigation.css');

	// @TODO Faster, lighter loading? 
	// @TODO reconnect with CDN code after we document the process.
	// $css_theme_colors = file_get_contents( get_stylesheet_directory_uri() . '/css/' . $cagov_color_theme . '.1_0_3.css');


	// Local build
	$css_theme_colors = file_get_contents(get_stylesheet_directory_uri() . '/components/design-system-dist-manager/build/cagov.css');
	try {
		$css_theme_colors = file_get_contents(get_stylesheet_directory_uri() . '/components/design-system-dist-manager/build/' . $cagov_color_theme . '.css');
	} catch (Exception $e) {
	} finally {
	}

	// Warning: file_get_contents(https://dev-cannabis-ca-gov.pantheonsite.io/wp-content/themes/cagov-wp-theme/components/design-system-dist-manager/build/cannabis.css): failed to open stream: HTTP request failed! HTTP/1.1 404 Not Found in /code/wp-content/themes/cagov-wp-theme/functions.php on line 56

	$css_navigation = file_get_contents(get_stylesheet_directory_uri() . '/css/ds-cagov-navigation.css');

	echo '<style>' . $css_theme_colors . $css_navigation . '</style>';

	// Debugging CSS
	
	// wp_enqueue_style('cagov-5-5', get_stylesheet_directory_uri() . '/css/cagov_5_5.css');
	// wp_enqueue_style('cagov-merge', get_stylesheet_directory_uri() . '/css/merge.css');
	// wp_enqueue_style('cagov-5-5', get_stylesheet_directory_uri() . '/css/manual.css');

	// @QUESTION: what's this for?
	// Conditionally load the FlexSlider CSS on the homepage
	if (is_page('home')) {
		wp_enqueue_style('flexslider');
	}
}

add_action('wp_enqueue_scripts', 'theme_styles');

/**
 * Add local javascript
 * @TODO (for parent theme version of this theme) - Remember to reserve some CSS/JS slots for pre-design system components so that agencies and partners can prototype new UI interfaces and then suggest them to the design system. - CS 12/07/2021
 *
 * @return void
 */
function cagov_header_scripts()
{
	/* Register cagov scripts */

	// Twitter timeline
	wp_register_script('twitter-timeline', 'https://platform.twitter.com/widgets.js', array(), '1.0.1', false);

	wp_enqueue_script('twitter-timeline');

    wp_register_script(
        'cagov-wp-theme-custom-js',
        get_stylesheet_directory_uri() . '/js/custom.js',
        array()
    );

	wp_enqueue_script('cagov-wp-theme-custom-js');

}
add_action('wp_enqueue_scripts', 'cagov_header_scripts');

/* Add theme UI code, most of which is based off GeneratePress, but renamed */
require_once CAGOV_THEME__DIR_PATH . '/inc/theme_functions.php';
require_once CAGOV_THEME__DIR_PATH . '/inc/defaults.php';
// require_once CAGOV_THEME__DIR_PATH . '/inc/structure/navigation.php';
require_once CAGOV_THEME__DIR_PATH . '/inc/structure/sidebars.php';

/** Add includes. 
 * These correspond do different sections of the design system layout.
 */

register_nav_menu('content-menu', __('Content Footer Menu'));
register_nav_menu('social-media-links', __('Social Media Links'));
register_nav_menu('statewide-footer-menu', __('Statewide Footer Menu'));


/**
 * CADesignSystem Page/Post Templates
 * Adds CADesignSystem page/post templates.
 *
 * @category add_filter( 'theme_page_templates', 'cagov_register_page_post_templates', 20 );
 * @link https://developer.wordpress.org/reference/hooks/theme_page_templates/
 * @param  array $theme_templates Array of page templates. Keys are filenames, values are translated names.
 *
 * @return array
 */
function cagov_register_page_post_templates($theme_templates)
{
    return array_merge($theme_templates, cagov_get_page_post_templates());
}


/**
 * Return templates located in the plugins templates folder.
 *
 * @return array
 */
function cagov_get_page_post_templates() {
	$templates = array();

	foreach ( glob( 
        CAGOV_THEME__DIR_PATH . 'templates/pantheon/*.php' ) as $file ) {
		// Gets Template Name from the file.
		$filedata = get_file_data(
			$file,
			array(
				'Template Name' => 'Template Name',
				'Template Post Type' => 'Template Post Type',
                'Template Machine Name' => 'Template Machine Name',
			)
		);

		$templates[ $filedata['Template Machine Name'] ] = $filedata['Template Name'];
	}

	return $templates;
}


add_filter('theme_page_templates', 'cagov_register_page_post_templates', 20); // @NOTE: this is disabled in the plugin - toggle between these if you need the templates to be agnostic to the theme (which could happen - the templates are used as data in headless and themes are not really meant to act as data - we are building a headless/monolith hybrid system, so this matters.)

// In order of appearance on page
require_once CAGOV_THEME__DIR_PATH . '/includes/statewide-header.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/logo.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/branding.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/navigation.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/breadcrumb.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/content-navigation.php';
// require_once CAGOV_THEME__DIR_PATH . '/includes/categories.php';
// require_once CAGOV_THEME__DIR_PATH . '/includes/agency-footer.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/statewide-footer.php';
// require_once CAGOV_THEME__DIR_PATH . '/includes/page-template.php';
require_once CAGOV_THEME__DIR_PATH . '/includes/site-options.php';
// require_once CAGOV_THEME__DIR_PATH . '/includes/rest-api-site-options.php';
