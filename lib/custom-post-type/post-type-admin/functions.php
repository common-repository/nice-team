<?php
/**
 * NiceThemes Post Type API
 *
 * This file includes functions to handle this module's functionality.
 *
 * @package Nice_Team_Post_Type_API
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create a new instance for this domain.
 *
 * @uses   nice_team_create()
 *
 * @param  array $data
 *
 * @return Nice_Team_Post_Type_Admin
 */
function nice_team_post_type_admin_create( array $data ) {
	return nice_team_create( 'Nice_Team_Post_Type_Admin', $data );
}

/**
 * Obtain service for the current domain.
 *
 * @uses   nice_team_service()
 *
 * @since  1.1
 *
 * @return Nice_Team_Post_Type_AdminService
 */
function nice_team_post_type_admin_service() {
	return nice_team_service( 'Nice_Team_Post_Type_Admin' );
}
