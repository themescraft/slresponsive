<?php 
add_filter( 'rwmb_meta_boxes', 'slresponsive_meta_boxes' );
function slresponsive_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
        'title'      => __( 'Page header settings', 'slresponsive' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'      => 'page-header',
                'name'    => __( 'Header', 'slresponsive' ),
                'type'    => 'radio',
				'default' => 'on',
                'options' => array(
                    'on' => __( 'On', 'slresponsive' ),
                    'off' => __( 'Off', 'slresponsive' ),
                ),
            ),
            array(
                'id'      => 'page-header-type',
                'name'    => __( 'Header Type', 'slresponsive' ),
                'type'    => 'radio',
				'default' => 'on',
                'options' => array(
                    'solid' => __( 'Solid', 'slresponsive' ),
                    'transparent' => __( 'Transparent', 'slresponsive' ),
                ),
            ),
        ),
    );
    $meta_boxes[] = array(
        'title'      => __( 'Page template settings', 'slresponsive' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'      => 'page-layout',
                'name'    => __( 'Page layout', 'slresponsive' ),
                'type'    => 'radio',
                'options' => array(
                    'fullwidth' => __( 'Fullwidth', 'slresponsive' ),
                    'boxed' => __( 'Boxed', 'slresponsive' ),
                ),
            ),
            array(
                'id'      => 'page-sidebar',
                'name'    => __( 'Page sidebar', 'slresponsive' ),
                'type'    => 'radio',
                'options' => array(
                    'no-sidebar' => __( 'No sidebar', 'slresponsive' ),
                    'right-sidebar' => __( 'Right sidebar', 'slresponsive' ),
                   // 'left-sidebar' => __( 'Left sidebar', 'slresponsive' ),
                ),
            ),
            array(
                'id'      => 'page-footer',
                'name'    => __( 'Page footer', 'slresponsive' ),
                'type'    => 'radio',
                'options' => array(
                    'on' => __( 'On', 'slresponsive' ),
                    'off' => __( 'Off', 'slresponsive' ),
                ),
            ),
        ),
    );   
	$meta_boxes[] = array(
        'title'      => __( 'Page heading settings', 'slresponsive' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'      => 'page-heading',
                'name'    => __( 'Heading', 'slresponsive' ),
                'type'    => 'radio',
				'default' => 'on',
                'options' => array(
                    'on' => __( 'On', 'slresponsive' ),
                    'off' => __( 'Off', 'slresponsive' ),
                ),
            ),
        ),
    );
    return $meta_boxes;
}
if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}