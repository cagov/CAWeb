<?php


/**
 * CADesignSystem Breadcrumb
 *
 * @todo update function to render web component if we build it OR export compiled breadcrumb markup or JSON to WP API
 *
 * @return HTML
 */
function cagov_breadcrumb()
{
	/* Quick breadcrumb function */

	global $post;

	$separator = "<span class=\"crumb separator\">/</span>";
	$linkOff = true;

	$items = wp_get_nav_menu_items('header-menu');

	if ($items !== "undefined" && isset($items)) {
		if (is_array($items) || is_object($items)) {
			_wp_menu_item_classes_by_context($items); // Set up the class variables, including current-classes

			$crumbs = array(
				"<a class=\"crumb\" href=\"https:\/\/ca.gov\" title=\"CA.GOV\">CA.GOV</a>",
				"<a class=\"crumb\" href=\"/\" title=\"" . get_bloginfo('name') . "\">" . get_bloginfo('name') . "</a>"
			);

			foreach ($items as $item) {
				if ($item->current_item_ancestor) {
					if ($linkOff == true) {
						$crumbs[] = "<span class=\"crumb\">{$item->title}</span>";
					} else {
						$crumbs[] = "<a class=\"crumb\" href=\"{$item->url}\" title=\"{$item->title}\">{$item->title}</a>";
					}
				} else if ($item->current) {
					$crumbs[] = "<span class=\"crumb current\">{$item->title}</span>";
				}
			}

			if (is_category()) {
				global $wp_query;
				$category = get_category(get_query_var('cat'), false);
				$crumbs[] = "<span class=\"crumb current\">{$category->name}</span>";
			}

			// Configuration note: requires that a menu item link to a category page.
			if (count($crumbs) == 2 && !is_category()) {
				$category = get_the_category($post->ID);

				// Get category menu item from original menu item
				$category_menu_item_found = false;

				foreach ($items as $category_item) {
					if (isset($category_item->type_label) && $category_item->type_label === "Category") { // or ->type == "taxonomy"
						if (isset($category[0]->name) && $category[0]->name == $category_item->title) {
							$crumbs[] = "<span class=\"crumb current\">" . $category_item->title . "</span>";
							$category_menu_item_found = true;
						}
					}
				}

				// If not found, just use the category name
				if (isset($category[0]) && $category[0] && $category_menu_item_found == false) {
					$crumbs[] = "<span class=\"crumb current\">" . $category[0]->name . "</span>";
				}
			}

			echo '<div class="breadcrumb" aria-label="Breadcrumb" role="region">' . implode($separator, $crumbs) . '</div>';
		}
	}
}

add_action('cagov_breadcrumb', 'cagov_breadcrumb');