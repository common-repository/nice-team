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
 * Set i18n instance for this plugin.
 *
 * @since 1.0
 *
 * @uses  Nice_Team_Plugin_Service::set_i18n()
 *
 * Hook origin:
 * @see nice_team_plugin_init()
 */
add_action( 'nice_team_plugin_after_init', array( 'Nice_Team_PluginService', 'set_i18n' ), 10 );

/**
 * Set integrations for this plugin.
 *
 * @since 1.0
 *
 * @uses  Nice_Team_Plugin_Service::set_supported_integrations()
 *
 * Hook origin:
 * @see nice_team_plugin_init()
 */
add_action( 'nice_team_plugin_after_init', array( 'Nice_Team_PluginService', 'set_supported_integrations' ), 10 );

/**
 * Schedule plugin visual elements to be displayed.
 *
 * @since 1.0
 *
 * @uses  nice_team_display()
 *
 * Hook origin:
 * @see nice_team_plugin_init()
 */
add_action( 'nice_team_plugin_after_init', 'nice_team_display', 10 );

/**
 * Set post types for this plugin.
 *
 * @since 1.0
 *
 * @uses  Nice_Team_Plugin_Service::set_post_types()
 *
 * Hook origin:
 * @see wp-settings.php
 */
add_action( 'after_setup_theme', array( 'Nice_Team_PluginService', 'set_post_types' ), 10 );
