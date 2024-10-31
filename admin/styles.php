<?php
/**
 * Nice Team by NiceThemes.
 *
 * Enqueue styles for admin-facing side.
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

if ( ! function_exists( 'nice_team_admin_enqueue_styles' ) ) :
add_action( 'admin_enqueue_scripts', 'nice_team_admin_enqueue_styles' );
/**
 * Register and enqueue admin-specific stylesheet.
 *
 * @since 1.0
 */
function nice_team_admin_enqueue_styles() {
	$screen = get_current_screen();

	if ( nice_team_post_type_name() === $screen->post_type ) {
		wp_enqueue_style(
			nice_team_plugin_slug() . '-admin-styles',
			NICE_TEAM_ADMIN_ASSETS_URL . 'css/nice-team-admin.css',
			array(),
			nice_team_plugin_version()
		);
	}
}
endif;
