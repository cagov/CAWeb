<?php



/* BRANDING */

if (!function_exists('cagov_construct_site_title')) {
	
}


/**
	 * Build the site title and tagline.
	 *
	 * @since 1.3.28
	 */
	function cagov_construct_site_title()
	{
		$cagov_settings = wp_parse_args(
			get_option('cagov_settings', array()),
			cagov_get_defaults()
		);

		// Get the title and tagline.
		$title = get_bloginfo('title');
		$tagline = get_bloginfo('description');

		// If the disable title checkbox is checked, or the title field is empty, return true.
		$disable_title = ('1' == $cagov_settings['hide_title'] || '' == $title) ? true : false; // phpcs:ignore

		// If the disable tagline checkbox is checked, or the tagline field is empty, return true.
		$disable_tagline = ('1' == $cagov_settings['hide_tagline'] || '' == $tagline) ? true : false;  // phpcs:ignore

		$schema_type = cagov_get_schema_type();

		// Build our site title.
		$site_title = apply_filters(
			'cagov_site_title_output',
			sprintf(
				'<span class="main-title org-name-dept">
					%3$s
				</span>',
				(is_front_page() && is_home()) ? 'h1' : 'p',
				esc_url(apply_filters('cagov_site_title_href', home_url('/'))),
				get_bloginfo('name'),
				'microdata' === cagov_get_schema_type() ? ' itemprop="headline"' : ''
			)
		);

		// Build our tagline.
		$site_tagline = apply_filters(
			'cagov_site_description_output',
			sprintf(
				'<span class="site-description org-name-state"%2$s>
					%1$s
				</span>',
				html_entity_decode(get_bloginfo('description', 'display')), // phpcs:ignore
				'microdata' === cagov_get_schema_type() ? ' itemprop="description"' : ''
			)
		);

		// Site title and tagline.
		if (false === $disable_title || false === $disable_tagline) {
			if (cagov_needs_site_branding_container()) {
				echo '<div class="branding site-branding-container"><div class="container with-logo">';
				cagov_construct_logo();
			}

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- outputting site title and tagline. False positive.
	// 		echo apply_filters(
	// 			'cagov_site_branding_output',
	// 			sprintf(
	// 				'<a class="site-branding grid-org-name" href="/">
	// 					%1$s
	// 					%2$s
	// 				</a>
	// 				<div class="cagov-nav mobile-icons grid-mobile-icons">
    //   <div class="cagov-nav mobile-search">
    //     <button class="search-btn" aria-expanded="true">
    //       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px"
    //         height="17px" viewBox="0 0 17 17" style="enable-background:new 0 0 17 17;" xml:space="preserve">
    //         <path class="blue" d="M16.4,15.2l-4-4c2-2.6,1.8-6.5-0.6-8.9c-1.3-1.3-3-2-4.8-2S3.5,1,2.2,2.3c-2.6,2.6-2.6,6.9,0,9.6
    //   c1.3,1.3,3,2,4.8,2c1.4,0,2.9-0.5,4.1-1.4l4.1,4c0.2,0.2,0.4,0.3,0.7,0.3c0.2,0,0.5-0.1,0.7-0.3C16.7,16.2,16.7,15.6,16.4,15.2
    //   L16.4,15.2z M7,12c-1.3,0-2.6-0.5-3.5-1.4c-1.9-1.9-1.9-5.1,0-7C4.4,2.7,5.6,2.1,7,2.1s2.6,0.5,3.5,1.4c0.9,0.9,1.4,2.2,1.4,3.5
    //   c0,1.3-0.5,2.6-1.4,3.5C9.5,11.5,8.3,12,7,12z"></path>
    //       </svg>
    //       <span>Search</span>
    //     </button>
    //   </div>
    //   <button class="menu-trigger cagov-nav open-menu" aria-label="Navigation menu" aria-haspopup="true" aria-expanded="false"
    //     aria-owns="mainMenu" aria-controls="mainMenu">
    //     <div class="cagov-nav hamburger">
    //       <div class="hamburger-box">
    //         <div class="hamburger-inner"></div>
    //       </div>
    //     </div>
    //     <div class="cagov-nav menu-trigger-label menu-label" data-openlabel="Menu" data-closelabel="Close">Menu</div>
    //   </button>
    // </div>
	//  <div class="search-container grid-search">
    //   <form class="site-search" action="/serp/">
    //     <span class="sr-only" id="SearchInput">Custom Google Search</span>
    //     <input type="text" id="q" name="q" aria-labelledby="SearchInput" placeholder="Search this website" class="search-textfield">
    //     <button type="submit" class="search-submit">
    //       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    //         width="17px" height="17px" viewBox="0 0 17 17" style="enable-background:new 0 0 17 17;"
    //         xml:space="preserve">
    //         <path class="blue" d="M16.4,15.2l-4-4c2-2.6,1.8-6.5-0.6-8.9c-1.3-1.3-3-2-4.8-2S3.5,1,2.2,2.3c-2.6,2.6-2.6,6.9,0,9.6
    //     c1.3,1.3,3,2,4.8,2c1.4,0,2.9-0.5,4.1-1.4l4.1,4c0.2,0.2,0.4,0.3,0.7,0.3c0.2,0,0.5-0.1,0.7-0.3C16.7,16.2,16.7,15.6,16.4,15.2
    //     L16.4,15.2z M7,12c-1.3,0-2.6-0.5-3.5-1.4c-1.9-1.9-1.9-5.1,0-7C4.4,2.7,5.6,2.1,7,2.1s2.6,0.5,3.5,1.4c0.9,0.9,1.4,2.2,1.4,3.5
    //     c0,1.3-0.5,2.6-1.4,3.5C9.5,11.5,8.3,12,7,12z" />
    //       </svg>
    //       <span class="sr-only">Submit</span>
    //     </button>
    //     <button class="search-close">Close</button>
    //   </form>
    // </div>',
	// 				(!$disable_title) ? $site_title : '',
	// 				(!$disable_tagline) ? $site_tagline : ''
	// 			)
	// 		);

			if (cagov_needs_site_branding_container()) {
				echo '</div></div>';
			}
		}
	}