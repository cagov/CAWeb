<?php

/* NAVIGATION */
// @TODO T
if (!function_exists('cagov_navigation_position')) {
	/**
	 * Build the navigation.
	 *
	 * @since 0.1
	 */
	function cagov_navigation_position()
	{
		/**
		 * cagov_before_navigation hook.
		 *
		 * @since 3.0.0
		 */
		do_action('cagov_before_navigation');
		?>
		<cagov-navoverlay>
			<div class="container">
				<div class="search-container search-container--small hidden-search">
					<form class="site-search" action="/serp/">
						<span class="sr-only" id="SearchInput2">Custom Google Search</span>
						<input type="text" name="q" aria-labelledby="SearchInput2" placeholder="Search this website" class="search-textfield">
						<button type="submit" class="search-submit">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px" height="17px" viewBox="0 0 17 17" style="enable-background:new 0 0 17 17;" xml:space="preserve">
								<path class="blue" d="M16.4,15.2l-4-4c2-2.6,1.8-6.5-0.6-8.9c-1.3-1.3-3-2-4.8-2S3.5,1,2.2,2.3c-2.6,2.6-2.6,6.9,0,9.6
        c1.3,1.3,3,2,4.8,2c1.4,0,2.9-0.5,4.1-1.4l4.1,4c0.2,0.2,0.4,0.3,0.7,0.3c0.2,0,0.5-0.1,0.7-0.3C16.7,16.2,16.7,15.6,16.4,15.2
        L16.4,15.2z M7,12c-1.3,0-2.6-0.5-3.5-1.4c-1.9-1.9-1.9-5.1,0-7C4.4,2.7,5.6,2.1,7,2.1s2.6,0.5,3.5,1.4c0.9,0.9,1.4,2.2,1.4,3.5
        c0,1.3-0.5,2.6-1.4,3.5C9.5,11.5,8.3,12,7,12z" />
							</svg>
							<span class="sr-only">Submit</span>
						</button>
					</form>
				</div>
				<nav <?php cagov_do_attr('navigation'); ?>>
					<?php
					/**
					 * cagov_inside_navigation hook.
					 *
					 * @since 0.1
					 *
					 * @hooked cagov_navigation_search - 10
					 * @hooked cagov_mobile_menu_search_icon - 10
					 */
					do_action('cagov_inside_navigation');
					?>

					<?php
					/**
					 * cagov_after_mobile_menu_button hook
					 *
					 * @since 3.0.0
					 */
					do_action('cagov_after_mobile_menu_button');

					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'       => 'div',
							'container_class' => 'expanded-menu',
							'menu_class' => '',
							'fallback_cb' => 'cagov_menu_fallback',
							'walker'         => new Primary_Walker_Nav_Menu(),
							// 'items_wrap' => '%3$s', // Do not include ul wrap, use only '%3$s' specifier
							'items_wrap'  => '<ul class="expanded-menu-grid"><div class="expanded-menu-section mobile-only"><strong class="expanded-menu-section-header"><a class="expanded-menu-section-header-link js-event-hm-menu" href="/">Home</a></strong></div>%3$s</ul>'
						)
					);

					/**
					 * cagov_after_primary_menu hook.
					 *
					 * @since 2.3
					 */
					do_action('cagov_after_primary_menu');
					?>
				</nav>
			</div>
		</cagov-navoverlay>
	<?php
		/**
		 * cagov_after_navigation hook.
		 *
		 * @since 3.0.0
		 */
		do_action('cagov_after_navigation');
	}
}



if (!function_exists('cagov_menu_fallback')) {
	/**
	 * Menu fallback.
	 *
	 * @since 1.1.4
	 *
	 * @param array $args Existing menu args.
	 */
	function cagov_menu_fallback($args)
	{
		$cagov_settings = wp_parse_args(
			get_option('cagov_settings', array()),
			cagov_get_defaults()
		);
	?>
		<div id="primary-menu" class="main-nav">
			<ul <?php cagov_do_element_classes('menu'); ?>>
				<?php
				$args = array(
					'sort_column' => 'menu_order',
					'title_li' => '',
					'walker' => new CaGovWPTheme_Page_Walker(),
				);

				wp_list_pages($args);

				if (!cagov_is_using_flexbox() && 'enable' === $cagov_settings['nav_search']) {
					$search_item = apply_filters(
						'cagov_navigation_search_menu_item_output',
						sprintf(
							'<li class="search-item menu-item-align-right"><a aria-label="%1$s" href="#">%2$s</a></li>',
							esc_attr__('Open Search Bar', 'cagov_wp_theme'),
							cagov_get_svg_icon('search', true) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in function.
						)
					);

					echo $search_item; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Safe output.
				}
				?>
			</ul>
		</div>
<?php
	}
}

/**
 * Walker menu (for main navigation)
 */
class Primary_Walker_Nav_Menu extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		if (array_search('menu-item-has-children', $item->classes)) {
			$output .= sprintf(
				"\n<li class='expanded-menu-col js-cagov-navoverlay-expandable expanded-menu-section %s'><div class='expanded-menu-section'><strong class='expanded-menu-section-header'><button href='%s' class=\"expanded-menu-section-header-link js-event-hm-menu\" data-toggle=\"dropdown\" >%s <span class='expanded-menu-section-header-arrow'>
			  <svg width='11' height='7' class='expanded-menu-section-header-arrow-svg' viewBox='0 0 11 7' fill='none' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' clip-rule='evenodd' d='M1.15596 0.204797L5.49336 5.06317L9.8545 0.204797C10.4293 -0.452129 11.4124 0.625368 10.813 1.28143L5.90083 6.82273C5.68519 7.05909 5.32606 7.05909 5.1342 6.82273L0.174341 1.28143C-0.400433 0.6245 0.581838 -0.452151 1.15661 0.204797H1.15596Z' />
			  </svg></span></button></strong></div>\n",
				(array_search('current-menu-item', $item->classes) || array_search('current-page-parent', $item->classes)) ? 'active' : '',
				$item->url,
				$item->title
			);
		} else {
			$output .= sprintf(
				"\n<li class='expanded-menu-col js-cagov-navoverlay-expandable %s'><div class='expanded-menu-section'><strong class='expanded-menu-section-header'><a class='expanded-menu-section-header-link js-event-hm-menu' href='%s'>%s</a></strong></div>\n",
				(array_search('current-menu-item', $item->classes)) ? ' class="active"' : '',
				$item->url,
				$item->title
			);
		}
	}

	function start_lvl(&$output, $depth = 0, $args = NULL)
	{
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"expanded-menu-dropdown\" role=\"menu\">\n";
	}
}


/**
 * Add additional classes on menu links
 */
function add_additional_class_on_a($classes, $item, $args)
{
	if (isset($args->add_a_class)) {
		$classes['class'] = $args->add_a_class;
	}
	return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

/**
 * Add a list item class on menu items
 */
function add_menu_list_item_class($classes, $item, $args)
{
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);
