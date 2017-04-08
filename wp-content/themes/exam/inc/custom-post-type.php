<?php
/**
* Create custom post type
*/

add_action('init', 'register_post_types');

function register_post_types(){
    register_post_type('services', array(
        'labels' => array(
            'name'               => esc_html__( 'Services', 'exam' ),
            'singular_name'      => esc_html__( 'Service', 'exam' ),
            'add_new'            => esc_html__( 'Add new', 'exam' ),
            'add_new_item'       => esc_html__( 'Add new service', 'exam' ),
            'edit_item'          => esc_html__( 'Edit service', 'exam' ),
            'new_item'           => esc_html__( 'New service', 'exam' ),
            'view_item'          => '',
    ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'supports'            => array('title','excerpt','thumbnail'), // 'title','editor','author',,'excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive'         => true
    ) );

    register_post_type('clients', array(
        'labels' => array(
            'name'               => esc_html__( 'Clients', 'exam' ),
            'singular_name'      => esc_html__( 'Client', 'exam' ),
            'add_new'            => esc_html__( 'Add new', 'exam' ),
            'add_new_item'       => esc_html__( 'Add new client', 'exam' ),
            'edit_item'          => esc_html__( 'Edit client', 'exam' ),
            'new_item'           => esc_html__( 'New client', 'exam' ),
            'view_item'          => '',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array('title','thumbnail'), // 'title','editor','author', 'thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive'         => true
    ) );

    register_post_type('portfolio', array(
        'labels' => array(
            'name'               => esc_html__( 'Portfolio', 'exam' ),
            'singular_name'      => esc_html__( 'Image', 'exam' ),
            'add_new'            => esc_html__( 'Add new', 'exam' ),
            'add_new_item'       => esc_html__( 'Add new image', 'exam' ),
            'edit_item'          => esc_html__( 'Edit image', 'exam' ),
            'new_item'           => esc_html__( 'New image', 'exam' ),
            'view_item'          => '',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'supports'            => array('title','thumbnail','editor'), // 'title','editor','author', 'thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive'         => true
    ) );
}


