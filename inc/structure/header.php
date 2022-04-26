<?php
/**
 * Header elements.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'cagov_construct_header' ) ) {
	add_action( 'cagov_header', 'cagov_construct_header' );
	/**
	 * Build the header.
	 *
	 * @since 1.3.42
	 */
	function cagov_construct_header() {
		?>
		<header>
			<div class="header-container">

			<!--skip-to-content-->
			<div id="skip-to-content"><a href="#main-content">Skip to Main Content</a></div>
				<!--end skip-to-content-->

<!--statewide header-->
<div class="official-header">
  <div class="container">
    <div class="official-logo">
        <svg title="ca.gov logo" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" width="44px" height="34px" viewBox="0 0 44 34" style="enable-background:new 0 0 44 34;"
            xml:space="preserve">
          <path class="ca" d="M27.4,14c0.1-0.4,0.4-1.5,0.9-3.2c0.1-0.5,0.4-1.3,0.9-2.7c0.5-1.4,0.9-2.5,1.2-3.3c-0.9,0.6-1.8,1.4-2.7,2.3
        c-3.2,3.5-6.9,7.6-8.3,9.8c0.5-0.1,1.5-1.2,4.7-2.3C26.3,14,27.4,14,27.4,14L27.4,14z M26.9,16.2c-10.1,0-14.5,16.1-21.6,16.1
        c-1.6,0-2.8-0.7-3.7-2.1c-0.6-0.9-0.8-2-0.8-3.1c0-2.9,1.4-6.7,4.2-11.1c2.4-3.8,4.9-6.9,7.5-9.2c2.3-2,4.2-3,5.9-3
        c0.9,0,1.6,0.3,2.1,1C20.8,5.2,21,5.8,21,6.5c0,1.3-0.4,2.8-1.3,4.5c-0.8,1.5-1.7,2.8-2.9,3.9c-0.8,0.8-1.4,1.1-1.8,1.1
        c-0.3,0-0.6-0.1-0.8-0.4c-0.2-0.2-0.3-0.4-0.3-0.7c0-0.5,0.4-1,1.2-1.6c1.2-0.9,2.1-1.8,2.8-2.9c1-1.5,1.5-2.8,1.5-3.8
        c0-0.4-0.1-0.7-0.3-0.9c-0.2-0.2-0.5-0.3-0.8-0.3c-0.7,0-1.8,0.5-3.2,1.6c-1.6,1.2-3.2,2.9-5,5C8,14.8,6.3,17.4,5.2,20
        c-1.2,2.7-1.8,5-1.8,6.9c0,0.9,0.3,1.7,0.8,2.3c0.6,0.7,1.3,1.1,2.1,1.1c3.2-0.1,7.2-7.4,8.4-9.1C27,4.3,27.9,4.3,29.8,2.5
        c1.1-1,1.9-1.6,2.5-1.6c0.4,0,0.7,0.1,0.9,0.4c0.2,0.3,0.3,0.5,0.3,0.9c0,0.4-0.2,1-0.6,2c-0.7,1.7-1.3,3.5-1.9,5.4
        c-0.5,1.7-0.9,3-1,3.9c0.2,0,0.4,0,0.5,0c0.4,0,0.7,0,1,0c0.8,0,1.2,0.3,1.2,0.9c0,0.3-0.1,0.5-0.3,0.8c-0.2,0.3-0.4,0.4-0.6,0.5
        c-0.1,0-0.3,0-0.7,0c-0.8,0-1.4,0-1.7,0.1c-0.1,0.4-0.5,4.1-1.1,4.2C26.7,21.5,26.8,16.7,26.9,16.2L26.9,16.2z"/>
          <g>
            <path class="gov" d="M16.8,27.2c0.4,0,0.8,0.2,1.1,0.5c0.3,0.3,0.5,0.7,0.5,1.1c0,0.4-0.2,0.8-0.5,1.1c-0.3,0.3-0.7,0.5-1.1,0.5
            c-0.4,0-0.8-0.2-1.1-0.5c-0.3-0.3-0.5-0.7-0.5-1.1c0-0.4,0.2-0.8,0.5-1.1C16,27.4,16.4,27.2,16.8,27.2L16.8,27.2z"/>
            <path class="gov" d="M26.7,22.9l-1.1,1.1c-0.7-0.8-1.5-1.1-2.5-1.1c-0.8,0-1.5,0.3-2.1,0.8c-0.6,0.6-0.8,1.2-0.8,2
            c0,0.8,0.3,1.5,0.9,2.1c0.6,0.6,1.3,0.8,2.2,0.8c0.6,0,1-0.1,1.4-0.3c0.4-0.2,0.7-0.6,0.9-1.1h-2.4v-1.5h4.2l0,0.4
            c0,0.7-0.2,1.4-0.6,2.1c-0.4,0.7-0.9,1.2-1.5,1.5c-0.6,0.3-1.3,0.5-2.1,0.5c-0.9,0-1.7-0.2-2.3-0.6c-0.7-0.4-1.2-0.9-1.6-1.6
            c-0.4-0.7-0.6-1.5-0.6-2.3c0-1.1,0.4-2.1,1.1-2.9c0.9-1,2-1.5,3.4-1.5c0.7,0,1.4,0.1,2.1,0.4C25.7,22,26.2,22.4,26.7,22.9
            L26.7,22.9z"/>
            <path class="gov" d="M32.2,21.4c1.2,0,2.2,0.4,3.1,1.3c0.9,0.9,1.3,1.9,1.3,3.2c0,1.2-0.4,2.3-1.3,3.1c-0.8,0.9-1.9,1.3-3.1,1.3
            c-1.3,0-2.3-0.4-3.2-1.3c-0.8-0.9-1.3-1.9-1.3-3.1c0-0.8,0.2-1.5,0.6-2.2c0.4-0.7,0.9-1.2,1.6-1.6C30.7,21.5,31.4,21.4,32.2,21.4
            L32.2,21.4z M32.2,22.9c-0.8,0-1.4,0.3-2,0.8c-0.5,0.5-0.8,1.2-0.8,2.1c0,0.9,0.3,1.7,1,2.2c0.5,0.4,1.1,0.6,1.8,0.6
            c0.8,0,1.4-0.3,1.9-0.8c0.5-0.6,0.8-1.2,0.8-2c0-0.8-0.3-1.5-0.8-2C33.6,23.2,33,22.9,32.2,22.9L32.2,22.9z"/>
            <polygon class="gov" points="36.3,21.6 38,21.6 40.1,27.6 42.2,21.6 43.9,21.6 40.8,30 39.3,30 36.3,21.6 	"/>
          </g>
        </svg>
      <p class="official-tag"><span class="desktop-only">Official website of the</span> State of California</p>
    </div>
	 <?php cagov_construct_header_widget();?>
    <cagov-google-translate />
  </div>
	</div>
	<!--end statewide header-->

				<?php
				/**
				 * cagov_before_header_content hook.
				 *
				 * @since 0.1
				 */
				do_action( 'cagov_before_header_content' );

				if ( ! cagov_is_using_flexbox() ) {
					// Add our main header items.
					cagov_header_items();
				}

				/**
				 * cagov_after_header_content hook.
				 *
				 * @since 0.1
				 *
				 * @hooked cagov_add_navigation_float_right - 5
				 */
				do_action( 'cagov_after_header_content' );
				?>
			</div>
		</header>
		<?php
	}
}

