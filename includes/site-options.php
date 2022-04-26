<?php

/* STATEWIDE HEADER WIDGET */

// @TODO do we need this & if so, what's it for?
if (!function_exists('cagov_construct_header_widget')) {
	/**
	 * Build the header widget.
	 *
	 * @since 1.3.28
	 */
	function cagov_construct_header_widget()
	{
		if (is_active_sidebar('header')) :
?>
			<div class="header-widget">
				<?php dynamic_sidebar('header'); ?>
			</div>
	<?php
		endif;
	}
}

/* COLOR SCHEME CUSTOMIZER */

function cagov_customize_register($wp_customize)
{
	$wp_customize->add_setting('cagov_color_theme');

	$wp_customize->add_control(
		'cagov_color_theme',
		array(
			'type' => 'select',
			'label' => __('Color Scheme', 'cagov_wp_theme'),
			'section' => 'title_tagline',
			'choices' => array(
				'cagov' => __('CAgov', 'cagov_wp_theme'),
				'cannabis' => __('Cannabis', 'cagov_wp_theme'),
				'drought' => __('Drought', 'cagov_wp_theme'),
			),

			'settings' => 'cagov_color_theme',
			'priority'   => 15,
		)

	);
}

add_action('customize_register', 'cagov_customize_register');