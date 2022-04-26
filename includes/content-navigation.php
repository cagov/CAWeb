<?php
/**
 * CADesignSystem Pre Main Primary
 *
 * @category add_action( 'caweb_pre_main_primary', 'cagov_pre_main_primary');
 * @return HTML
 */
function cagov_pre_main_primary()
{
	global $post;

	$cagov_content_menu_sidebar = get_post_meta($post->ID, '_cagov_content_menu_sidebar', true);

	// Dont render cagov-content-navigation sidebar on front page, post,
	// or if content navigation sidebar not enabled.
	// @TODO This logic needs to be recorded, documented for headless unless we do a simpler method of just doing templates & not adding extra logic that needs to be maintained.

	if ('on' !== $cagov_content_menu_sidebar || is_front_page() || is_single()) {
		return;
	}
		?>
		<div class="sidebar-container" style="z-index: 1;">
			<sidebar space="0" side="left">
				<cagov-content-navigation data-selector="main" data-type="wordpress" data-label="On this page"></cagov-content-navigation>
			</sidebar>
		</div>
	<?php
}