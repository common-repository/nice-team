<?php
/**
 * NiceThemes Post Type API
 *
 * This file hooks processes to internal actions within this domain.
 *
 * @package Nice_Team_Post_Type
 * @license GPL-2.0+
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fire the display action for this domain once a post type has been created.
 *
 * @since 1.0
 *
 * @uses  nice_team_display()
 *
 * Hook origin:
 * @see Nice_Team_Post_Type_AdminCreateResponder::loaded()
 */
add_action( 'nice_team_post_type_admin_created', 'nice_team_display' );

/**
 * Set the glancer for a created post type.
 *
 * @since 1.0
 *
 * @uses  Nice_Team_Post_Type_AdminService::set_glancer()
 *
 * Hook origin:
 * @see Nice_Team_Post_Type_AdminCreateResponder::loaded()
 */
add_action( 'nice_team_post_type_admin_created', array( 'Nice_Team_Post_Type_AdminService', 'set_glancer' ) );
