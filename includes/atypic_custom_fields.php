<?php
namespace AtypicTheme\Functions;

use WP_REST_Server;

//Custom fields use cmb2 plugin
//https://cmb2.io/

add_action( 'cmb2_init', 'AtypicTheme\Functions\atypic_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function atypic_metaboxes() {

    /**
     * Initiate the 'gallery' metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'gallery',
        'title'         => __( 'Gallery', 'atypic' ),
        'object_types'  => array( 'atypic_gallery', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'cmb2_api_update_field_value_permissions_check' => 'atypic_gallery_permission',
        'cmb2_api_delete_field_value_permissions_check' => 'atypic_gallery_permission'
    ) );

    function atypic_gallery_permission( $is_allowed){
        if ( ! is_user_admin() ) {
            $is_allowed = false;
        }
    
        return $is_allowed;
    }

    //Description
    $cmb->add_field( array(
        'name'       => __( 'Description', 'atypic' ),
        'desc'       => __( 'Write something about the collection', 'atypic' ),
        'id'         => 'description',
        'type'       => 'text',
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
        'cmb2_api_update_field_value_permissions_check' => 'atypic_gallery_permission',
        'cmb2_api_delete_field_value_permissions_check' => 'atypic_gallery_permission'
    ) );

    // Image
    $group_field = $cmb->add_field( array(
        'description'       => __( 'Choose images to put in your gallery :', 'atypic' ),
        'id'         => 'images',
        'type'       => 'group',
        'repeatable' => true,
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
        'cmb2_api_update_field_value_permissions_check' => 'atypic_gallery_permission',
        'cmb2_api_delete_field_value_permissions_check' => 'atypic_gallery_permission',
        'options' =>array(
            'group_title' => __("Image",'atypic'),
            'add_button' => __('Add Another Image', 'atypic'),
            'remove_butotn' => __('Remove Image', 'atypic')
        )
    ) );
    
    //Image title
    $cmb->add_group_field( $group_field,array(
        'name'       => __( 'Image Title', 'atypic' ),
        'desc'       => __( 'The image title', 'atypic' ),
        'id'         => 'title',
        'type'       => 'text',
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
        'cmb2_api_update_field_value_permissions_check' => 'atypic_gallery_permission',
        'cmb2_api_delete_field_value_permissions_check' => 'atypic_gallery_permission'
    ) );

    //Image description
    $cmb->add_group_field( $group_field,array(
        'name'       => __( 'Description', 'atypic' ),
        'desc'       => __( 'Write something about the image', 'atypic' ),
        'id'         => 'description',
        'type'       => 'text',
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
        'cmb2_api_update_field_value_permissions_check' => 'atypic_gallery_permission',
        'cmb2_api_delete_field_value_permissions_check' => 'atypic_gallery_permission'
        ) );

    //Image file
    $cmb->add_group_field( $group_field,array(
        'name'       => __( 'File', 'atypic' ),
        'desc'       => __( 'Upload an image or enter an url', 'atypic' ),
        'id'         => 'url',
        'type'       => 'file',
        //'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        'show_in_rest' => WP_REST_Server::ALLMETHODS,
        'cmb2_api_update_field_value_permissions_check' => 'atypic_gallery_permission',
        'cmb2_api_delete_field_value_permissions_check' => 'atypic_gallery_permission'
    ) );
        
        
        
}