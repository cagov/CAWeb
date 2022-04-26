<?php 


if (!function_exists('cagov_construct_logo')) {
	/**
	 * Build the logo
	 *
	 * @since 1.3.28
	 */
	function cagov_construct_logo()
	{
		$logo_url = (function_exists('the_custom_logo') && get_theme_mod('custom_logo')) ? wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full') : false;
		$logo_url = ($logo_url) ? $logo_url[0] : cagov_get_option('logo');

		$logo_url = esc_url(apply_filters('cagov_logo', $logo_url));
		$retina_logo_url = esc_url(apply_filters('cagov_retina_logo', cagov_get_option('retina_logo')));

		// If we don't have a logo, bail.
		if (empty($logo_url)) {
			return;
		}

		/**
		 * cagov_before_logo hook.
		 *
		 * @since 0.1
		 */
		do_action('cagov_before_logo');

		$attr = apply_filters(
			'cagov_logo_attributes',
			array(
				'class' => 'header-image is-logo-image',
				'alt'   => esc_attr(apply_filters('cagov_logo_title', get_bloginfo('name', 'display'))),
				'src'   => $logo_url,
				'title' => esc_attr(apply_filters('cagov_logo_title', get_bloginfo('name', 'display'))),
			)
		);

		if ('' !== $retina_logo_url) {
			$attr['srcset'] = $logo_url . ' 1x, ' . $retina_logo_url . ' 2x';

			// Add dimensions to image if retina is set. This fixes a container width bug in Firefox.
			if (function_exists('the_custom_logo') && get_theme_mod('custom_logo')) {
				$data = wp_get_attachment_metadata(get_theme_mod('custom_logo'));

				if (!empty($data)) {
					$attr['width'] = $data['width'];
					$attr['height'] = $data['height'];
				}
			}
		} elseif (cagov_is_using_flexbox()) {
			// Add this to flexbox version only until we can verify it won't conflict with existing installs.
			if (function_exists('the_custom_logo') && get_theme_mod('custom_logo')) {
				$data = wp_get_attachment_metadata(get_theme_mod('custom_logo'));

				if (!empty($data)) {
					$attr['width'] = $data['width'];
					$attr['height'] = $data['height'];
				}
			}
		}

		$attr = array_map('esc_attr', $attr);

		$html_attr = '';
		foreach ($attr as $name => $value) {
			$html_attr .= " $name=" . '"' . $value . '"';
		}

		// Print our HTML.
		echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			'cagov_logo_output',
			sprintf(
				'<a class="site-logo grid-logo" href="%1$s" title="%2$s">
						<img %3$s />
				</a>',
				esc_url(apply_filters('cagov_logo_href', home_url('/'))),
				esc_attr(apply_filters('cagov_logo_title', get_bloginfo('name', 'display'))),
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
		do_action('cagov_after_logo');
	}
}