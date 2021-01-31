<?php
function wemeet_page_metabox( $meta_boxes ) {

	$wemeet_prefix = '_wemeet_';
	$meta_boxes[] = array(
		'id'        => 'page_single_metaboxs',
		'title'     => esc_html__( 'Page Footer Options', 'wemeet-companion' ),
		'post_types'=> array( 'page' ),
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $wemeet_prefix . 'footer-background',
				'type'  => 'background',
				'name'  => esc_html__( 'Set The Footer Background', 'wemeet-companion' ),
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'wemeet_page_metabox' );