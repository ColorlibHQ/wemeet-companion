<?php
namespace Wemeetelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Wemeet elementor hero section widget.
 *
 * @since 1.0
 */
class Wemeet_Hero extends Widget_Base {

	public function get_name() {
		return 'wemeet-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'wemeet-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'wemeet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero slider content', 'wemeet-companion' ),
			]
        );
        $this->add_control(
            'slider_img',
            [
                'label' => esc_html__( 'Hero Bg Image', 'wemeet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'ver_txt',
            [
                'label' => esc_html__( 'Verticle Text', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'CONFIRENCE', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Digital Design <br>Conference <br>2019 NYC',
            ]
        );
        $this->add_control(
            'btn_title',
            [
                'label' => esc_html__( 'Button Text', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Add to your Calendar', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'wemeet-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url'   => '#',
                ]
            ]
        );
        $this->add_control(
            'location',
            [
                'label' => esc_html__( 'Event Location', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'City Hall, New York City', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'event_date',
            [
                'label' => esc_html__( 'Event Location', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( '12-15 Sep 2019', 'wemeet-companion' ),
            ]
        );
        
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'wemeet-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_col', [
				'label' => __( 'Title Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .title_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'right_shade_txt_col', [
				'label' => __( 'Right Shade Text Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .opcity_text' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'btn_border-text_col', [
				'label' => __( 'Button Border & Text Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .boxed-btn-white' => 'color: {{VALUE}} !important;border-color: {{VALUE}};',
					'{{WRAPPER}} .slider_area .boxed-btn-white:hover' => 'background: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_col', [
				'label' => __( 'Button Hover Text Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .boxed-btn-white:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();
	}
    
	protected function render() {
    // call load widget script
    $this->load_widget_script(); 
    $settings   = $this->get_settings();
    $slider_img = !empty( $settings['slider_img']['url'] ) ? $settings['slider_img']['url'] : ''; 
    $ver_txt    = !empty( $settings['ver_txt'] ) ? $settings['ver_txt'] : ''; 
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : ''; 
    $btn_title  = !empty( $settings['btn_title'] ) ? $settings['btn_title'] : ''; 
    $btn_url    = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : ''; 
    $location   = !empty( $settings['location'] ) ? $settings['location'] : ''; 
    $event_date = !empty( $settings['event_date'] ) ? $settings['event_date'] : ''; 
    ?>

    <!-- slider_area_start -->
    <div class="slider_area" <?php echo wemeet_inline_bg_img( esc_url( $slider_img ) ); ?>>
        <div class="slider_text">
            <div class="container">
                <div class="position_relv">
                    <?php 
                        if ( $ver_txt ) { 
                            echo '<h1 class="opcity_text d-none d-lg-block">'.esc_html($ver_txt).'</h1>';
                        }
                    ?>
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="title_text">
                                <?php 
                                    if ( $sec_title ) { 
                                        echo '<h3>'.wp_kses_post(nl2br($sec_title)).'</h3>';
                                    }
                                    if ( $btn_title ) { 
                                        echo '<a href="'.esc_url($btn_url).'" class="boxed-btn-white">'.esc_html($btn_title).'</a>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="countDOwn_area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="single_date">
                            <i class="ti-location-pin"></i>
                            <?php 
                                if ( $location ) { 
                                    echo '<span>'.esc_html($location).'</span>';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="single_date">
                            <i class="ti-alarm-clock"></i>
                            <?php 
                                if ( $event_date ) { 
                                    echo '<span>'.esc_html($event_date).'</span>';
                                }
                            ?>
                        </div>
                    </div>

                    <div class="col-xl-5 col-md-12 col-lg-5">
                        <span id="clock"></span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
        })(jQuery);
        </script>
        <?php 
        }
    }	    
}