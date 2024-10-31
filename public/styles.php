<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file includes actions to handle styles for the public-facing side of
 * the plugin.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_team_enqueue_styles' ) ) :
add_action( 'nice_team_plugin_enqueue_styles', 'nice_team_enqueue_styles' );
/**
 * Enqueue styles for team.
 *
 * @since 1.0
 */
function nice_team_enqueue_styles() {
	$settings = nice_team_settings();

	if ( nice_team_needs_assets() && ! $settings['avoidcss'] ) {
		// Enqueue team styles.
		wp_enqueue_style(
			nice_team_plugin_slug() . '-styles',
			NICE_TEAM_ASSETS_URL . 'css/nice-team.css',
			array(),
			nice_team_plugin_version()
		);
	}
}
endif;