if ( ! function_exists( 'cagov_header_items' ) ) {
	/**
	 * Build the header contents.
	 * Wrapping this into a function allows us to customize the order.
	 *
	 * @since 1.2.9.7
	 */
	function cagov_header_items() {

		$order = apply_filters(
			'cagov_header_items_order',
			array(
			//	'header-widget',
				'site-branding',
				'logo',
			)
		);

		foreach ( $order as $item ) {
			// if ( 'header-widget' === $item ) {
			// 	cagov_construct_header_widget();
			// }

			if ( 'site-branding' === $item ) {
				cagov_construct_site_title();
			}

			if ( 'logo' === $item ) {
				cagov_construct_logo();
			}
		}
	}
}

if ( ! function_exists( 'cagov_construct_logo' ) ) {
	/**
	 * Build the logo
	 *
	 * @since 1.3.28
	 */
	function cagov_construct_logo() {
		$logo_url = ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) ? wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' ) : false;
		$logo_url = ( $logo_url ) ? $logo_url[0] : cagov_get_option( 'logo' );

		$logo_url = esc_url( apply_filters( 'cagov_logo', $logo_url ) );
		$retina_logo_url = esc_url( apply_filters( 'cagov_retina_logo', cagov_get_option( 'retina_logo' ) ) );

		// If we don't have a logo, bail.
		if ( empty( $logo_url ) ) {
			return;
		}

		/**
		 * cagov_before_logo hook.
		 *
		 * @since 0.1
		 */
		do_action( 'cagov_before_logo' );

		$attr = apply_filters(
			'cagov_logo_attributes',
			array(
				'class' => 'header-image is-logo-image',
				'alt'   => esc_attr( apply_filters( 'cagov_logo_title', get_bloginfo( 'name', 'display' ) ) ),
				'src'   => $logo_url,
				'title' => esc_attr( apply_filters( 'cagov_logo_title', get_bloginfo( 'name', 'display' ) ) ),
			)
		);

		if ( '' !== $retina_logo_url ) {
			$attr['srcset'] = $logo_url . ' 1x, ' . $retina_logo_url . ' 2x';

			// Add dimensions to image if retina is set. This fixes a container width bug in Firefox.
			if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {
				$data = wp_get_attachment_metadata( get_theme_mod( 'custom_logo' ) );

				if ( ! empty( $data ) ) {
					$attr['width'] = $data['width'];
					$attr['height'] = $data['height'];
				}
			}
		} elseif ( cagov_is_using_flexbox() ) {
			// Add this to flexbox version only until we can verify it won't conflict with existing installs.
			if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {
				$data = wp_get_attachment_metadata( get_theme_mod( 'custom_logo' ) );

				if ( ! empty( $data ) ) {
					$attr['width'] = $data['width'];
					$attr['height'] = $data['height'];
				}
			}
		}

		$attr = array_map( 'esc_attr', $attr );

		$html_attr = '';
		foreach ( $attr as $name => $value ) {
			$html_attr .= " $name=" . '"' . $value . '"';
		}

		// Print our HTML.
		echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'cagov_logo_output',
			sprintf(
				'<a class="site-logo grid-logo" href="%1$s" title="%2$s">
						<img %3$s />
				</a>',
				esc_url( apply_filters( 'cagov_logo_href', home_url( '/' ) ) ),
				esc_attr( apply_filters( 'cagov_logo_title', get_bloginfo( 'name', 'display' ) ) ),
				$html_attr
			),
			$logo_url,
			$html_attr
		);

		/**
		 * cagov_after_logo hook.
		 *
		 * @since 0.1
		 */
		do_action( 'cagov_after_logo' );
	}
}

