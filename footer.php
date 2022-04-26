<?php
/**
 * The template for displaying the footer.
 *
 * @package cagov-wp-theme
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

<!--Adding CAGov Design System JavaScript-->

<!-- Use locally compiled design system components. We can do this until we have CDN hosts for modular content. 
To compile, run build in components directory.
@TODO Q: can we do this in functions instead so we can manage the script order & performance  -->
<script type="module" src='wp-content/themes/cagov-wp-theme-generate-press/components/design-system-dist-manager/dist/index.js'></script>

</body>
</html>
