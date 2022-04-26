<?php
/**
 * The template for displaying Link post formats.
 *
 * @package cagov-wp-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php cagov_do_microdata( 'article' ); ?>>
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

		if ( cagov_show_entry_header() ) :
			?>
			<header class="entry-header">
				<?php
				/**
				 * cagov_before_entry_title hook.
				 *
				 * @since 0.1
				 */
				do_action( 'cagov_before_entry_title' );

				if ( cagov_show_title() ) {
					$params = cagov_get_the_title_parameters();

					the_title( $params['before'], $params['after'] );
				}

				/**
				 * cagov_after_entry_title hook.
				 *
				 * @since 0.1
				 *
				 * @hooked cagov_post_meta - 10
				 */
				do_action( 'cagov_after_entry_title' );
				?>
			</header>
			<?php
		endif;

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

		if ( cagov_show_excerpt() ) :
			?>

			<div class="entry-summary"<?php echo $itemprop; // phpcs:ignore -- No escaping needed. ?>>
				<?php the_excerpt(); ?>
			</div>

		<?php else : ?>

			<div class="entry-content"<?php echo $itemprop; // phpcs:ignore -- No escaping needed. ?>>
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'cagov_wp_theme' ),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<?php
		endif;

		/**
		 * cagov_after_entry_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked cagov_footer_meta - 10
		 */
		do_action( 'cagov_after_entry_content' );

		/**
		 * cagov_after_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'cagov_after_content' );
		?>
	</div>
</article>
