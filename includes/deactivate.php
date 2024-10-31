<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles processes that fire on plugin deactivation.
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

if ( ! function_exists( 'nice_team_remove_settings' ) ) :
add_action( 'nice_team_deactivate', 'nice_team_remove_settings' );
/**
 * Remove settings on plugin deactivation.
 *
 * @since 1.0
 */
function nice_team_remove_settings() {
	/**
	 * Remove plugin data only if requested.
	 */
	$settings = nice_team_settings();

	if ( ! empty( $settings['remove_data_on_deactivation'] )  && $settings['remove_data_on_deactivation'] ) {
		/**
		 * Remove settings holder.
		 */
		delete_option( nice_team_settings_name() );
	}
}
endif;
