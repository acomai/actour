<?php
/*
Plugin Name: Bici
Plugin URI:  https://developer.wordpress.org/plugins/bici/
Description: Plugin WordPress per gestire le iscrizioni alle gite di Bici e Dintorni
Version:     20170329
Author:      Adriano Comai
Author URI:  https://www.analisi-disegno.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages

Bici is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Bici is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

register_activation_hook( __FILE__, 'bici_activation' );

register_deactivation_hook( __FILE__, 'bici_deactivation' );

register_uninstall_hook(__FILE__, 'bici_uninstall');

function bici_excerpt_more( $more ) {
	//$perma = get_permalink();
	//$post = get_post();
	//echo 'titolo: ';
	//echo $post->post_title;
	//echo ' - autore: ';
	//echo $post->post_author;
	//echo get_the_author_meta('display_name');
	//return ' ...[<a href="the_permalink();"> leggi il resto... </a>]';
}
add_filter( 'excerpt_more', 'bici_excerpt_more' );

function bici_activation() {return;}

function bici_deactivation() {return;}

function bici_uninstall() {return;}

add_action( 'init', 'act_nodo_init' );
/**
 * Register a nodo post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function act_nodo_init() {
	$labels = array(
			'name'               => _x( 'act_Nodi', 'post type general name'),
			'singular_name'      => _x( 'act_Nodo', 'post type singular name'),
			'menu_name'          => _x( 'act_Nodi', 'admin menu'),
			'name_admin_bar'     => _x( 'act_Nodo', 'add new on admin bar'),
			'add_new'            => _x( 'Aggiungi', 'act_nodo' ),
			'add_new_item'       => __( 'Add New act_Nodo'),
			'new_item'           => __( 'Nuovo act_Nodo'),
			'edit_item'          => __( 'Edit act_Nodo'),
			'view_item'          => __( 'View act_Nodo'),
			'all_items'          => __( 'Tutti gli act_Nodi'),
			'search_items'       => __( 'Search act_Nodi'),
			'parent_item_colon'  => __( 'Parent act_Nodi:'),
			'not_found'          => __( 'No nodi found.'),
			'not_found_in_trash' => __( 'No nodi found in Trash.')
	);
	
	$args = array(
			'labels'             => $labels,
			'description'        => __( 'Nodo percorribile.'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'nodi' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
	);
	
	register_post_type( 'act_nodo', $args );
}

add_action( 'init', 'act_percorso_init' );
/**
 * Register a itinerario post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function act_percorso_init() {
	$labels = array(
			'name'               => _x( 'act_Percorsi', 'post type general name'),
			'singular_name'      => _x( 'act_Percorso', 'post type singular name'),
			'menu_name'          => _x( 'act_Percorsi', 'admin menu'),
			'name_admin_bar'     => _x( 'act_Percorso', 'add new on admin bar'),
			'add_new'            => _x( 'Aggiungi', 'act_percorso' ),
			'add_new_item'       => __( 'Add New act_Percorso'),
			'new_item'           => __( 'Nuovo act_Percorso'),
			'edit_item'          => __( 'Edit act_Percorso'),
			'view_item'          => __( 'View act_Percorso'),
			'all_items'          => __( 'Tutti gli act_Percorsi'),
			'search_items'       => __( 'Search act_Percorsi'),
			'parent_item_colon'  => __( 'Parent act_Percorsi:'),
			'not_found'          => __( 'No percorsi found.'),
			'not_found_in_trash' => __( 'No percorsi found in Trash.')
	);
	
	$args = array(
			'labels'             => $labels,
			'description'        => __( 'Percorso percorribile.'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'percorsi' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies'         => array( 'act_tipo_percorso' ),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
	);
	
	register_post_type( 'act_percorso', $args );
}

function act_tipo_percorso_init() {
	// create a new taxonomy
	register_taxonomy(
			'act_tipo_percorso',
			'act_percorso',
			array(
					'label' => __( 'act_tipo_percorso' ),
					'rewrite' => array( 'slug' => 'tipo_percorso' )
					)
			
			);
}
add_action( 'init', 'act_tipo_percorso_init' );

add_action( 'init', 'act_itinerario_init' );
/**
 * Register a itinerario post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function act_itinerario_init() {
	$labels = array(
			'name'               => _x( 'act_Itinerari', 'post type general name'),
			'singular_name'      => _x( 'act_Itinerario', 'post type singular name'),
			'menu_name'          => _x( 'act_Itinerari', 'admin menu'),
			'name_admin_bar'     => _x( 'act_Itinerario', 'add new on admin bar'),
			'add_new'            => _x( 'Aggiungi', 'act_itinerario' ),
			'add_new_item'       => __( 'Add New act_Itinerario'),
			'new_item'           => __( 'Nuovo act_Itinerario'),
			'edit_item'          => __( 'Edit act_Itinerario'),
			'view_item'          => __( 'View act_Itinerario'),
			'all_items'          => __( 'Tutti gli act_Itinerari'),
			'search_items'       => __( 'Search act_Itinerari'),
			'parent_item_colon'  => __( 'Parent act_Itinerari:'),
			'not_found'          => __( 'No itinerari found.'),
			'not_found_in_trash' => __( 'No itinerari found in Trash.')
	);
	
	$args = array(
			'labels'             => $labels,
			'description'        => __( 'Itinerario percorribile.'),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'itinerari' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
	);
	
	register_post_type( 'act_itinerario', $args );
}
?>