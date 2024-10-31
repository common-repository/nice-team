<?php
/**
 * Nice Team by NiceThemes.
 *
 * Initialize Admin UI.
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

if ( ! function_exists( 'nice_team_admin_ui' ) ) :
add_filter( 'nice_team_admin_ui_data', 'nice_team_admin_ui' );
/**
 * Create a new Admin UI.
 *
 * @since  1.0
 *
 * @return array
 */
function nice_team_admin_ui() {
	$admin_ui = array(
		'submenu_parent_slug' => 'edit.php?post_type=' . nice_team_post_type_name(),
		'name'                => nice_team_plugin_slug(),
		'title'               => esc_html__( 'Settings', 'nice-team' ),
		'textdomain'          => 'nice-team',
		'settings_name'       => nice_team_settings_name(),
		'templates_path'      => plugin_dir_path( __FILE__ ) . 'templates/',
	);

	return $admin_ui;
}
endif;
