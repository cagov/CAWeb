<?php
/**
 * The template for displaying the header.
 *
 * @package cagov-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php cagov_do_microdata( 'body' ); ?>>
	<?php
	/**
	 * wp_body_open hook.
	 *
	 * @since 2.3
	 */
	do_action( 'wp_body_open' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound -- core WP hook.

	/**
	 * cagov_before_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked cagov_do_skip_to_content_link - 2
	 * @hooked cagov_top_bar - 5
	 * @hooked cagov_add_navigation_before_header - 5
	 */
	do_action( 'cagov_before_header' );

	/**
	 * cagov_header hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked cagov_construct_header - 10
	 */
	do_action( 'cagov_header' );

	/**
	 * cagov_after_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked cagov_featured_page_header - 10
	 */
	do_action( 'cagov_after_header' );
	?>

	<div id="page-container" class="page-container-ds">
		<?php
		/**
		 * cagov_inside_site_container hook.
		 *
		 * @since 2.4
		 */
		do_action( 'cagov_inside_site_container' );
		?>
		<div id="main-content" class="main-content-ds">
			<?php
			/**
			 * cagov_inside_container hook.
			 *
			 * @since 0.1
			 */
			do_action( 'cagov_inside_container' );
