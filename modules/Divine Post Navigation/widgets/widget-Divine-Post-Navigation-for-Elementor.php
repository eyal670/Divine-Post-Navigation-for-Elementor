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
		return 'eicon-post-list';
	}

	protected function _register_controls() {


		$this->start_controls_section(
			'section_query',
			[
				'label' => esc_html__( 'Basic', 'elementor-custom-widget' ),
			]
		);
		$this->add_control(
			'heading_text',
			[
				'label' => __( 'Heading Text', 'elementor-custom-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Enter some text', 'elementor-custom-widget' ),
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
			'prev_label',
			[
				'label' => __( 'Previous Label', 'elementor-custom-widget' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Previous', 'elementor-custom-widget' ),
				'condition' => [
					'show_label' => 'yes',
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
			'show_title',
			[
				'label' => __( 'Post Title', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-custom-widget' ),
				'label_off' => __( 'Hide', 'elementor-custom-widget' ),
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_borders',
			[
				'label' => __( 'Borders', 'elementor-custom-widget' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-custom-widget' ),
				'label_off' => __( 'Hide', 'elementor-custom-widget' ),
				'default' => 'yes',
				'prefix_class' => 'elementor-post-navigation-borders-',
			]
		);

		$this->end_controls_section();



	}

	protected function render( $instance = [] ) {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		?>
		<div class="post-navigation">dsada
			<?php next_post_link( '%link', 'Next post', TRUE ); ?>
			<?php 
				$prevPost = get_previous_post();
				$prevThumbnail = get_the_post_thumbnail( $prevPost->ID );
				previous_post_link( '%link', $prevThumbnail );
			?>
		</div>

		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widget_Divine_Post_Navigation() );
