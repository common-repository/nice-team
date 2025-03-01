<?php
/**
 * NiceThemes Plugin API
 *
 * This file hooks processes to internal actions within this domain.
 *
 * @package Nice_Team_Plugin
 * @license GPL-2.0+
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fire the display action for this domain once a collection of pointers has
 * been created.
 *
 * @since 1.0
 *
 * @uses  nice_team_display()
 *
 * Hook origin:
 * @see Nice_Team_Pointer_CollectionCreateResponder::loaded()
 */
add_action( 'nice_team_pointer_collection_created', 'nice_team_display' );
