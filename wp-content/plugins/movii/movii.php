<?php
/**
 * Plugin Name: Movii Plugin
 * Author: Johann Valenzuela
 * Author URI: http://inteligeek.cl
 * Version: 0.1
 * Description: Este plugin permite obtener una lista de puntos de georeferencia, mostrarlos en una lista y en un mapa. Todo utilizando Google Maps API.
 */

 function punto_custom_post_type(){
    $labels = array(
        'name' => 'Puntos cercanos',
        'singular_name' => 'Punto',
        'add_new' => 'Añadir Punto',
        'all_items' => 'Ver Puntos',
        'add_new_item' => 'Añadir Punto',
        'edit_item' => 'Editar Punto',
        'new_item' => 'Añadir Punto',
        'view_item' => 'Ver Punto',
        'search_item' => 'Buscar Punto',
        'not_found' => 'Punto no encontrado',
        'not_found_in_trash' => 'Punto no encontrado',
        'parent_item_colon' => 'Punto relacionado'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'support' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions'
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 4,
        'exclude_from_search' => false 
    );
    register_post_type('puntos',$args);
 };

 add_action('init','punto_custom_post_type');