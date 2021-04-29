<?php
/**
* Trigger this file on plugin uninstall

* @package SkilliPlugin
*/

if(!defined('WP_UNINSTALL_PLUGIN')){
	die;
}

include 'data.php';

// get post slug
function get_post_slug($name) {
	$slug = str_replace(" ", "-", $name);

	if(strlen($slug) > 20){
		$slug = substr($slug, 0, 20);
	}

	return $slug;
}

// Clear DB stored data
global $wpdb;

// get the custom post-types of the plugin
foreach($CPT as $page => $posts){

	$wpdb->query( "DELETE FROM wp_posts WHERE post_type='".get_post_slug($page)."'" );

	foreach($posts as $post) {
		$wpdb->query( "DELETE FROM wp_posts WHERE post_type='".get_post_slug($post)."'" );		
	}	
}

$wpdb->query(  "DELETE from wp_postmeta WHERE post_id NOT IN (SELECT id from wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );
