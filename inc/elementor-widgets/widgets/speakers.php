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
 * Wemeet elementor speakers section widget.
 *
 * @since 1.0
 */
class Wemeet_Speakers extends Widget_Base {

	public function get_name() {
		return 'wemeet-speakers';
	}

	public function get_title() {
		return __( 'Speakers', 'wemeet-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'wemeet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  speakers content ------------------------------
		$this->start_controls_section(
			'speakers_content',
			[
				'label' => __( 'Speakers content', 'wemeet-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Speakers', 'wemeet-companion' )
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'Speakers', 'wemeet-companion' )
            ]
        );

        $this->add_control(
            'speakers_settings_seperator',
            [
                'label' => esc_html__( 'Speakers', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'speakers', [
                'label' => __( 'Create New', 'wemeet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => __( 'Member Image', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                        'default'     => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Jonson Miller', 'wemeet-companion' ),
                    ],
                    [
                        'name' => 'member_designation',
                        'label' => __( 'Member Designation', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Creative Director', 'wemeet-companion' ),
                    ],
                    [
                        'name' => 'social_info_separator',
                        'label' => __( 'Social Links', 'wemeet-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'after'
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook Profile URL', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter Profile URL', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                    [
                        'name' => 'ins_url',
                        'label' => __( 'Instagram Profile URL', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url' => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Jonson Miller', 'wemeet-companion' ),
                        'member_designation'     => __( 'Creative Director', 'wemeet-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Albert Jackey', 'wemeet-companion' ),
                        'member_designation'     => __( 'Product Designer', 'wemeet-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Marked Macau', 'wemeet-companion' ),
                        'member_designation'     => __( 'UI/UX Designer', 'wemeet-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
                    ],
                    [      
                        'member_img'    => [
                            'url'        => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'     => __( 'Kelvin Cooper', 'wemeet-companion' ),
                        'member_designation'     => __( 'Art Director', 'wemeet-companion' ),
                        'fb_url'     => '#',
                        'tw_url'     => '#',
                        'ins_url'     => '#',
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
                    '{{WRAPPER}} .team_area .section_title .sub_heading' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'big_title_col', [
                'label' => __( 'Big Title Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .section_title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_styles_seperator',
            [
                'label' => esc_html__( 'Member Styles', 'wemeet-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'member_name_col', [
                'label' => __( 'Member Name Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'member_desig_color', [
                'label' => __( 'Member Designation Color', 'wemeet-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team_area .single_team p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
    $settings       = $this->get_settings();
    $sec_title    = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $sub_title    = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $speakers = !empty( $settings['speakers'] ) ? $settings['speakers'] : '';
    ?>
    
    <!-- speakers_start -->
    <div class="speakers_area">
        <?php 
            if ( $sec_title ) { 
                echo '<h1 class="horizontal_text d-none d-lg-block">'.esc_html( $sec_title ).'</h1>';
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="serction_title_large mb-95">
                        <?php 
                            if ( $sub_title ) { 
                                echo '<h3>'.esc_html( $sub_title ).'</h3>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                $i = 0;
                if( is_array( $speakers ) && count( $speakers ) > 0 ) {
                    foreach( $speakers as $member ) {
                        $i++;
                        $member_name        = ( !empty( $member['member_name'] ) ) ? $member['member_name'] : '';
                        $member_img         = !empty( $member['member_img']['id'] ) ? wp_get_attachment_image( $member['member_img']['id'], 'wemeet_speaker_thumb_460x500', '', array( 'alt' => $member_name. ' image' ) ) : '';
                        $member_designation = ( !empty( $member['member_designation'] ) ) ? $member['member_designation'] : '';
                        $fb_url             = ( !empty( $member['fb_url']['url'] ) ) ? $member['fb_url']['url'] : '';
                        $tw_url             = ( !empty( $member['tw_url']['url'] ) ) ? $member['tw_url']['url'] : '';
                        $ins_url            = ( !empty( $member['ins_url']['url'] ) ) ? $member['ins_url']['url'] : '';
                        $dynamic_wrap_class = ($i % 2 != 0) ? 'col-xl-5 col-md-6' : 'col-xl-5 offset-xl-2 col-md-6';
                        ?>
                        <div class="<?php echo esc_attr( $dynamic_wrap_class )?>">
                            <div class="single_speaker">
                                <div class="speaker_thumb">
                                    <?php
                                        if( $member_img ) {
                                            echo $member_img;
                                        }
                                    ?>
                                    <div class="hover_overlay">
                                        <div class="social_icon">
                                            <a href="<?php echo esc_url( $fb_url )?>"><i class="fa fa-facebook"></i></a>
                                            <a href="<?php echo esc_url( $ins_url )?>"><i class="fa fa-instagram"></i></a>
                                            <a href="<?php echo esc_url( $tw_url )?>"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="speaker_name text-center">
                                    <h3><?php echo esc_html( $member_name )?></h3>
                                    <p><?php echo esc_html( $member_designation )?></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- speakers_end-->
    <?php
    }
}