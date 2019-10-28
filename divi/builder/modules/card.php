<?php

if( ! class_exists('ET_Builder_CAWeb_Module') ){
    require_once( dirname(__DIR__) . '/class-caweb-builder-element.php');
}

class CAWeb_Module_Card extends ET_Builder_CAWeb_Module {

	public $slug       = 'et_pb_ca_card';
	public $vb_support = 'on';

	public function init() {
        $this->name = esc_html__( 'Card', 'divi-state-child-modules' );
        $this->main_css_element = '%%order_class%%';
        
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'style'  => esc_html__('Style', 'divi-state-child-modules'),
                    'header' => esc_html__('Header', 'divi-state-child-modules'),
                    'body'   => esc_html__('Body', 'divi-state-child-modules'),
                    'footer'   => esc_html__('Footer', 'divi-state-child-modules'),
                ),
                'advanced' => array(
                    'toggles' => array(
                        'style'  		=> esc_html__('Style', 'et_builder'),
                        'header' 		=> esc_html__('Header', 'et_builder'),
                        'footer'   	=> esc_html__('Footer', 'et_builder'),
                        'text' => array(
                            'title'    => esc_html__('Text', 'et_builder'),
                            'priority' => 49,
                        ),
                    ),
                ),
            ),
        );
	}

	public function get_fields() {
        $general_fields = array(
            'card_layout' => array(
                'label'             => esc_html__('Card Style', 'divi-state-child-modules'),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'options'           => array(
                    'default' => esc_html__('Default', 'divi-state-child-modules'),
                    'standout'  => esc_html__('Standout', 'divi-state-child-modules'),
                    'overstated'  => esc_html__('Overstated', 'divi-state-child-modules'),
                    'understated'  => esc_html__('Understated', 'divi-state-child-modules'),
                    'custom' => esc_html__('Custom', 'et_builder'),
                ),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'show_image' => array(
                'label'           => esc_html__('Include Image', 'divi-state-child-modules'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'divi-state-child-modules'),
                    'on'  => esc_html__('Yes', 'divi-state-child-modules'),
                ),
                'affects' => array('featured_image'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'featured_image' => array(
                'label' => esc_html__('Featured Image', 'divi-state-child-modules'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'divi-state-child-modules'),
                'choose_text' => esc_attr__('Choose a Background Image', 'divi-state-child-modules'),
                'update_text' => esc_attr__('Set As Background', 'divi-state-child-modules'),
                'description' => esc_html__('If defined, this image will be used as the background for this location. To remove a background image, simply delete the URL from the settings field.', 'divi-state-child-modules'),
                'show_if' => array('show_image' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'style',
            ),
            'include_header' => array(
                'label'           => esc_html__('Header', 'et_builder'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'et_builder'),
                    'on'  => esc_html__('Yes', 'et_builder'),
                ),
                'affects' => array('title', 'text_color'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'header',
            ),
            'title' => array(
                'label'           => esc_html__('Header Title', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter a header title for the card.', 'et_builder'),
                'show_if'			 => array('include_header' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'header',
            ),
            'content' => array(
                'label'           => esc_html__('Content', 'et_builder'),
                'type'            => 'tiny_mce',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can create the content that will be used within the card.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'body',
            ),
            'show_button' => array(
                'label'           => esc_html__('Button', 'et_builder'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'et_builder'),
                    'on'  => esc_html__('Yes', 'et_builder'),
                ),
                'affects' => array('button_text', 'button_link'),
                'tab_slug' => 'general',
                'toggle_slug' => 'body',
            ),
            'button_text' => array(
                'label'           => esc_html__('Button Text', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the button.', 'et_builder'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'body',
            ),
            'button_link' => array(
                'label'           => esc_html__('Card URL', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Here you can enter the URL for the location.', 'et_builder'),
                'show_if' => array('show_button' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug'		=> 'body',
            ),
            'include_footer' => array(
                'label'           => esc_html__('Footer', 'et_builder'),
                'type'            => 'yes_no_button',
                'option_category' => 'configuration',
                'options'         => array(
                    'off' => esc_html__('No', 'et_builder'),
                    'on'  => esc_html__('Yes', 'et_builder'),
                ),
                'affects' => array('footer_text', 'footer_color'),
                'tab_slug' => 'general',
                'toggle_slug' => 'footer',
            ),
            'footer_text' => array(
                'label'           => esc_html__('Footer Text', 'et_builder'),
                'type'            => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Enter text for the footer.', 'et_builder'),
                'show_if' => array('include_footer' => 'on'),
                'tab_slug' => 'general',
                'toggle_slug' => 'footer',
            ),
            'admin_label' => array(
                'label'       => esc_html__('Admin Label', 'et_builder'),
                'type'        => 'text',
                'description' => esc_html__('This will change the label of the module in the builder for easy identification.', 'et_builder'),
                'tab_slug' => 'general',
                'toggle_slug' => 'admin_label',
            ),
        );
        
        $design_fields = array(
            'card_color' => array(
                'label'             => esc_html__('Set Card Color', 'et_builder'),
                'type'              => 'color-alpha',
                'custom_color'      => true,
                'description'       => esc_html__('Here you can define a custom card color.', 'et_builder'),
                'show_if' => array('card_layout' => 'custom'),
                'tab_slug' => 'advanced',
                'toggle_slug'		=> 'style',
            ),
            'text_color' => array(
                'label'             => esc_html__('Heading Color', 'et_builder'),
                'type'              => 'color-alpha',
                'custom_color'      => true,
                'description'       => esc_html__('Here you can define a custom text color.', 'et_builder'),
                'show_if'			 => array('include_header' => 'on'),
                'tab_slug' => 'advanced',
                'toggle_slug'		=> 'header',
            ),
            'footer_color' => array(
                'label'             => esc_html__('Footer Color', 'et_builder'),
                'type'              => 'color-alpha',
                'custom_color'      => true,
                'description'       => esc_html__('Here you can define a custom text color.', 'et_builder'),
                'show_if'			 => array('include_footer' => 'on'),
                'tab_slug' => 'advanced',
                'toggle_slug'		=> 'footer',
            ),
        );

        $advanced_fields = array(
        );

        return array_merge($general_fields, $design_fields, $advanced_fields);
	}

	public function render( $unprocessed_props, $content = null, $render_slug ) {
        $card_layout = $this->props['card_layout'];
        $card_color = $this->props['card_color'];
        
		$show_image = $this->props['show_image'];
        $featured_image = $this->props['featured_image'];

        $include_header = $this->props['include_header'];
        $title = $this->props['title'];
        $text_color = $this->props['text_color'];

        $include_footer = $this->props['include_footer'];
        $footer_text = $this->props['footer_text'];
        $footer_color = $this->props['footer_color'];

        $show_button = $this->props['show_button'];
        $button_text = $this->props['button_text'];
        $button_link = $this->props['button_link'];

		$content = $this->content;
		
        $this->add_classname('card');
        $this->add_classname(sprintf('card-%1$s', "custom" == $card_layout ? 'default' : $card_layout));
        $class = sprintf(' class="%1$s" ', $this->module_classname($render_slug));

        $button_link = ! empty($button_link) ? esc_url($button_link) : '';

        $card_color = ! empty($card_color) && "custom" == $card_layout ? sprintf(' style="background-color: %1$s;"', $card_color) : "";
        $text_color = ! empty($text_color) ? sprintf(' style="color: %1$s;"', $text_color) : "";
        $footer_color = ! empty($footer_color) ? sprintf(' style="color: %1$s;"', $footer_color) : "";

		$display_image = "on" == $show_image ? sprintf('<img class="card-img-top img-responsive" src="%1$s" alt="Card image cap">', $featured_image) : '';

		$display_header = "on" == $include_header ? sprintf('<div class="card-header"><h4 class="card-title"%1$s>%2$s</h4></div>', $text_color, $title) : '';

		$display_button = "on" == $show_button ? sprintf('<a href="%1$s" class="btn btn-default" target="_blank">%2$s</a>', $button_link, $button_text) : '';

        $display_footer = "on" == $include_footer ? sprintf('<div class="card-footer"%1$s>%2$s</div>', $footer_color, $footer_text) : '';

		$output = sprintf('<div%1$s%2$s>%3$s%4$s<div class="card-block"%5$s>%6$s%7$s</div>%8$s</div>', $this->module_id(), $class, $display_image, $display_header, $card_color, $content, $display_button, $display_footer);

        return $output;
	}
}

new CAWeb_Module_Card;
