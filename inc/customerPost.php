<?php

if (!function_exists('medila_plus_post_register_type')) {

    function medila_plus_post_register_type()
    {
        $args = array(
            
            'labels'     => array(
                'name'                  => __('My Services', 'MediaPlusPro'),
                'singular_name'         => __('My service', 'MediaPlusPro'),
                'menu_name' => __('My Services','MediaPlusPro'),
                'add_new' => __('Add New Service','MediaPlusPro'),
            ),
            'public'    => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'page-attributes',
                'revisions',
                'trackbacks',
                'excerpt',
                'comments',
                'author',
            ),
            'capability_type' => 'post',
        );
        register_post_type('myownslider', $args);
    }
    add_action('init', 'medila_plus_post_register_type');
}
