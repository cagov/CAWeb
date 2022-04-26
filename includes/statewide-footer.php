<?php

/**
 * ca.gov State-wide footer
 * Use Statewide footer menu and render a ca.gov logo, footer links and copyright information.
 * @TODO Pull from a shared data source, or translatable list of managed links (links managed in theme code)
 *
 * @return void
 */

/**
 * Add back to top button, loads from web component from design system.
 *
 * @return void
 */
function cagov_back_to_top()
{
	return  '<cagov-back-to-top data-hide-after="1000" data-label="Back to top">
		</cagov-back-to-top>';
}

/**
 * Add Per Page feedback feature
 * @TODO Take options from site options for any properties needed for the feedback feature (and show/hide)
 * 
 */
function cagov_statewide_page_feedback()
{
	return '<div class="per-page-feedback-container">
	<cagov-feedback data-endpoint-url="https://fa-go-feedback-001.azurewebsites.net/sendfeedback"></cagov-feedback>
</div>';
}


/* AGENCY FOOTER */


/**
 * Build our footer widgets.
 *
 * @since 1.3.42
 */
function cagov_construct_footer_widgets()
{
	// Get how many widgets to show.
	$widgets = cagov_get_footer_widgets();

	if (!empty($widgets) && 0 !== $widgets) :

		// If no footer widgets exist, we don't need to continue.
		if (!is_active_sidebar('footer-1') && !is_active_sidebar('footer-2') && !is_active_sidebar('footer-3') && !is_active_sidebar('footer-4') && !is_active_sidebar('footer-5')) {
			return;
		}

		// Set up the widget width.
		$widget_width = '';

		if (1 === (int) $widgets) {
			$widget_width = '100';
		}

		if (2 === (int) $widgets) {
			$widget_width = '50';
		}

		if (3 === (int) $widgets) {
			$widget_width = '33';
		}

		if (4 === (int) $widgets) {
			$widget_width = '25';
		}

		if (5 === (int) $widgets) {
			$widget_width = '20';
		}
?>
		<section aria-label="agency footer" class="agency-footer">
			<div class="container">
				<div class="footer-logo">
					<?php cagov_construct_logo(); ?>
				</div>
				<?php
				if ($widgets >= 1) {
					cagov_do_footer_widget($widget_width, 1);
				}

				if ($widgets >= 2) {
					cagov_do_footer_widget($widget_width, 2);
				}

				if ($widgets >= 3) {
					cagov_do_footer_widget($widget_width, 3);
				}

				if ($widgets >= 4) {
					cagov_do_footer_widget($widget_width, 4);
				}

				if ($widgets >= 5) {
					cagov_do_footer_widget($widget_width, 5);
				}
				?>
			</div>
			</div>
		<?php
	endif;

	/**
	 * cagov_after_footer_widgets hook.
	 *
	 * @since 0.1
	 */
	do_action('cagov_after_footer_widgets');
}

add_action('cagov_footer', 'cagov_construct_footer_widgets', 5);


/**
 * CADesignSystem Content Menu
 *
 * @category add_action( 'cagov_pre_footer', 'cagov_content_menu' );
 * @return HTML
 */
function cagov_content_menu()
{
	$nav_links = '';

	/* loop thru and create a link (parent nav item only) */
	$nav_menus = get_nav_menu_locations();

	if (!isset($nav_menus['content-menu'])) {
		return;
	}
		?>
		<ul class="content-menu-links">
			<?php
			$menuitems = wp_get_nav_menu_items($nav_menus['content-menu']);

			foreach ($menuitems as $item) {
				if (!$item->menu_item_parent) {
					$class  = !empty($item->classes) ? implode(' ', $item->classes) : '';
					$rel    = !empty($item->xfn) ? $item->xfn : '';
					$target = !empty($item->target) ? $item->target : '_blank';
			?>
					<li class="<?php echo esc_attr($class); ?>" title="<?php echo esc_attr($item->attr_title); ?>" rel="<?php echo esc_attr($rel); ?>">
						<a href="<?php echo esc_url($item->url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($item->title); ?></a>
					</li>
			<?php
				}
			}
			?>
		</ul>
	<?php
}


/**
 * CADesignSystem Content Social Menu
 *
 * @return HTML
 */
