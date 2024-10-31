<?php
/**
 * Nice Team by NiceThemes.
 *
 * Enqueue scripts for admin-facing side.
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

if ( ! function_exists( 'nice_team_admin_enqueue_scripts' ) ) :
add_action( 'nice_team_admin_enqueue_scripts', 'nice_team_admin_enqueue_scripts' );
/**
 * Register and enqueue admin-specific JavaScript.
 *
 * @since 1.0
 */
function nice_team_admin_enqueue_scripts() {
	// Obtain plugin slug and version.
	$slug    = nice_team_plugin_slug();
	$version = nice_team_plugin_version();

	// Obtain whether or not we're in debug mode.
	$debug = ( nice_team_debug() || nice_team_development_mode() );

	// Define script URLs.
	$scripts = array(
		$slug . '-admin-notices-script' => NICE_TEAM_ADMIN_ASSETS_URL . ( $debug ? 'js/nice-team-admin-notices.js' : 'js/min/nice-team-admin-notices.min.js' ),
	);

	/**
	 * Admin notices script.
	 */
	if ( nice_team_admin_is_update_notice_enabled() ) {
		wp_register_script( $slug . '-admin-notices-script', $scripts[ $slug . '-admin-notices-script' ], array( 'jquery' ), $version );
		wp_enqueue_script( $slug . '-admin-notices-script' );

		wp_localize_script( $slug . '-admin-notices-script', 'nice_team_admin_notices_vars', array(
			'ajax_url' => admin_url() . 'admin-ajax.php',
			'nonce'    => wp_create_nonce( 'nice-team-admin-notices-nonce' ),
		) );
	}
}
endif;
