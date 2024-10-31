<?php
/**
 * NiceThemes Plugin API
 *
 * This file contains general helper functions that allow interactions with
 * this module in an easier way.
 *
 * @package Nice_Team_Plugin_API
 * @license GPL-2.0+
 * @since   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Create and return an instance of Nice_Team_i18n.
 *
 * @uses   nice_team_create()
 *
 * @since  1.0
 *
 * @param  array           $data Information for new instance.
 *
 * @return Nice_Team_i18n
 */
function nice_team_i18n_create( array $data ) {
	/**
	 * Create an i18n instance and initialize its functionality.
	 */
	return nice_team_create( 'Nice_Team_i18n', $data );
}

/**
 * Obtain an instance of this domain's service.
 *
 * @uses   nice_team_service()
 *
 * @since  1.0
 *
 * @return Nice_Team_DefaultService
 */
function nice_team_i18n_service() {
	return nice_team_service( 'Nice_Team_i18n' );
}
