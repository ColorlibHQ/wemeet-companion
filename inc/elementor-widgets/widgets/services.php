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
 * Wemeet elementor service section widget.
 *
 * @since 1.0
 */
class Wemeet_Services extends Widget_Base {

	public function get_name() {
		return 'wemeet-services';
	}

	public function get_title() {
		return __( 'Services', 'wemeet-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'wemeet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'service_content',
			[
				'label' => __( 'Services content', 'wemeet-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'About US', 'wemeet-companion' )
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Make your Dream with US', 'wemeet-companion' )
            ]
        );

        $this->add_control(
            'service_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'wemeetservices', [
                'label' => __( 'Create New', 'wemeet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ service_title }}}',
                'fields' => [
                    [
                        'name' => 'service_img',
                        'label' => __( 'Service Image', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'service_title',
                        'label' => __( 'Service Title', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Interior', 'wemeet-companion' ),
                    ],
                    [
                        'name' => 'service_text',
                        'label' => __( 'Service Text', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'wemeet-companion' ),
                    ],
                ],
                'default'   => [
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Interior', 'wemeet-companion' ),
                        'service_text'   => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'wemeet-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Exterior', 'wemeet-companion' ),
                        'service_text'   => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'wemeet-companion' ),
                    ],
                    [      
                        'service_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'service_title'     => __( 'Bridge', 'wemeet-companion' ),
                        'service_text'   => __( 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua quis ipsum suspendisse.', 'wemeet-companion' ),
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_room_section', [
                'label' => __( 'Style Service Section', 'wemeet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'singl_item_styles_seperator',
            [
                'label' => esc_html__( 'Single Item Styles', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sing_ser_title_col', [
                'label' => __( 'Title Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sing_ser_txt_col', [
                'label' => __( 'Text Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dream_service .single_dream p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $wemeetservices = !empty( $settings['wemeetservices'] ) ? $settings['wemeetservices'] : '';
    $dynamic_class  = is_front_page() ? 'dream_service' : 'dream_service';
    ?>

    <!-- dream_service_start -->
    <div class="dream_service">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center mb-95">
                        <?php 
                            if ( $sub_title ) { 
                                echo '<span class="sub_heading">'.$sub_title.'</span>';
                            }
                            if ( $sec_title ) { 
                                echo '<h3>'.esc_html( $sec_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $wemeetservices ) && count( $wemeetservices ) > 0 ) {
                    foreach( $wemeetservices as $service ) {
                        $service_img     = !empty( $service['service_img']['id'] ) ? wp_get_attachment_image( $service['service_img']['id'], 'wemeet_service_thumb_200x200', '', array( 'alt' => 'service image' ) ) : '';
                        $service_title   = ( !empty( $service['service_title'] ) ) ? $service['service_title'] : '';
                        $service_text    = ( !empty( $service['service_text'] ) ) ? $service['service_text'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single_dream text-center">
                                <?php 
                                    if ( $service_img ) { 
                                        echo '<div class="thumb">';
                                            echo $service_img;
                                        echo '</div>';
                                    }
                                    if ( $service_title ) { 
                                        echo '<h3>'.$service_title.'</h3>';
                                    }
                                    if ( $service_text ) { 
                                        echo '<p>'.esc_html( $service_text ).'</p>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- dream_service_end -->
    <?php
    }
}