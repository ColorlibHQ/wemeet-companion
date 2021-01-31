<?php
namespace Wemeetelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Wemeet elementor book section section widget.
 *
 * @since 1.0
 */
class Wemeet_Book_Section extends Widget_Base {

	public function get_name() {
		return 'wemeet-book-section';
	}

	public function get_title() {
		return __( 'Book Section', 'wemeet-companion' );
	}

	public function get_icon() {
		return 'eicon-play-o';
	}

	public function get_categories() {
		return [ 'wemeet-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  Book Section ------------------------------
        $this->start_controls_section(
            'book_section_content',
            [
                'label' => __( 'Book Section', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'BG Image', 'wemeet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );        
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'Register Now to Book <br>Your Presence',
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label' => esc_html__( 'Button Label', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Book Now ($150)', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'wemeet-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        
        
        $this->end_controls_section(); // End book_section

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'wemeet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Big Title Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact h2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button BG Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact .btn_1' => 'background: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_hov_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact .btn_1:hover' => 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
			'bg_overlay_col', [
				'label' => __( 'Bg Overlay Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .home_contact:after' => 'background: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $bg_img    = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
    $btn_label = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url   = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    <!-- resister_book_start -->
    <div class="resister_book" <?php echo wemeet_inline_bg_img( esc_url( $bg_img ) ); ?>>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="resister_text text-center">
                        <?php 
                            if ( $sec_title ) { 
                                echo '<h3>'.wp_kses_post(nl2br($sec_title)).'</h3>';
                            }
                            if ( $btn_label ) { 
                                echo '<a href="'.esc_url($btn_url).'" class="boxed-btn-white">'.esc_html( $btn_label ).'</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- resister_book_end -->
    <?php

    }
}