function cagov_content_social_menu()
{
	$nav_links = '';

	/* loop thru and create a link (parent nav item only) */
	$nav_menus = get_nav_menu_locations();

	if (!isset($nav_menus['social-media-links-menu'])) {
		return;
	}

	?>
		<ul class="social-links-container">
			<?php
			$menuitems = wp_get_nav_menu_items($nav_menus['social-media-links-menu']);

			foreach ($menuitems as $item) {
				if (!$item->menu_item_parent) {
					$class  = !empty($item->classes) ? implode(' ', $item->classes) : '';
					$rel    = !empty($item->xfn) ? $item->xfn : '';
					$target = !empty($item->target) ? $item->target : '_blank';
			?>
					<li class="<?php echo esc_attr($class); ?>" title="<?php echo esc_attr($item->attr_title); ?>" rel="<?php echo esc_attr($rel); ?>">
						<a href="<?php echo esc_url($item->url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($item->title); ?></a>
					</li>
			<?php
				}
			}
			?>
		</ul>
	<?php
}

/**
 * ca.gov logo link
 */
function cagov_statewide_logo_link()
{
	return '<a href="https://ca.gov" class="cagov-logo" title="ca.gov" rel="noopener noreferrer" target="_blank">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="34px" height="34px" viewBox="0 0 44 34" style="enable-background:new 0 0 44 34;" xml:space="preserve">

						<path class="ca" d="M27.4,14c0.1-0.4,0.4-1.5,0.9-3.2c0.1-0.5,0.4-1.3,0.9-2.7c0.5-1.4,0.9-2.5,1.2-3.3c-0.9,0.6-1.8,1.4-2.7,2.3
      c-3.2,3.5-6.9,7.6-8.3,9.8c0.5-0.1,1.5-1.2,4.7-2.3C26.3,14,27.4,14,27.4,14L27.4,14z M26.9,16.2c-10.1,0-14.5,16.1-21.6,16.1
      c-1.6,0-2.8-0.7-3.7-2.1c-0.6-0.9-0.8-2-0.8-3.1c0-2.9,1.4-6.7,4.2-11.1c2.4-3.8,4.9-6.9,7.5-9.2c2.3-2,4.2-3,5.9-3
      c0.9,0,1.6,0.3,2.1,1C20.8,5.2,21,5.8,21,6.5c0,1.3-0.4,2.8-1.3,4.5c-0.8,1.5-1.7,2.8-2.9,3.9c-0.8,0.8-1.4,1.1-1.8,1.1
      c-0.3,0-0.6-0.1-0.8-0.4c-0.2-0.2-0.3-0.4-0.3-0.7c0-0.5,0.4-1,1.2-1.6c1.2-0.9,2.1-1.8,2.8-2.9c1-1.5,1.5-2.8,1.5-3.8
      c0-0.4-0.1-0.7-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3c-0.7,0-1.8,0.5-3.2,1.6c-1.6,1.2-3.2,2.9-5,5C8,14.8,6.3,17.4,5.2,20
      c-1.2,2.7-1.8,5-1.8,6.9c0,0.9,0.3,1.7,0.8,2.3c0.6,0.7,1.3,1.1,2.1,1.1c3.2-0.1,7.2-7.4,8.4-9.1C27,4.3,27.9,4.3,29.8,2.5
      c1.1-1,1.9-1.6,2.5-1.6c0.4,0,0.7,0.1,0.9,0.4c0.2,0.3,0.3,0.5,0.3,0.9c0,0.4-0.2,1-0.6,2c-0.7,1.7-1.3,3.5-1.9,5.4
      c-0.5,1.7-0.9,3-1,3.9c0.2,0,0.4,0,0.5,0c0.4,0,0.7,0,1,0c0.8,0,1.2,0.3,1.2,0.9c0,0.3-0.1,0.5-0.3,0.8c-0.2,0.3-0.4,0.4-0.6,0.5
      c-0.1,0-0.3,0-0.7,0c-0.8,0-1.4,0-1.7,0.1c-0.1,0.4-0.5,4.1-1.1,4.2C26.7,21.5,26.8,16.7,26.9,16.2L26.9,16.2z" />
						<g>
							<path class="gov" d="M16.8,27.2c0.4,0,0.8,0.2,1.1,0.5c0.3,0.3,0.5,0.7,0.5,1.1c0,0.4-0.2,0.8-0.5,1.1c-0.3,0.3-0.7,0.5-1.1,0.5
          c-0.4,0-0.8-0.2-1.1-0.5c-0.3-0.3-0.5-0.7-0.5-1.1c0-0.4,0.2-0.8,0.5-1.1C16,27.4,16.4,27.2,16.8,27.2L16.8,27.2z" />
							<path class="gov" d="M26.7,22.9l-1.1,1.1c-0.7-0.8-1.5-1.1-2.5-1.1c-0.8,0-1.5,0.3-2.1,0.8c-0.6,0.6-0.8,1.2-0.8,2
          c0,0.8,0.3,1.5,0.9,2.1c0.6,0.6,1.3,0.8,2.2,0.8c0.6,0,1-0.1,1.4-0.3c0.4-0.2,0.7-0.6,0.9-1.1h-2.4v-1.5h4.2l0,0.4
          c0,0.7-0.2,1.4-0.6,2.1c-0.4,0.7-0.9,1.2-1.5,1.5c-0.6,0.3-1.3,0.5-2.1,0.5c-0.9,0-1.7-0.2-2.3-0.6c-0.7-0.4-1.2-0.9-1.6-1.6
          c-0.4-0.7-0.6-1.5-0.6-2.3c0-1.1,0.4-2.1,1.1-2.9c0.9-1,2-1.5,3.4-1.5c0.7,0,1.4,0.1,2.1,0.4C25.7,22,26.2,22.4,26.7,22.9
          L26.7,22.9z" />
							<path class="gov" d="M32.2,21.4c1.2,0,2.2,0.4,3.1,1.3c0.9,0.9,1.3,1.9,1.3,3.2c0,1.2-0.4,2.3-1.3,3.1c-0.8,0.9-1.9,1.3-3.1,1.3
          c-1.3,0-2.3-0.4-3.2-1.3c-0.8-0.9-1.3-1.9-1.3-3.1c0-0.8,0.2-1.5,0.6-2.2c0.4-0.7,0.9-1.2,1.6-1.6C30.7,21.5,31.4,21.4,32.2,21.4
          L32.2,21.4z M32.2,22.9c-0.8,0-1.4,0.3-2,0.8c-0.5,0.5-0.8,1.2-0.8,2.1c0,0.9,0.3,1.7,1,2.2c0.5,0.4,1.1,0.6,1.8,0.6
          c0.8,0,1.4-0.3,1.9-0.8c0.5-0.6,0.8-1.2,0.8-2c0-0.8-0.3-1.5-0.8-2C33.6,23.2,33,22.9,32.2,22.9L32.2,22.9z" />
							<polygon class="gov" points="36.3,21.6 38,21.6 40.1,27.6 42.2,21.6 43.9,21.6 40.8,30 39.3,30 36.3,21.6 	" />
						</g>
					</svg>
	</a>';
}

