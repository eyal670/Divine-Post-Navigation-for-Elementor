<?php
/**
 * author: Eyal Ron
 */
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Divine_Post_Navigation extends Widget_Base {

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_name() {

		return 'divine-Post-Navigation';
	}

	public function get_title() {
		return __( 'Divine Post Navigation', 'elementor-custom-widget' );
	}

	public function get_icon() {
		return 'eicon-post-navigation';
	}

	protected function _register_controls() {

		/* Content Tab */
		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Basic', 'elementor-custom-widget' ),
			]
		);

		$this->add_control(
			'show_label',
			[
				'label' => __( 'Label', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-custom-widget' ),
				'label_off' => __( 'Hide', 'elementor-custom-widget' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_custom_labels',
			[
				'label' => __( 'Custom Labels', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'description' => 'whether to use post title as labels or custom labels',
				'label_on' => __( 'Yes', 'elementor-custom-widget' ),
				'label_off' => __( 'No', 'elementor-custom-widget' ),
				'default' => 'yes',
				'condition' => [
					'show_label' => 'yes',
				],
			]
		);

		$this->add_control(
			'prev_label',
			[
				'label' => __( 'Previous Label', 'elementor-custom-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Previous', 'elementor-custom-widget' ),
				'condition' => [
					'show_label' => 'yes',
				],
				'condition' => [
					'show_label' => 'yes',
					'show_custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'next_label',
			[
				'label' => __( 'Next Label', 'elementor-custom-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Next', 'elementor-custom-widget' ),
				'condition' => [
					'show_label' => 'yes',
					'show_custom_labels' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_arrow',
			[
				'label' => __( 'Arrows', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-custom-widget' ),
				'label_off' => __( 'Hide', 'elementor-custom-widget' ),
				'default' => 'yes',
				'condition' => [
					'show_arrow' => 'yes',
				],
			]
		);

		$this->add_control(
			'arrow',
			[
				'label' => __( 'Arrows Type', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'fa fa-angle-left' => __( 'Angle', 'elementor-custom-widget' ),
					'fa fa-angle-double-left' => __( 'Double Angle', 'elementor-custom-widget' ),
					'fa fa-chevron-left' => __( 'Chevron', 'elementor-custom-widget' ),
					'fa fa-chevron-circle-left' => __( 'Chevron Circle', 'elementor-custom-widget' ),
					'fa fa-caret-left' => __( 'Caret', 'elementor-custom-widget' ),
					'fa fa-arrow-left' => __( 'Arrow', 'elementor-custom-widget' ),
					'fa fa-long-arrow-left' => __( 'Long Arrow', 'elementor-custom-widget' ),
					'fa fa-arrow-circle-left' => __( 'Arrow Circle', 'elementor-custom-widget' ),
					'fa fa-arrow-circle-o-left' => __( 'Arrow Circle Negative', 'elementor-custom-widget' ),
				],
				'default' => 'fa fa-angle-left',
				'condition' => [
					'show_arrow' => 'yes',
				],
			]
		);
		$this->add_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'plugin-domain' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'plugin-domain' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'plugin-domain' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'condition' => [
					'show_label' => 'yes',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'style_label_section',
			[
				'label' => __( 'Label Settings', 'elementor-custom-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'plugin-domain' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .div-nav-title a',
			]
		);

				$this->start_controls_tabs(
			'btn_style_tabs'
		);
		$this->start_controls_tab(
			'btn_style_normal_tab',
			[
				'label' => __( 'Normal', 'divine-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Label Color', 'divine-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .div-post-nav .div-nav-title a' => 'color: {{VALUE}}',
				],
			]
		);


		$this->end_controls_tab();

		$this->start_controls_tab(
			'btn_style_hover_tab',
			[
				'label' => __( 'Hover', 'divine-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'label_color_hvr',
			[
				'label' => __( 'Label Color', 'divine-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .div-post-nav:hover .div-nav-title a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'style_image_section',
			[
				'label' => __( 'Image Settings', 'elementor-custom-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

			$this->add_control(
				'border_radius_settings',
				[
					'label' => __( 'Border Radius', 'plugin-name' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);
			$this->add_responsive_control(
				'border_radius_prev',
				[
					'label' => __( 'Previous Image', 'elementor-custom-widget' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .div-nav-prev img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_responsive_control(
				'border_radius_next',
				[
					'label' => __( 'Next Image', 'elementor-custom-widget' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%' ],
					'selectors' => [
						'{{WRAPPER}} .div-nav-next img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			$this->add_control(
				'hr',
				[
					'type' => \Elementor\Controls_Manager::DIVIDER,
				]
			);

			$this->add_control(
				'transition_speed',
				[
					'label' => __( 'transition speed', 'plugin-domain' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 's' ],
					'range' => [
						's' => [
							'min' => 0,
							'max' => 10,
							'step' => 0.1,
						],
					],
					'default' => [
						'unit' => 's',
						'size' => 0.3,
					],
					'selectors' => [
						'{{WRAPPER}} .div-post-nav img' => 'transition: {{SIZE}}{{UNIT}};',
					],
				]
			);
			$this->start_controls_tabs(
				'img_style_tabs'
			);
				$this->start_controls_tab(
					'img_style_normal_tab',
					[
						'label' => __( 'Normal', 'plugin-domain' ),
					]
				);
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'img_border',
							'label' => __( 'Border', 'plugin-domain' ),
							'selector' => '{{WRAPPER}} img',
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow',
							'label' => __( 'Box Shadow', 'plugin-domain' ),
							'selector' => '{{WRAPPER}} img',
						]
					);
					$this->add_group_control(
						Group_Control_Css_Filter::get_type(),
						[
							'name' => 'css_filters',
							'selector' => '{{WRAPPER}} .div-post-nav img',
						]
					);
					$this->add_control(
						'img_opacity',
						[
							'label' => __( 'Opacity', 'plugin-domain' ),
							'type' => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 1,
									'min' => 0.10,
									'step' => 0.01,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .div-post-nav img' => 'opacity: {{SIZE}};',
							],
						]
					);
				$this->end_controls_tab();
				$this->start_controls_tab(
					'img_style_hover_tab',
					[
						'label' => __( 'Hover', 'plugin-domain' ),
					]
				);
					$this->add_group_control(
						Group_Control_Border::get_type(),
						[
							'name' => 'img_border_hover',
							'label' => __( 'Border', 'plugin-domain' ),
							'selector' => '{{WRAPPER}} .div-post-nav:hover img',
						]
					);
					$this->add_group_control(
						Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow_hover',
							'label' => __( 'Box Shadow', 'plugin-domain' ),
							'selector' => '{{WRAPPER}} .div-post-nav:hover img',
						]
					);
					$this->add_group_control(
						Group_Control_Css_Filter::get_type(),
						[
							'name' => 'css_filters_hover',
							'selector' => '{{WRAPPER}} .div-post-nav:hover img',
						]
					);
					$this->add_responsive_control(
						'img_opacity_hover',
						[
							'label' => __( 'Opacity', 'elementor' ),
							'type' => Controls_Manager::SLIDER,
							'range' => [
								'px' => [
									'max' => 1,
									'min' => 0.10,
									'step' => 0.01,
								],
							],
							'selectors' => [
								'{{WRAPPER}} .div-post-nav:hover img' => 'opacity: {{SIZE}};',
							],
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();

			$this->add_control(
			'custom_img_dimension',
			[
				'label' => __( 'Image Dimension', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'plugin-name' ),
				'default' => [
					'width' => '150',
					'height' => '',
				],
			]
		);

		$this->end_controls_section();

		
		/* End of Content Tab */

		/* Layout Section */
		$this->start_controls_section(
			'layout_section',
			[
				'label' => __( 'Layout', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
			]
		);

		$this->add_control(
			'full_width_fixed',
			[
				'label' => __( 'Full Width Fixed btns', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-custom-widget' ),
				'label_off' => __( 'No', 'elementor-custom-widget' ),
				'default' => 'yes',
			]
		);
		$this->add_control(
			'fixed_pos_bottom',
			[
				'label' => __( 'Bottom Position', 'plugin-domain' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'vh' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
					'vh' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 15,
				],
				'selectors' => [
					'{{WRAPPER}} .full-width-nav .div-post-nav' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		/* End of Grid Layout Section */

	}

	protected function render( $instance = [] ) {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$thumb_width = $settings['custom_img_dimension']['width'];
		$thumb_height = $settings['custom_img_dimension']['height'];
		?>
		<style>
			.divine-post-navigation {
				display: flex;
				justify-content: space-evenly;
			}
			.divine-post-navigation > div{
				display: flex;
				flex-direction: column;
			}
			.full-width-nav .div-post-nav {
				position: fixed;
				bottom: <?php echo $settings['fixed_pos_bottom']['size'].$settings['fixed_pos_bottom']['unit'] ?>;
				display: flex;
				flex-direction: column;
				justify-content: center;
				z-index: 999;
			}
			.div-nav-title{
				width:100%;
				text-align: <?php echo $settings['text_align'] ?>;
			}
			.div-post-nav a{
				height: fit-content;
			}
			.full-width-nav .div-nav-next{
				right: 0;
			}
			.full-width-nav .div-nav-prev{
				left: 0;
			}
			.div-post-nav.div-nav-next {
				align-items: flex-end;
			}
			.div-post-nav.div-nav-prev {
				align-items: flex-start;
			}
			.div-post-nav.div-nav-prev  img {
			/* border-radius: 0 50px 50px 0 !important; */
			}
			.div-post-nav a {font-weight: 700;color: #000;padding: 0px;}
			.div-post-nav .div-nav-title {
				padding: 0 20px;
			}
			.div-post-nav:hover a{
				color: #3a3a3a;
			}
			.div-post-nav.div-nav-prev .div-nav-title {
				/* border-radius: 0 50px 50px 0; */
			}
			.div-post-nav.div-nav-next .div-nav-title {
				/* border-radius: 50px 0 0 50px; */
			}
		</style>
		<?php
			$cssClass = '';
			if($settings['full_width_fixed']){
				$cssClass = 'full-width-nav';
			}
			$next_label = false;
			$prev_label = false;
			if($settings['show_label']){
				if($settings['show_custom_labels']){
					$next_label = $settings['next_label'];
					$prev_label = $settings['prev_label'];
				}else{
					$next_label = '%title';
					$prev_label = '%title';
				}
			}
		?>
		<div class="divine-post-navigation <?php echo $cssClass ?>">
			<div class="div-post-nav div-nav-prev">
			<?php
				$prevPost = get_previous_post();
				if($prevPost){
					$prevThumbnail = get_the_post_thumbnail( $prevPost->ID , 'post_thumbnail', array( 'style' => ($thumb_width ? 'width:'.$thumb_width.'px;' : '' ).($thumb_height ? 'height:'.$thumb_height.'px;' : '' ) ) );
					if($prevThumbnail){
						previous_post_link( '%link', $prevThumbnail );
					}
				}
			?>
				<span class='div-nav-title'>
			<?php
				previous_post_link( '%link', $prev_label, TRUE );
			?>
				</span>
			</div>
			<div class="div-post-nav div-nav-next">
			<?php
				$nextPost = get_next_post();
				if($nextPost){
					$nextThumbnail = get_the_post_thumbnail( $nextPost->ID, 'post_thumbnail', array( 'style' => ($thumb_width ? 'width:'.$thumb_width.'px;' : '' ).($thumb_height ? 'height:'.$thumb_height.'px;' : '' ) ) );
					if($nextThumbnail){
						next_post_link( '%link', $nextThumbnail );
					}
				}
			?>
				<span class='div-nav-title'>
			<?php
				next_post_link( '%link', $next_label, TRUE );
			?>
				</span>
			</div>
		</div>

		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Divine_Post_Navigation() );
