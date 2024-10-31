<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles processes that fire on plugin activation.
 *
 * @package   Nice_Team
 * @author    NiceThemes <hello@nicethemes.com>
 * @license   GPL-2.0+
 * @link      https://nicethemes.com/product/nice-team
 * @copyright 2016 NiceThemes
 * @since     1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_team_create_settings' ) ) :
add_action( 'nice_team_activate', 'nice_team_create_settings' );
/**
 * Create settings on plugin activation.
 *
 * @since 1.0
 */
function nice_team_create_settings() {
	/**
	 * Create settings holder.
	 */
	if ( ! get_option( $name = nice_team_settings_name() ) ) {
		add_option( $name, nice_team_default_settings() );
	}
}
endif;
