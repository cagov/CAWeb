<?php
/*
Divi Icon Field Names
make sure the field name is one of the following:
'font_icon', 'button_one_icon', 'button_two_icon',  'button_icon'
*/

class ET_Builder_Module_CA_Post_List extends ET_Builder_CAWeb_Module{
	function init() {
		$this->name = esc_html__( 'Post List', 'et_builder' );

		$this->slug = 'et_pb_ca_post_list';

		$this->whitelisted_fields = array(
			'style',
			'title',
			'all_categories_button',
			'include_categories',
			'faq_style',
			'all_tags_button',
			'include_tags',
			'view_featured_image',
			'posts_number',
			'module_class',
			'module_id',
			'orderby',
			'admin_label',
			'title_size',
		);

		$this->fields_defaults = array(
			'orderby'  => array('date_desc'),
		);

		$this->main_css_element = '%%order_class%%';

		$this->options_toggles = array(
			'general' => array(
				'toggles' => array(
					'header' => esc_html__( 'Header', 'et_builder'),
					'style'  => esc_html__( 'Style', 'et_builder'),
					'body'   => esc_html__( 'Body', 'et_builder'),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'header' => esc_html__( 'Header', 'et_builder'),
					'text' => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 49,
					),
					'width' => array(
						'title'    => esc_html__( 'Sizing', 'et_builder' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
				),
			),
		);

	}
	function get_fields() {
		$fields = array(
			'title' => array(
				'label'       => esc_html__( 'Title', 'et_builder' ),
				'type'        => 'text',
				'description' => esc_html__( 'Enter a title for the Post List.', 'et_builder' ),
				'toggle_slug'			=> 'header',
			),
			'title_size' => array(
				'label'       => esc_html__( 'Title Size', 'et_builder' ),
				'type'        => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'h-1' => esc_html__('H1 - Large', 'et_builder' ),
					'h-2' => esc_html__('H2 - Medium', 'et_builder' ),
					'h-3' => esc_html__('H3 - Small', 'et_builder' ),
				),
				'description' => esc_html__( 'Select the size for the title of this module.', 'et_builder' ),
				'toggle_slug'			=> 'header',
				'tab_slug'			=> 'advanced',
			),
			'style' => array(
				'label'             => esc_html__( 'Content Type', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'course-list' => esc_html__( 'Course List', 'et_builder'),
					'events-list'  => esc_html__( 'Event List', 'et_builder' ),
					'exams-list'  => esc_html__( 'Exam List', 'et_builder' ),
					'faqs-list'  => esc_html__( 'FAQs List', 'et_builder' ),
					'general-list'  => esc_html__( 'General List', 'et_builder' ),
					'jobs-list'  => esc_html__( 'Jobs List', 'et_builder' ),
					'news-list'  => esc_html__( 'News List', 'et_builder' ),
					'profile-list'  => esc_html__( 'Profile List', 'et_builder' ),
				),
				'description'       => esc_html__( 'Here you can select the various list styles.', 'et_builder' ),
				'affects' => array('#et_pb_all_categories_button', '#et_pb_faq_style', '#et_pb_view_featured_image'),
				'toggle_slug'			=> 'style',
			),
			'faq_style' => array(
				'label'             => esc_html__( 'Accordion Style', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'accordion' => esc_html__( 'Accordion', 'et_builder'),
					'toggle'  => esc_html__( 'Toggle', 'et_builder' ),
				),
				'description'       => esc_html__( 'Here you can select the various list styles.', 'et_builder' ),
				'depends_show_if' => 'faqs-list',
				'toggle_slug'			=> 'style',
			),
			'posts_number' => array(
				'label'             => esc_html__( 'Posts Number', 'et_builder' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Choose how many posts you would like to display in the list. Default is all.', 'et_builder' ),
				'toggle_slug'				=> 'style',
			),
			'view_featured_image' => array(
				'label'           => esc_html__( 'Featured Image', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'depends_show_if_not' => 'faqs-list',
				'toggle_slug'			=> 'style',
			),
			'all_categories_button' => array(
				'label'           => esc_html__( 'Include All Categories', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'affects' => array(
							'#et_pb_include_categories',
				),
				'depends_show_if' => 'general-list',
				'toggle_slug'			=> 'style',
			),
			'include_categories' => array(
				'label'            => esc_html__( 'Select Categories', 'et_builder' ),
				'renderer'         => 'et_builder_include_categories_option',
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms' => false,
				),
				'description'      => esc_html__( 'Choose which categories you would like to include in the list.', 'et_builder' ),
				'depends_show_if' => 'off',
				'toggle_slug'			=> 'style',
			),
			'all_tags_button' => array(
				'label'           => esc_html__( 'Include All Tags', 'et_builder' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
					),
				'affects' => array('#et_pb_include_tags',
				),
				'toggle_slug'			=> 'style',
			),
			'include_tags' => array(
				'label'            => esc_html__( 'Tags', 'et_builder' ),
				'renderer'         => 'et_builder_include_tags_option',
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms' => false,
				),
				'description'      => esc_html__( 'Choose which tags you would like to include in the list.', 'et_builder' ),
				'depends_show_if' => 'off',
				'toggle_slug'			=> 'style',
			),
			'orderby' => array(
				'label'             => esc_html__( 'Order By', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => array(
					'date_desc'  => esc_html__( 'Date: new to old', 'et_builder' ),
					'date_asc'   => esc_html__( 'Date: old to new', 'et_builder' ),
					'title_asc'  => esc_html__( 'Title: a-z', 'et_builder' ),
					'title_desc' => esc_html__( 'Title: z-a', 'et_builder' ),
					'rand'       => esc_html__( 'Random', 'et_builder' ),
				),
				'description'       => esc_html__( 'Here you can adjust the order in which posts are displayed.', 'et_builder' ),
				'toggle_slug'			=> 'style',
			),
			'module_id' => array(
			  'label'           => esc_html__( 'CSS ID', 'et_builder' ),
			  'type'            => 'text',
			  'option_category' => 'configuration',
			  'tab_slug'        => 'custom_css',
				'toggle_slug'			=> 'classes',
			  'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class' => array(
			  'label'           => esc_html__( 'CSS Class', 'et_builder' ),
			  'type'            => 'text',
			  'option_category' => 'configuration',
			  'tab_slug'        => 'custom_css',
				'toggle_slug'			=> 'classes',
			  'option_class'    => 'et_pb_custom_css_regular',
			),
			'admin_label' => array(
			  'label'       => esc_html__( 'Admin Label', 'et_builder' ),
			  'type'        => 'text',
			  'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'et_builder' ),
				'toggle_slug'	=> 'admin_label',
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'et_builder' ),
				'type'            => 'multiple_checkboxes',
				'options'         => array(
					'phone'   => esc_html__( 'Phone', 'et_builder' ),
					'tablet'  => esc_html__( 'Tablet', 'et_builder' ),
					'desktop' => esc_html__( 'Desktop', 'et_builder' ),
				),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'et_builder' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'visibility',
			),
		);

		return $fields;

	}
	function render( $unprocessed_props, $content = null, $render_slug ) {
		$module_id            = $this->shortcode_atts['module_id'];
		$module_class         = $this->shortcode_atts['module_class'];
		$list_title            = $this->shortcode_atts['title'];
		$title_size    = $this->shortcode_atts['title_size'];
		$style            = $this->shortcode_atts['style'];
		$faq_style            = $this->shortcode_atts['faq_style'];
		$posts_number            = $this->shortcode_atts['posts_number'];
		$view_featured_image            = $this->shortcode_atts['view_featured_image'];
		$all_categories_button            = $this->shortcode_atts['all_categories_button'];
		$include_categories      = $this->shortcode_atts['include_categories'];
		$all_tags_button            = $this->shortcode_atts['all_tags_button'];
		$include_tags      = $this->shortcode_atts['include_tags'];
		$orderby                 = $this->shortcode_atts['orderby'];

		$order = '';

		$cat_array = array();

		$tag_array = array();

		switch( $orderby ) {
			case 'date_desc':
					$orderby = 'date';
					$order = 'DESC';
					break;
			case 'date_asc':
					$orderby = 'date';

					$order = 'ASC';

					break;

			case 'title_asc':
					$orderby = 'title';

					$order = 'ASC';

					break;

			case 'title_desc':
					$orderby = 'title';

					$order = 'DESC';

					break;

			case 'rand':
					$orderby = 'rand';

					break;

		}

			if("on" == $all_categories_button ){
				$cat_array = get_terms( 'category', array('orderby' => $orderby, 'hide_empty' => 0, 'fields' => 'ids'));

			}elseif ( "" !== $include_categories) {
				$cat_array = $include_categories;
			}

			if("on" == $all_tags_button){
				$tag_array = array();
				//$tag_array = get_tags( array( 'fields' => 'names' ) );
			}elseif("" !== $include_tags){
				$tag_array =	$include_tags;
			}

			$posts_number = ( ! empty($posts_number) ? $posts_number : -1);

			$all_posts = caweb_return_posts($cat_array, $tag_array, -1, $orderby, $order );

			setlocale(LC_MONETARY, 'en_US.UTF-8');

			if ( ! empty($list_title)){
				if ('h-1' == $title_size){
					$list_title = sprintf('<h1>%1$s</h1>', $list_title);
				}
				elseif ('h-2' == $title_size){
					$list_title = sprintf('<h2>%1$s</h2>', $list_title);
				}
				elseif ('h-3' == $title_size) {
					$list_title = sprintf('<h3>%1$s</h3>', $list_title);
				}
			}

			$faqs = '';
			$output = '';
			global $faq_accordion_count;

			foreach ($all_posts as $a=>$p){
				if( $posts_number !== -1 && 0 == $posts_number )
				  break;

				// Get the CAWeb Post Handler
				$post_id = $all_posts[$a]->ID;
				$title = $all_posts[$a]->post_title;
				$url = get_permalink($all_posts[$a]->ID);
				$content = $all_posts[$a]->post_content;

				$post_content_handler = caweb_get_shortcode_from_content($content, 'et_pb_ca_post_handler');

				// if the hanlder is an object, construct the appropriate list item
				if ( is_object($post_content_handler) ){
					// List Style
					switch($style){
						// News List
						case "news-list":
								// if post contains a CAWeb News Post Handler
								if ( "news" == $post_content_handler->post_type_layout ){
									$news_title = sprintf('<div class="headline"><a href="%1$s">%2$s</a></div>', $url, $title);

                  $image= ( "on" == $view_featured_image ?
                  				sprintf('<div class="thumbnail" style="">%1$s</div>', get_the_post_thumbnail($post_id, null, array('style'=>'width: 150px; height: 100px;') ))  : '' );

									$excerpt = caweb_get_excerpt($post_content_handler->content, 30);
									$excerpt = ( ! empty($excerpt) ?
															sprintf('<div class="description"><p>%1$s</p></div>', $excerpt ) : '' );

									$author = ( ! empty($post_content_handler->news_author) ?
															sprintf('Author: %1$s', $post_content_handler->news_author) : '');

                   $date =( ! empty($post_content_handler->news_publish_date) ? gmdate( 'M j, Y', strtotime( $post_content_handler->news_publish_date ) ) : '');

                  $date = ( ! empty($date) ? sprintf('Published: <time>%1$s</time>', $date) : '');

									$element = ( ! empty($author) || ! empty($date) ?
															sprintf('<div class="published">%1$s</div>', implode('<br />', array_filter( array($author, $date) ) ) ) : '');

									$output .=	sprintf('<article class="news-item">%1$s<div class="info" %5$s>%2$s%3$s%4$s</div></article>',
														$image, $news_title, $excerpt, $element, ( "on" == $view_featured_image ? 'style="padding-left: 175px;"' : '') );

									$posts_number--;
								}
								break;

						// Profile List
						case "profile-list":
						// if post contains a CAWeb Profile Post Handler
							if ( "profile" == $post_content_handler->post_type_layout ){
                $image= (  "on" == $view_featured_image ?
                         sprintf('<div class="thumbnail" >%1$s</div>', get_the_post_thumbnail($post_id, null, array('style'=>'width: 70px; height: 93px;') )) : '' );
                $no_img = ( empty($image) ? ' style="margin-left: 0px;" ': '');

								$t = sprintf('%1$s%2$s%3$s',
                             ( ! empty($post_content_handler->profile_name_prefix) ? sprintf('%1$s ', $post_content_handler->profile_name_prefix) : ''),
                             ( ! empty($post_content_handler->profile_name) ? $post_content_handler->profile_name : ''),
                             ( ! empty($post_content_handler->profile_career_title) ? sprintf(', %1$s', $post_content_handler->profile_career_title) : '') );

								$profile_title = sprintf('<div class="header" %3$s><div class="title" %4$s><a href="%1$s">%2$s</a></div></div>',
                                         $url, $t, $no_img, ( ! empty($image) ? ' style="min-height: 20px;" ': '')  );

								$position = ( ! empty($post_content_handler->profile_career_position) ?
												sprintf('%1$s', $post_content_handler->profile_career_position  )  : '' );
								$line1 = ( ! empty($post_content_handler->profile_career_line_1) ?
												sprintf('%1$s', $post_content_handler->profile_career_line_1 )  : '' );
								$line2 = ( ! empty($post_content_handler->profile_career_line_2) ?
												sprintf('%1$s', $post_content_handler->profile_career_line_2  )  : '' );
								$line3 = ( ! empty($post_content_handler->profile_career_line_3) ?
												sprintf('%1$s', $post_content_handler->profile_career_line_3 )  : '' );

								$fields = array_filter(array($position, $line1, $line2, $line3));

								$output .=	sprintf('<article class="profile-item">%1$s%2$s<div class="body" %5$s><p>%3$s</p></div>
																		<div class="footer"><a href="%4$s" class="btn btn-default">View More Details</a></div></article>',
																		$image, $profile_title, ( ! empty($fields) ? implode( '<br />', $fields ) : '<br />'), $url, $no_img);

								$posts_number--;
							}

							break;
						// Job List
						case "jobs-list":
								// if post contains a CAWeb Job Post Handler
								if ( "jobs" == $post_content_handler->post_type_layout ){
									$job_title = sprintf('<div class="title"><a href="%1$s">%2$s</a></div>', $url, $title);

									$addr = ( ! empty($post_content_handler->job_agency_address) ? $post_content_handler->job_agency_address : '');
									$city = ( ! empty($post_content_handler->job_agency_city) ? $post_content_handler->job_agency_city : '');
									$state = ( ! empty($post_content_handler->job_agency_state) ? $post_content_handler->job_agency_state : '');
									$zip = ( ! empty($post_content_handler->job_agency_zip) ? $post_content_handler->job_agency_zip : '');

									$location = array_filter( array($addr, $city, $state , $zip) );

									$location = ( ! empty($location) ? sprintf('<div class="location">Location: %1$s</div>', implode(", ", $location) ) : '' );

                  if( ! empty($post_content_handler->job_final_filing_date_chooser) && "on" == $post_content_handler->job_final_filing_date_chooser){
                      $job_final_filing_date_picker = gmdate( 'n/j/Y', strtotime( $post_content_handler->job_final_filing_date_picker ) );
                      $filing_date = sprintf('Final Filing Date:<time>%1$s</time><br />', $job_final_filing_date_picker);

                   }else{
                      $filing_date = sprintf('Final Filing Date: %1$s<br />',
                                     ( ! empty($post_content_handler->job_final_filing_date) ? $post_content_handler->job_final_filing_date : 'Until Filled') );

                   }

									$job_hours =   ( ! empty( $post_content_handler->job_hours ) ? sprintf('<div class="schedule">%1$s</div>', $post_content_handler->job_hours) : '' );

									$job_salary_min    = ( ! empty($post_content_handler->job_salary_min) ? caweb_is_money($post_content_handler->job_salary_min, "$0.00") : "$0.00" );
									$job_salary_max    = ( ! empty($post_content_handler->job_salary_max) ? caweb_is_money($post_content_handler->job_salary_max, "$0.00") : "$0.00" );

                  $job_salary_max = sprintf('  &mdash; %1$s', $job_salary_max );

                  $job_salary = '';
									$job_salary    = ( "on" == $post_content_handler->show_job_salary ?
									sprintf('<div class="salary-range">Salary Range: %1$s%2$s</div>', $job_salary_min, $job_salary_max ) : '' );

                  $job_position = '';
									if( ! empty( $post_content_handler->job_position_number ) && ! empty( $post_content_handler->job_rpa_number )){
										$job_position    = sprintf('Position Number: %1$s, RPA #%2$s', $post_content_handler->job_position_number, $post_content_handler->job_rpa_number);
									}elseif( ! empty( $post_content_handler->job_position_number ) ){
										$job_position    = sprintf('Position Number: %1$s', $post_content_handler->job_position_number);
									}elseif( ! empty( $post_content_handler->job_rpa_number ) ){
										$job_position    = sprintf('RPA #%1$s', $post_content_handler->job_rpa_number);
									}

									$position_type= ( ! empty($job_position) ? sprintf('<div class="position-number">%1$s</div>', $job_position) : '' );

									$output .= sprintf('<article class="job-item">
															<div class="header">%1$s%2$s</div>
															<div class="body">%3$s%4$s%5$s%6$s</div>
															<div class="footer"><a href="%7$s" class="btn btn-default">View More Details</a></div></article>',
																		$job_title, $filing_date, $position_type, $job_hours, $job_salary, $location, $url );
									$posts_number--;
								}
								break;
						// Event List
						case "events-list":
							// if post contains a CAWeb Event Post Handler
								if ( "event" == $post_content_handler->post_type_layout ){
									$event_title = sprintf('<h5 style="padding-bottom: 0!important;"><a href="%1$s" class="title" style="color: #428bca;">%2$s</a></h5>', $url, $title);

									$excerpt = caweb_get_excerpt($post_content_handler->content, 15);
									$excerpt = ( ! empty($excerpt) ?
															sprintf('<div class="description">%1$s</div>', $excerpt ) : '' );

                   $date = ( ! empty($post_content_handler->event_start_date) ?
                          sprintf('<div class="start-date"><time>%1$s</time></div>', gmdate( 'D, n/j/Y g:i a', strtotime($post_content_handler->event_start_date ) ) ) : '');

									$output .= sprintf('<article class="event-item">%1$s%2$s%3$s</article>', $event_title, $excerpt, $date );

									$posts_number--;
								}
								break;
						// Course List
						case "course-list":
							// if post contains a CAWeb Course Post Handler
								if ( "course" == $post_content_handler->post_type_layout ){
									$course_title = sprintf('<div class="title"><a href="%1$s">%2$s</a></div>', $url, $title);

									$image= ( "on" == $view_featured_image ?
													sprintf('<div class="thumbnail" >%1$s</div>', get_the_post_thumbnail($post_id, array(70, 70))) : '' );

									$excerpt = caweb_get_excerpt($post_content_handler->content, 20);
									$excerpt = ( ! empty($excerpt) ?
															sprintf('<div class="description">%1$s</div>', $excerpt ) : '' );

									$tmp = array(( ! empty($post_content_handler->course_address) ? $post_content_handler->course_address: ''),
															( ! empty($post_content_handler->course_city) ? $post_content_handler->course_city: ''),
															( ! empty($post_content_handler->course_state) ? $post_content_handler->course_state: ''),
															( ! empty($post_content_handler->course_zip) ? $post_content_handler->course_zip: ''));

									$location = array_filter($tmp );

									$location = ( ! empty($location) ?
											sprintf('<div class="location">Location: <a href="https://www.google.com/maps/place/%1$s">%1$s</a></div>', implode(", ", $location) ) : '' );

									$course_date = sprintf('<div class="datetime">%1$s - %2$s</div>',
																				( ! empty($post_content_handler->course_start_date) ? gmdate( 'M j, Y g:i a', strtotime($post_content_handler->course_start_date ) ) : ''),
																				( ! empty($post_content_handler->course_end_date)? gmdate( 'M j, Y g:i a', strtotime($post_content_handler->course_end_date ) ) :'') );

									$output .= sprintf('<article class="course-item">
															%1$s<div class="header">%2$s%3$s</div>
															<div class="body">%4$s%5$s</div>
															<div class="footer"><a href="%6$s" class="btn btn-default">View More Details</a></div></article>',
																		$image, $course_title, $course_date, $excerpt, $location, $url );

									$posts_number--;
								}
								break;
						// Exam List
						case "exams-list":
							// if post contains a CAWeb Course Post Handler
								if ( "exam" == $post_content_handler->post_type_layout ){
									$exam_title = sprintf('<div class="title"><a href="%1$s">%2$s</a></div>', $url, $title);

                  $pub = ( ! empty($post_content_handler->exam_published_date) ?
                          sprintf('<div class="published">Published: <time>%1$s</time></div>', gmdate( 'M j, Y', strtotime($post_content_handler->exam_published_date ) ) ) : '');

									$filing_date = ( ! empty($post_content_handler->exam_final_filing_date_chooser) && "on" == $post_content_handler->exam_final_filing_date_chooser ?
                            sprintf('<div class="filing-date">Final Filing Date: <time>%1$s</time></div>', gmdate( 'n/j/Y', strtotime( $post_content_handler->exam_final_filing_date_picker ) )) :
                                  sprintf('<div class="filing-date">Final Filing Date: <time>%1$s</time></div>',
                                          ( ! empty($post_content_handler->exam_final_filing_date) ? $post_content_handler->exam_final_filing_date : 'Until Filled') ) );

									$id = ( ! empty($post_content_handler->exam_id) ? sprintf('<div class="id">ID: %1$s</div>', $post_content_handler->exam_id) : '');
									$status = ( ! empty($post_content_handler->exam_status) ?  sprintf('<div class="base">Status: %1$s</div>', $post_content_handler->exam_status) : '');

									$output .= sprintf('<article class="exam-item">
															<div class="header">%1$s%2$s</div>
															<div class="body">%3$s%4$s</div>
															<div class="footer">%5$s<a href="%6$s" class="btn btn-default">View More Details</a></div></article>',
																		$exam_title, $filing_date, $id, $status, $pub, $url );
									$posts_number--;
								}
								break;

						// FAQs List
						case "faqs-list":

							if ( "faqs" == $post_content_handler->post_type_layout ){
									if("toggle" == $faq_style)
											$faqs .= sprintf('<li><a class="toggle">%1$s</a><div class="description">%2$s</div></li>', $title, $post_content_handler->content );

									if("accordion" == $faq_style){
										$open_faq = empty($faq_accordion_count) || 0 === $faq_accordion_count;

										$faqs .= sprintf('<div class="panel panel-default et_pb_toggle et_pb_accordion_item_%3$s %4$s">
																	<div class="et_pb_toggle_title panel-heading"><h4 class="panel-title"><a>%2$s</a></h4></div>',
																					$posts_number, $title, ( ! empty($faq_accordion_count) ? $faq_accordion_count : 0), ($open_faq ? ' et_pb_toggle_open' : ' et_pb_toggle_close'));

										$faqs .= sprintf('<div class="et_pb_toggle_content clearfix panel-body">
											%1$s</div></div>', $post_content_handler->content	);
										$faq_accordion_count++;
										//$faq_count++;
									}

								$posts_number--;
							}
							break;

						// General List
						case "general-list":
								// if post contains a CAWeb News Post Handler
								$list_types = array('news', 'profile', 'jobs', 'event', 'course', 'exam', 'general', 'faqs');
								if ( in_array( $post_content_handler->post_type_layout, $list_types )){

									$image= ( "on" == $view_featured_image ?
													sprintf('<div class="thumbnail" style="width: 150px; height: 100px; margin-right:15px; float:left;">%1$s</div>',
																	get_the_post_thumbnail($post_id, null, array('style'=>'width: 150px; height: 100px;') ))  : '' );

									$general_title = sprintf('<h5 style="padding-bottom: 0!important; %1$s">
																		<a href="%2$s" class="title" style="color: #428bca; background: url();">%3$s</a></h5>',
																			( "on" == $view_featured_image ? '' : ''), $url, $title);

									$excerpt = caweb_get_excerpt($post_content_handler->content, 45);
									$excerpt = sprintf('<div class="description" %2$s>%1$s</div>', $excerpt,
																			( "on" == $view_featured_image ? '' : '')  );

									$output .= sprintf('<article class="event-item" style="padding-left: 0px;">%1$s%2$s%3$s</article>', $image, $general_title, $excerpt );

									$posts_number--;
								}
								break;

					} // end of list type switch statement
				} // end of if is_object check
			}

		global $faq_list_count;

			$class = sprintf('et_pb_module et_pb_ca_post_list panel-group et_pb_accordion et_pb_accordion_%1$s %2$s', ( ! empty($faq_list_count) ? $faq_list_count : 0), ( ! empty($style) ? $style : ''));

		$class = esc_attr( $class );
		$class .= ( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' );

			if ( "faqs-list" == $style){

				if("toggle" == $faq_style)
					$output .= sprintf('<ul class="list-overstated accordion-list" style="list-style-type:none;">%1$s</ul>', $faqs);

				if("accordion" == $faq_style){
					$output .=  $faqs;
					$faq_list_count++;
				}
			}

			$output = sprintf('<div class="%1$s">%2$s%3$s</div> <!-- .et_pb_ca_post_list -->', $class, ( ! empty($list_title) ? $list_title : '' ), $output );

			$faq_accordion_count = 0;
			return $output;

	}
}
new ET_Builder_Module_CA_Post_List;

?>
