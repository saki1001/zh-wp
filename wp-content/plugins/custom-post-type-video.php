<?php
/**
* Plugin Name: Custom Post Type: Video
* Plugin URI: http://sakisato.com
* Description: Add a custom post type called "Video" to WordPress.
* Version: 1.0
* Author: Saki Sato
* Author URI: http://sakisato.com
* License: GPL2
*/

/*  Copyright 2014  Saki Sato  (email : saki.s.sato@gmail.com)
    
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function custom_post_type_video() {
    
	$labels = array(
		'name'               => _x( 'Videos', 'post type general name' ),
		'singular_name'      => _x( 'Video', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'video' ),
		'add_new_item'       => __( 'Add New Video' ),
		'edit_item'          => __( 'Edit Video' ),
		'new_item'           => __( 'New Video' ),
		'all_items'          => __( 'All Videos' ),
		'view_item'          => __( 'View Video' ),
		'search_items'       => __( 'Search Videos' ),
		'not_found'          => __( 'No videos found' ),
		'not_found_in_trash' => __( 'No videos found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Videos'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds data about each video.',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
    
	register_post_type( 'video', $args );
}
add_action( 'init', 'custom_post_type_video' );

function video_updated_messages( $messages ) {
	global $post, $post_ID;
	$messages['video'] = array(
		0 => '', 
		1 => sprintf( __('Video updated. <a href="%s">View video</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Video updated.'),
		5 => isset($_GET['revision']) ? sprintf( __('Video restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Video published. <a href="%s">View video</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Product saved.'),
		8 => sprintf( __('Video submitted. <a target="_blank" href="%s">Preview video</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Video scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview video</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Video draft updated. <a target="_blank" href="%s">Preview video</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $messages;
}
add_filter( 'post_updated_messages', 'video_updated_messages' );

function custom_taxonomies_video() {
	$labels = array(
		'name'              => _x( 'Video Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Video Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Video Categories' ),
		'all_items'         => __( 'All Video Categories' ),
		'parent_item'       => __( 'Parent Video Category' ),
		'parent_item_colon' => __( 'Parent Video Category:' ),
		'edit_item'         => __( 'Edit Video Category' ), 
		'update_item'       => __( 'Update Video Category' ),
		'add_new_item'      => __( 'Add New Video Category' ),
		'new_item_name'     => __( 'New Video Category' ),
		'menu_name'         => __( 'Video Categories' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'videos', 'video', $args );
}
add_action( 'init', 'custom_taxonomies_video', 0 );
