<?php
/**
 * Register widgets for this plugin.
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

if ( ! function_exists( 'nice_team_register_widgets' ) ) :
add_action( 'widgets_init', 'nice_team_register_widgets' );
/**
 * Register widgets for this plugin.
 *
 * @since 1.0
 */
function nice_team_register_widgets() {
	/**
	 * @hook nice_team_enable_widget_members
	 *
	 * Hook here if you don't want to register this widget.
	 *
	 * @since 1.0
	 */
	if ( apply_filters( 'nice_team_enable_widget_members', true ) ) {
		register_widget( 'Nice_Team_Members_Widget' );
	}
}
endif;

if ( ! function_exists( 'nice_team_widget_loaded' ) ) :
add_action( 'nice_team_widget_loaded', 'nice_team_widget_loaded' );
/**
 * Schedule hooks when a widget is loaded.
 *
 * @since 1.0
 *
 * @param Nice_Team_WP_Widget $widget Current widget being processed.
 */
function nice_team_widget_loaded( Nice_Team_WP_Widget $widget ) {
	add_action( 'save_post',    array( $widget, 'flush_cache' ) );
	add_action( 'deleted_post', array( $widget, 'flush_cache' ) );
	add_action( 'switch_theme', array( $widget, 'flush_cache' ) );
}
endif;

if ( ! function_exists( 'nice_team_widgets_setup_assets' ) ) :
add_action( 'nice_team_widget_loaded', 'nice_team_widgets_setup_assets' );
/**
 * Schedule hooks when the widgets are displayed in the front end.
 *
 * @since 1.0
 */
function nice_team_widgets_setup_assets() {
	$settings = nice_team_settings();

	/**
	 * Load assets when Team Categories widget needs to be displayed.
	 */
	if ( ! is_admin() && ! nice_team_doing_ajax() && ! $settings['avoidcss'] ) {
		add_filter( 'nice_team_needs_assets', '__return_true' );
	}
}
endif;

if ( ! function_exists( 'nice_team_widget_wrapper_start' ) ) :
add_action( 'nice_team_before_widget_content', 'nice_team_widget_wrapper_start', 10 );
/**
 * Print the opening HTML for our widgets.
 *
 * @since 1.0
 */
function nice_team_widget_wrapper_start() {
	nice_team_get_template_part( 'widgets/wrapper-start' );
}
endif;

if ( ! function_exists( 'nice_team_widget_wrapper_end' ) ) :
add_action( 'nice_team_after_widget_content', 'nice_team_widget_wrapper_end', 10 );
/**
 * Print the closing HTML for our widgets.
 *
 * @since 1.0
 */
function nice_team_widget_wrapper_end() {
	nice_team_get_template_part( 'widgets/wrapper-end' );
}
endif;
