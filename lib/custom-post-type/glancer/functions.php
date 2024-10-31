<?php
/**
 * NiceThemes Plugin API
 *
 * This file contains general helper functions that allow interactions with
 * this module in an easier way.
 *
 * @package Nice_Team_Plugin_API
 * @license GPL-2.0+
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create and return an instance of Nice_Team_glancer.
 *
 * @uses   nice_team_create()
 *
 * @since  1.1
 *
 * @param  array           $data Information for new instance.
 *
 * @return Nice_Team_Glancer
 */
function nice_team_glancer_create( array $data ) {
	/**
	 * Create a glancer instance and initialize its functionality.
	 */
	return nice_team_create( 'Nice_Team_Glancer', $data );
}

/**
 * Obtain an instance of this domain's service.
 *
 * @uses   nice_team_service()
 *
 * @since  1.1
 *
 * @return Nice_Team_GlancerService
 */
function nice_team_glancer_service() {
	return nice_team_service( 'Nice_Team_Glancer' );
}

/**
 * Register one or more post type items to be shown on the dashboard widget.
 *
 * @uses  nice_team_glancer_service()
 * @uses  Nice_Team_GlancerService::add_item()
 *
 * @since 1.1
 *
 * @param Nice_Team_Glancer $glancer Instance to be updated.
 * @param array|string  $post_types Post type name, or array of post type names.
 * @param array|string  $statuses Post status or array of different post type statuses
 * @param string $glyph Dashicons glyph for current post type.
 */
function nice_team_glancer_add_item( Nice_Team_Glancer $glancer, $post_types, $statuses = 'publish', $glyph = '' ) {
	$glancer_service = nice_team_glancer_service();
	$glancer_service->add_item( $glancer, $post_types, $statuses, $glyph );
}