function cagov_copyright()
{
	// @TRANSLATION
	return '<div class="container pt-0">
		<p class="copyright">Copyright © 2021 State of California</p>
	</div>';
}

/**
 * Build Statewide footer menu
 *
 * @return void
 */
function cagov_statewide_footer_menu()
{
	/* Loop thru and create a link (parent nav item only) */
	$nav_menus = get_registered_nav_menus();

	if (!isset($nav_menus) || !isset($nav_menus['statewide-footer-menu'])) {
		return;
	}

	?>
		<div class="statewide-footer-container">
			<div class="statewide-footer">
				<div class="menu-section">
					<ul class="statewide-footer-menu-links">
						<?php
						$menuitems = wp_get_nav_menu_items('statewide-footer-menu');
						if (isset($menuitems) && is_array($menuitems)) {
							foreach ($menuitems as $item) {
								if (!$item->menu_item_parent) {
									$class  = !empty($item->classes) ? implode(' ', $item->classes) : '';
									$rel    = !empty($item->xfn) ? $item->xfn : '';
									$target = !empty($item->target) ? $item->target : '_blank';
						?>
									<li class="<?php echo esc_attr($class); ?>" title="<?php echo esc_attr($item->attr_title); ?>" rel="<?php echo esc_attr($rel); ?>">
										<a href="<?php echo esc_url($item->url); ?>" target="<?php echo esc_attr($target); ?>"><?php echo esc_attr($item->title); ?></a>
									</li>
						<?php
								}
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	<?php
}

/**
 * Build statewide footer
 *
 * @since 1.3.42
 */
function cagov_construct_footer()
{
	?>
		<footer>

			<?php echo cagov_back_to_top(); ?>

			<?php echo cagov_statewide_page_feedback(); ?>

			<div class="content-footer-container">
				<div class="content-footer">
					<div class="menu-section">
						<div class="logo-small">
						</div>
					</div>
					<div class="menu-section">
						<?php echo cagov_content_menu(); ?>
					</div>
					<div class="menu-section menu-section-social">
						<?php
						cagov_content_social_menu();
						?>
					</div>
				</div>
			</div>

			<div class="bg-light-grey">
				<div class="container">

					<?php echo cagov_statewide_logo_link(); ?>

					<?php echo cagov_statewide_footer_menu(); ?>

				</div>
				<!--container-->

				<?php echo cagov_copyright(); ?>
				<!--container-->
			</div>
			<!--bg-light-grey-->
		</footer>
	<?php
}

add_action('cagov_footer', 'cagov_construct_footer');
