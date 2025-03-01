<?php
/**
 * NiceThemes Plugin API
 *
 * This file schedules the main instances of the plugin, as well as activation
 * and deactivation processes.
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
 * Obtain full path to the plugin's main file.
 *
 * @since 1.0
 */
$nice_team_plugin_file = defined( 'NICE_TEAM_PLUGIN_FILE' ) ? NICE_TEAM_PLUGIN_FILE : __FILE__;

/**
 * Set main initializing hook.
 *
 * @since 1.0
 */
add_action( 'plugins_loaded', 'nice_team_plugin_init', -3 );

/**
 * Initializing hook for public side.
 *
 * @since 1.0
 */
add_action( 'plugins_loaded', 'nice_team_plugin_public_init', -2 );

/**
 * Initializing hook for admin side.
 *
 * @since 1.0
 */
add_action( 'plugins_loaded', 'nice_team_plugin_admin_init', -1 );

/**
 * Fired when the plugin is activated.
 *
 * @since 1.0
 */
register_activation_hook( $nice_team_plugin_file, 'nice_team_activate' );

/**
 * Fired when the plugin is deactivated.
 *
 * @since 1.0
 */
register_deactivation_hook( $nice_team_plugin_file, 'nice_team_deactivate' );