if ( ! function_exists( 'cagov_construct_site_title' ) ) {
	/**
	 * Build the site title and tagline.
	 *
	 * @since 1.3.28
	 */
	function cagov_construct_site_title() {
		$cagov_settings = wp_parse_args(
			get_option( 'cagov_settings', array() ),
			cagov_get_defaults()
		);

		// Get the title and tagline.
		$title = get_bloginfo( 'title' );
		$tagline = get_bloginfo( 'description' );

		// If the disable title checkbox is checked, or the title field is empty, return true.
		$disable_title = ( '1' == $cagov_settings['hide_title'] || '' == $title ) ? true : false; // phpcs:ignore

		// If the disable tagline checkbox is checked, or the tagline field is empty, return true.
		$disable_tagline = ( '1' == $cagov_settings['hide_tagline'] || '' == $tagline ) ? true : false;  // phpcs:ignore

		$schema_type = cagov_get_schema_type();

		// Build our site title.
		$site_title = apply_filters(
			'cagov_site_title_output',
			sprintf(
				'<span class="main-title org-name-dept">
					%3$s
				</span>',
				( is_front_page() && is_home() ) ? 'h1' : 'p',
				esc_url( apply_filters( 'cagov_site_title_href', home_url( '/' ) ) ),
				get_bloginfo( 'name' ),
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
				html_entity_decode( get_bloginfo( 'description', 'display' ) ), // phpcs:ignore
				'microdata' === cagov_get_schema_type() ? ' itemprop="description"' : ''
			)
		);

		// Site title and tagline.
		if ( false === $disable_title || false === $disable_tagline ) {
			if ( cagov_needs_site_branding_container() ) {
				echo '<div class="branding site-branding-container"><div class="container with-logo">';
				cagov_construct_logo();
			}

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- outputting site title and tagline. False positive.
			echo apply_filters(
				'cagov_site_branding_output',
				sprintf(
					'<a class="site-branding grid-org-name" href="/">
						%1$s
						%2$s
					</a>
					<div class="cagov-nav mobile-icons grid-mobile-icons">
      <div class="cagov-nav mobile-search">
        <button class="search-btn" aria-expanded="true">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="17px"
            height="17px" viewBox="0 0 17 17" style="enable-background:new 0 0 17 17;" xml:space="preserve">
            <path class="blue" d="M16.4,15.2l-4-4c2-2.6,1.8-6.5-0.6-8.9c-1.3-1.3-3-2-4.8-2S3.5,1,2.2,2.3c-2.6,2.6-2.6,6.9,0,9.6
      c1.3,1.3,3,2,4.8,2c1.4,0,2.9-0.5,4.1-1.4l4.1,4c0.2,0.2,0.4,0.3,0.7,0.3c0.2,0,0.5-0.1,0.7-0.3C16.7,16.2,16.7,15.6,16.4,15.2
      L16.4,15.2z M7,12c-1.3,0-2.6-0.5-3.5-1.4c-1.9-1.9-1.9-5.1,0-7C4.4,2.7,5.6,2.1,7,2.1s2.6,0.5,3.5,1.4c0.9,0.9,1.4,2.2,1.4,3.5
      c0,1.3-0.5,2.6-1.4,3.5C9.5,11.5,8.3,12,7,12z"></path>
          </svg>
          <span>Search</span>
        </button>
      </div>
      <button class="menu-trigger cagov-nav open-menu" aria-label="Navigation menu" aria-haspopup="true" aria-expanded="false"
        aria-owns="mainMenu" aria-controls="mainMenu">
        <div class="cagov-nav hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
        <div class="cagov-nav menu-trigger-label menu-label" data-openlabel="Menu" data-closelabel="Close">Menu</div>
      </button>
    </div>
	 <div class="search-container grid-search">
      <form class="site-search" action="/serp/">
        <span class="sr-only" id="SearchInput">Custom Google Search</span>
        <input type="text" id="q" name="q" aria-labelledby="SearchInput" placeholder="Search this website" class="search-textfield">
        <button type="submit" class="search-submit">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="17px" height="17px" viewBox="0 0 17 17" style="enable-background:new 0 0 17 17;"
            xml:space="preserve">
            <path class="blue" d="M16.4,15.2l-4-4c2-2.6,1.8-6.5-0.6-8.9c-1.3-1.3-3-2-4.8-2S3.5,1,2.2,2.3c-2.6,2.6-2.6,6.9,0,9.6
        c1.3,1.3,3,2,4.8,2c1.4,0,2.9-0.5,4.1-1.4l4.1,4c0.2,0.2,0.4,0.3,0.7,0.3c0.2,0,0.5-0.1,0.7-0.3C16.7,16.2,16.7,15.6,16.4,15.2
        L16.4,15.2z M7,12c-1.3,0-2.6-0.5-3.5-1.4c-1.9-1.9-1.9-5.1,0-7C4.4,2.7,5.6,2.1,7,2.1s2.6,0.5,3.5,1.4c0.9,0.9,1.4,2.2,1.4,3.5
        c0,1.3-0.5,2.6-1.4,3.5C9.5,11.5,8.3,12,7,12z" />
          </svg>
          <span class="sr-only">Submit</span>
        </button>
        <button class="search-close">Close</button>
      </form>
    </div>',
					( ! $disable_title ) ? $site_title : '',
					( ! $disable_tagline ) ? $site_tagline : ''
				)
			);

			if ( cagov_needs_site_branding_container() ) {
				echo '</div></div>';
			}
		}
	}
}

