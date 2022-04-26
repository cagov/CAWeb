<?php
/**
 * The template for displaying 404 pages.
 *
 * @package cagov-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="inside-article">

	<?php
	/**
	 * cagov_before_content hook.
	 *
	 * @since 0.1
	 *
	 * @hooked cagov_featured_page_header_inside_single - 10
	 */
	do_action( 'cagov_before_content' );
	?>

	<header class="entry-header">
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- HTML is allowed in filter here. ?>
		<h1 class="entry-title" itemprop="headline"><?php echo apply_filters( 'cagov_404_title', __( 'Oops! That page can&rsquo;t be found.', 'cagov_wp_theme' ) ); ?></h1>
	</header>

	<?php
	/**
	 * cagov_after_entry_header hook.
	 *
	 * @since 0.1
	 *
	 * @hooked cagov_post_image - 10
	 */
	do_action( 'cagov_after_entry_header' );

	$itemprop = '';

	if ( 'microdata' === cagov_get_schema_type() ) {
		$itemprop = ' itemprop="text"';
	}
	?>

	<div class="entry-content"<?php echo $itemprop; // phpcs:ignore -- No escaping needed. ?>>
		<?php
		printf(
			'<p>%s</p>',
			apply_filters( 'cagov_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'cagov_wp_theme' ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- HTML is allowed in filter here.
		);

		get_search_form();
		?>
	</div>

	<?php
	/**
	 * cagov_after_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'cagov_after_content' );
	?>

</div>
