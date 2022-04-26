<?php
/**
 * The template for displaying the footer.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

	</div>
</div>

<?php
/**
 * cagov_before_footer hook.
 *
 * @since 0.1
 */
do_action( 'cagov_before_footer' );
?>


<!-- SITE FOOTER-->
<div <?php cagov_do_attr( 'footer' ); ?>>
	<?php
	/**
	 * cagov_before_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'cagov_before_footer_content' );

	/**
	 * cagov_footer hook.
	 *
	 * @since 1.3.42
	 *
	 * @hooked cagov_construct_footer_widgets - 5
	 * @hooked cagov_construct_footer - 10
	 */
	do_action( 'cagov_footer' );

	/**
	 * cagov_after_footer_content hook.
	 *
	 * @since 0.1
	 */
	do_action( 'cagov_after_footer_content' );
	?>
</div>

<?php
/**
 * cagov_after_footer hook.
 *
 * @since 2.1
 */
do_action( 'cagov_after_footer' );

wp_footer();
?>
<script type="module" src='https://california.azureedge.net/cdt/CAWeb/combined-css/1.0.3/dist/index.js'></script>
</body>
</html>
