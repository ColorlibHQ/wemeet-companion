<?php
namespace Wemeetelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Wemeet elementor events section widget.
 *
 * @since 1.0
 */
class Wemeet_Events extends Widget_Base {

	public function get_name() {
		return 'wemeet-events';
	}

	public function get_title() {
		return __( 'Events', 'wemeet-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'wemeet-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  events content ------------------------------
		$this->start_controls_section(
			'events_content',
			[
				'label' => __( 'Events Section', 'wemeet-companion' ),
			]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'wemeet-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Event Schedule', 'wemeet-companion' ),
            ]
        );
		$this->add_control(
            'events', [
                'label' => __( 'Create New', 'wemeet-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ event_title }}}',
                'fields' => [
                    [
                        'name' => 'event_title',
                        'label' => __( 'Event Title', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '08 Sep 2021', 'wemeet-companion' ),
                    ],
                    [
                        'name' => 'template_id',
                        'label' => __( 'Select Elementor Template', 'wemeet-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::SELECT,
                        'options' => get_elementor_templates(),
                    ],
                ],
                'default'   => [
                    [      
                        'event_title' => __( '08 Sep 2021', 'wemeet-companion' ),
                    ],
                    [      
                        'event_title' => __( '09 Sep 2021', 'wemeet-companion' ),
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
    $settings  = $this->get_settings();
    $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $events    = !empty( $settings['events'] ) ? $settings['events'] : '';
    ?>

    <!-- event_area_start -->
    <div class="event_area">
        <?php 
            if ( $sec_title ) { 
                echo '<h1 class="vr_text d-none d-lg-block">'.esc_html( $sec_title ).'</h1>';
            }
        ?>
        <div class="container">
            <?php   
            $i = 0;
            if( is_array( $events ) && count( $events ) > 0 ) {
                foreach( $events as $event ) {
                    $i++;
                    $event_title = ( !empty( $event['event_title'] ) ) ? $event['event_title'] : '';
                    $template_id = absint( $event['template_id'] );
                    $dynamic_wrap_class_start = ($i % 2 != 0) ? '<div class="double_line">' : '';
                    $dynamic_wrap_class_end   = ($i % 2 != 0) ? '</div>' : '';
                    echo $dynamic_wrap_class_start;
                    ?>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3">
                            <div class="date">
                                <?php 
                                    if ( $event_title ) { 
                                        echo '<h3>'.esc_html( $event_title ).'</h3>';
                                    }
                                ?>
                            </div>
                        </div>
                    
                        <div class="col-xl-9 col-lg-9">
                            <?php   
                                echo Plugin::$instance->frontend->get_builder_content( $template_id, false );
                            ?>
                        </div>
                    </div>
                    <?php
                    echo $dynamic_wrap_class_end;
                }
            }
            ?>
        </div>
    </div>
    <?php
    }
}