add_filter( 'cagov_header_items_order', 'cagov_reorder_inline_site_branding' );
/**
 * Remove the logo from it's usual position.
 *
 * @since 2.3
 * @param array $order Order of the header items.
 */
function cagov_reorder_inline_site_branding( $order ) {
	if ( ! cagov_get_option( 'inline_logo_site_branding' ) || ! cagov_has_logo_site_branding() ) {
		return $order;
	}

	return array(
		'header-widget',
		'site-branding',
	);
}

if ( ! function_exists( 'cagov_construct_header_widget' ) ) {
	/**
	 * Build the header widget.
	 *
	 * @since 1.3.28
	 */
	function cagov_construct_header_widget() {
		if ( is_active_sidebar( 'header' ) ) :
			?>
			<div class="header-widget">
				<?php dynamic_sidebar( 'header' ); ?>
			</div>
			<?php
		endif;
	}
}

add_action( 'cagov_before_header_content', 'cagov_do_site_logo', 5 );
/**
 * Add the site logo to our header.
 * Only added if we aren't using floats to preserve backwards compatibility.
 *
 * @since 3.0.0
 */
function cagov_do_site_logo() {
	if ( ! cagov_is_using_flexbox() || cagov_needs_site_branding_container() ) {
		return;
	}

	cagov_construct_logo();
}

