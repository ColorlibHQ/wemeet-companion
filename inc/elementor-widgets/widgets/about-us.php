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
 * Wemeet elementor about us section widget.
 *
 * @since 1.0
 */
class Wemeet_About_Us extends Widget_Base {

	public function get_name() {
		return 'wemeet-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'wemeet-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'wemeet-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'shape_img1',
            [
                'label' => esc_html__( 'Shape Image 1', 'wemeet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'shape_img2',
            [
                'label' => esc_html__( 'Shape Image 2', 'wemeet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'content_section_separator',
            [
                'label' => esc_html__( 'Content Section', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'seperator' => 'after',
            ]
        );
        $this->add_control(
            'left_img',
            [
                'label' => esc_html__( 'Left Image', 'wemeet-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'default'     => [
                    'url'   => Utils::get_placeholder_image_src(),
                ]
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Welcome to', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'The Biggest Design <br>Conference of the <br>Year 2019',
            ]
        );
        $this->add_control(
            'sec_text',
            [
                'label' => esc_html__( 'About Text', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Our set he for firmament morning sixth subdue darkness creeping gathered divide our let god. moving. Moving in fourth air night bring upon you’re it beast.',
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Learn More', 'wemeet-companion' ),
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'wemeet-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
            ]
        );
        
        $this->end_controls_section(); // End about us content

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'about_sec_style', [
                'label' => __( 'About Section Styles', 'wemeet-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'left_sec_styles_seperator',
            [
                'label' => esc_html__( 'Left Section Styles', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
			'exp_val_col', [
				'label' => __( 'Experience Value Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience h1' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'exp_txt_col', [
				'label' => __( 'Experience Text Color', 'wemeet-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about_area .about_thumb .exprience span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'right_sec_styles_seperator',
            [
                'label' => esc_html__( 'Right Section Styles', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_info .section_title h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_info .section_title .seperator' => 'background: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_text_col', [
                'label' => __( 'Sec Text Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .about_area .about_info ul li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'list_circle_col', [
                'label' => __( 'List Item Circle Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info ul li::before' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_styles_seperator',
            [
                'label' => esc_html__( 'Button Styles', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text & Border Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a' => 'color: {{VALUE}} !important; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_bg_col', [
                'label' => __( 'Button Hover Bg & Border Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'background: {{VALUE}}; border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hvr_txt_col', [
                'label' => __( 'Button Hover Text Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about_area .about_info a:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

    }
    
    public function wemeet_get_about_shape_images( $shape_img1, $shape_img2 ) {
        if ( $shape_img1 ) { 
            echo '<div class="shape-1 d-none d-xl-block">';
                echo $shape_img1;
            echo '</div>';
        }
        if ( $shape_img2 ) { 
            echo '<div class="shape-2 d-none d-xl-block">';
                echo $shape_img2;
            echo '</div>';
        }
    }
    
    public function wemeet_get_about_text_section( $sub_title, $sec_title, $sec_text, $btn_text, $btn_url ) {
        ?>
        <div class="col-xl-5 offset-xl-1 col-md-6">
            <div class="about_info">
                <div class="section_title">
                    <?php 
                        if ( $sub_title ) { 
                            echo '<span class="sub_heading">'.$sub_title.'</span>';
                        }
                        if ( $sec_title ) { 
                            echo '<h3>'.wp_kses_post( nl2br( $sec_title ) ).'</h3>';
                        }
                    ?>
                </div>
                <?php 
                    if ( $sec_text ) { 
                        echo '<p>'.$sec_text.'</p>';
                    }
                    if ( $btn_text ) { 
                        echo '<a href="'.esc_url( $btn_url ).'" class="boxed-btn-red">'.esc_html( $btn_text ).'</a>';
                    }
                ?>
            </div>
        </div>
        <?php
    }

    public function wemeet_get_about_img_section( $about_img ) {
        ?>
        <div class="col-xl-6 col-md-6">
            <div class="about_thumb">
                <?php 
                    if ( $about_img ) { 
                        echo $about_img;
                    }
                ?>
            </div>
        </div>
        <?php
    }
    

	protected function render() {
    $settings       = $this->get_settings();    
    $shape_img1     = !empty( $settings['shape_img1']['id'] ) ? wp_get_attachment_image( $settings['shape_img1']['id'], 'wemeet_about_shape_582x510', '', array( 'alt' => 'about shape image 1' ) ) : '';
    $shape_img2     = !empty( $settings['shape_img2']['id'] ) ? wp_get_attachment_image( $settings['shape_img2']['id'], 'wemeet_about_shape_236x236', '', array( 'alt' => 'about shape image 2' ) ) : '';
    $left_img       = !empty( $settings['left_img']['id'] ) ? wp_get_attachment_image( $settings['left_img']['id'], 'wemeet_about_img_671x747', '', array( 'alt' => 'about left image' ) ) : '';
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $sec_text       = !empty( $settings['sec_text'] ) ?  $settings['sec_text'] : '';
    $btn_text       = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
    $btn_url        = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
    $dynamic_class  = is_front_page() ? 'about_area' : 'about_area';
    ?>

    <!-- about_area_start -->
    <div class="about_area">
        <?php
            $this->wemeet_get_about_shape_images( $shape_img1, $shape_img2 );
        ?>
        <div class="container">
            <div class="row align-items-center">
                <?php
                    $this->wemeet_get_about_img_section( $left_img );
                    $this->wemeet_get_about_text_section( $sub_title, $sec_title, $sec_text, $btn_text, $btn_url );
                ?>
            </div>
        </div>
    </div>
    <!-- about_area_end -->
    <?php
    }
}