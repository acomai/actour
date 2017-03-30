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
	$perma = get_permalink();
	$post = get_post();
	echo 'titolo: ';
	echo $post->post_title;
	echo ' - autore: ';
	echo $post->post_author;
	echo get_the_author_meta('display_name');
	return ' ...[<a href="the_permalink();"> leggi il resto... </a>]';
}
add_filter( 'excerpt_more', 'bici_excerpt_more' );

function bici_activation() {return;}

function bici_deactivation() {return;}

function bici_uninstall() {return;}

?>