add_action( 'cagov_before_header_content', 'cagov_do_site_branding' );
/**
 * Add the site branding to our header.
 * Only added if we aren't using floats to preserve backwards compatibility.
 *
 * @since 3.0.0
 */
function cagov_do_site_branding() {
	if ( ! cagov_is_using_flexbox() ) {
		return;
	}

	cagov_construct_site_title();
}

add_action( 'cagov_after_header_content', 'cagov_do_header_widget' );
/**
 * Add the header widget to our header.
 * Only used when grid isn't using floats to preserve backwards compatibility.
 *
 * @since 3.0.0
 */
function cagov_do_header_widget() {
	if ( ! cagov_is_using_flexbox() ) {
		return;
	}

	// cagov_construct_header_widget();
}

if ( ! function_exists( 'cagov_top_bar' ) ) {
	add_action( 'cagov_before_header', 'cagov_top_bar', 5 );
	/**
	 * Build our top bar.
	 *
	 * @since 1.3.45
	 */
	function cagov_top_bar() {
		if ( ! is_active_sidebar( 'top-bar' ) ) {
			return;
		}
		?>
		<div <?php cagov_do_attr( 'top-bar' ); ?>>
			<div <?php cagov_do_attr( 'inside-top-bar' ); ?>>
				<?php dynamic_sidebar( 'top-bar' ); ?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'cagov_pingback_header' ) ) {
	add_action( 'wp_head', 'cagov_pingback_header' );
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 *
	 * @since 1.3.42
	 */
	function cagov_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}

if ( ! function_exists( 'cagov_add_viewport' ) ) {
	add_action( 'wp_head', 'cagov_add_viewport', 1 );
	/**
	 * Add viewport to wp_head.
	 *
	 * @since 1.1.0
	 */
	function cagov_add_viewport() {
		echo apply_filters( 'cagov_meta_viewport', '<meta name="viewport" content="width=device-width, initial-scale=1">' );  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

add_action( 'cagov_before_header', 'cagov_do_skip_to_content_link', 2 );
/**
 * Add skip to content link before the header.
 *
 * @since 2.0
 */
function cagov_do_skip_to_content_link() {
	printf(
		'<a class="screen-reader-text skip-link" href="#content" title="%1$s">%2$s</a>',
		esc_attr__( 'Skip to content', 'generatepress' ),
		esc_html__( 'Skip to content', 'generatepress' )
	);
}
