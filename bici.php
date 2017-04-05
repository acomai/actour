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

add_action( 'init', 'create_post_type_nodo' );
function create_post_type_nodo() {
	register_post_type( 'nodo',
			array(
					'labels' => array(
							'name' => __( 'Nodi' ),
							'singular_name' => __( 'Nodo' )
					),
					'public' => true,
					'has_archive' => true,
			)
			);
}

add_action( 'init', 'create_post_type_percorso' );
function create_post_type_percorso() {
	register_post_type( 'percorso',
			array(
					'labels' => array(
							'name' => __( 'Percorsi' ),
							'singular_name' => __( 'Percorso' )
					),
					'public' => true,
					'has_archive' => true,
			)
			);
}


add_action( 'init', 'slow_itinerario_init' );
/**
 * Register a itinerario post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function slow_itinerario_init() {
	$labels = array(
			'name'               => _x( 'Itinerari', 'post type general name'),
			'singular_name'      => _x( 'Itinerario', 'post type singular name'),
			'menu_name'          => _x( 'Itinerari', 'admin menu'),
			'name_admin_bar'     => _x( 'Itinerario', 'add new on admin bar'),
			'add_new'            => _x( 'Aggiungi', 'itinerario' ),
			'add_new_item'       => __( 'Add New Itinerario'),
			'new_item'           => __( 'Nuovo Itinerario'),
			'edit_item'          => __( 'Edit Itinerario'),
			'view_item'          => __( 'View Itinerario'),
			'all_items'          => __( 'Tutti gli Itinerari'),
			'search_items'       => __( 'Search Itinerari'),
			'parent_item_colon'  => __( 'Parent Itinerari:'),
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
			'rewrite'            => array( 'slug' => 'itinerario' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'taxonomies'         => array( 'category' ),
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
	);
	
	register_post_type( 'book', $args );
}
?>