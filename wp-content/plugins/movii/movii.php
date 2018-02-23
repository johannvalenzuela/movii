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
        'manu_icon' => 'dashicons-location-alt',
        'support' => array(
            'title',
            'editor',
            'thumbnail',
            'revisions'
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 4,
        'exclude_from_search' => false 
    );
    register_post_type('punto',$args);
};

add_action('init','punto_custom_post_type');

function wporg_custom_box_html($post){
    ?>
    <label for="punto_field_latitud">Latitud</label>
    <input type="text" name="punto_field_latitud" value="0"><br>
    <label for="punto_field_longitud">Longitud</label>
    <input type="text" name="punto_field_longitud" value="0">
    <?php
};

function punto_custom_metabox(){
    add_meta_box(
        'punto_box_latitud',
        'Coordenadas',
        'punto_custom_box_html',
        'punto',
        'normal',
        'core'
    );
};

 add_action('add_meta_boxes','punto_custom_metabox');