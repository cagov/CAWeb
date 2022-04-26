<?php
/**
 * Footer elements.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'cagov_construct_footer' ) ) {
	add_action( 'cagov_footer', 'cagov_construct_footer' );
	/**
	 * Build our footer.
	 *
	 * @since 1.3.42
	 */
	function cagov_construct_footer() {
		?>
<footer>
<cagov-back-to-top data-hide-after="1000" data-label="Back to top">
    </cagov-back-to-top>
  	<div class="bg-light-grey">
    	<div class="container">
		 <a href="https://ca.gov" class="cagov-logo" title="ca.gov" rel="noopener noreferrer" target="_blank">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          width="34px" height="34px" viewBox="0 0 44 34" style="enable-background:new 0 0 44 34;" xml:space="preserve">

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
            <path class="gov"
              d="M16.8,27.2c0.4,0,0.8,0.2,1.1,0.5c0.3,0.3,0.5,0.7,0.5,1.1c0,0.4-0.2,0.8-0.5,1.1c-0.3,0.3-0.7,0.5-1.1,0.5
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
      </a>
				<?php
				/**
				 * cagov_before_copyright hook.
				 *
				 * @since 0.1
				 *
				 * @hooked cagov_footer_bar - 15
				 */
				do_action( 'cagov_before_copyright' );
				?>
			
		</div><!--container-->
		<div class="container pt-0">
      			<p class="copyright">Copyright © 2021 State of California</p>
   	</div><!--container-->
	</div><!--bg-light-grey-->
</footer>
		<?php
	}
}

if ( ! function_exists( 'cagov_footer_bar' ) ) {
	add_action( 'cagov_before_copyright', 'cagov_footer_bar', 15 );
	/**
	 * Build our footer bar
	 *
	 * @since 1.3.42
	 */
	function cagov_footer_bar() {
		if ( ! is_active_sidebar( 'footer-bar' ) ) {
			return;
		}
		?>

		<div class="footer-secondary-links">
			<div class="footer-bar">
				<?php dynamic_sidebar( 'footer-bar' ); ?>
			</div>
		</div>

		<?php
	}
}

if ( ! function_exists( 'cagov_add_footer_info' ) ) {
	add_action( 'cagov_credits', 'cagov_add_footer_info' );
	/**
	 * Add the copyright to the footer
	 *
	 * @since 0.1
	 */
	function cagov_add_footer_info() {
		$copyright = sprintf(
			'<span class="copyright">&copy; %1$s %2$s</span> &bull; %4$s <a href="%3$s"%6$s>%5$s</a>',
			date( 'Y' ), // phpcs:ignore
			get_bloginfo( 'name' ),
			esc_url( 'https://generatepress.com' ),
			_x( 'Built with', 'GeneratePress', 'generatepress' ),
			__( 'GeneratePress', 'generatepress' ),
			'microdata' === cagov_get_schema_type() ? ' itemprop="url"' : ''
		);

		echo apply_filters( 'cagov_copyright', $copyright ); // phpcs:ignore
	}
}

/**
 * Build our individual footer widgets.
 * Displays a sample widget if no widget is found in the area.
 *
 * @since 2.0
 *
 * @param int $widget_width The width class of our widget.
 * @param int $widget The ID of our widget.
 */
function cagov_do_footer_widget( $widget_width, $widget ) {
	$widget_classes = sprintf(
		'footer-widget-%s',
		absint( $widget )
	);

	if ( ! cagov_is_using_flexbox() ) {
		$widget_width = apply_filters( "cagov_footer_widget_{$widget}_width", $widget_width );
		$tablet_widget_width = apply_filters( "cagov_footer_widget_{$widget}_tablet_width", '50' );

		$widget_classes = sprintf(
			'footer-widget-%1$s grid-parent grid-%2$s tablet-grid-%3$s mobile-grid-100',
			absint( $widget ),
			absint( $widget_width ),
			absint( $tablet_widget_width )
		);
	}
	?>
	<div class="<?php echo $widget_classes; // phpcs:ignore ?> footer-secondary-links">
		<?php dynamic_sidebar( 'footer-' . absint( $widget ) ); ?>
	</div>
	<?php
}

if ( ! function_exists( 'cagov_construct_footer_widgets' ) ) {
	add_action( 'cagov_footer', 'cagov_construct_footer_widgets', 5 );
	/**
	 * Build our footer widgets.
	 *
	 * @since 1.3.42
	 */
	function cagov_construct_footer_widgets() {
		// Get how many widgets to show.
		$widgets = cagov_get_footer_widgets();

		if ( ! empty( $widgets ) && 0 !== $widgets ) :

			// If no footer widgets exist, we don't need to continue.
			if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) && ! is_active_sidebar( 'footer-4' ) && ! is_active_sidebar( 'footer-5' ) ) {
				return;
			}

			// Set up the widget width.
			$widget_width = '';

			if ( 1 === (int) $widgets ) {
				$widget_width = '100';
			}

			if ( 2 === (int) $widgets ) {
				$widget_width = '50';
			}

			if ( 3 === (int) $widgets ) {
				$widget_width = '33';
			}

			if ( 4 === (int) $widgets ) {
				$widget_width = '25';
			}

			if ( 5 === (int) $widgets ) {
				$widget_width = '20';
			}
			?>
			<section aria-label="agency footer" class="agency-footer">
    <div class="container">
	 <div class="footer-logo">
	 <?php cagov_construct_logo(); ?>
        </div>
						<?php
						if ( $widgets >= 1 ) {
							cagov_do_footer_widget( $widget_width, 1 );
						}

						if ( $widgets >= 2 ) {
							cagov_do_footer_widget( $widget_width, 2 );
						}

						if ( $widgets >= 3 ) {
							cagov_do_footer_widget( $widget_width, 3 );
						}

						if ( $widgets >= 4 ) {
							cagov_do_footer_widget( $widget_width, 4 );
						}

						if ( $widgets >= 5 ) {
							cagov_do_footer_widget( $widget_width, 5 );
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
		do_action( 'cagov_after_footer_widgets' );
	}
}

if ( ! function_exists( 'cagov_back_to_top' ) ) {
	add_action( 'cagov_after_footer', 'cagov_back_to_top' );
	/**
	 * Build the back to top button
	 *
	 * @since 1.3.24
	 */
	function cagov_back_to_top() {
		$cagov_settings = wp_parse_args(
			get_option( 'cagov_settings', array() ),
			cagov_get_defaults()
		);

		if ( 'enable' !== $cagov_settings['back_to_top'] ) {
			return;
		}

		echo apply_filters( // phpcs:ignore
			'cagov_back_to_top_output',
			sprintf(
				'<cagov-back-to-top data-hide-after="1000" data-label="Back to top">
				</cagov-back-to-top>',
				esc_attr__( 'Scroll back to top', 'generatepress' ),
				absint( apply_filters( 'cagov_back_to_top_scroll_speed', 400 ) ),
				absint( apply_filters( 'cagov_back_to_top_start_scroll', 300 ) ),
				esc_attr( apply_filters( 'cagov_back_to_top_icon', 'fa-angle-up' ) ),
				cagov_get_svg_icon( 'arrow-up' )
			)
		);
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