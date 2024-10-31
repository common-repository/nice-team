<?php
/**
 * Nice Team by NiceThemes.
 *
 * Register groups of settings for Admin UI.
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

if ( ! function_exists( 'nice_team_admin_ui_add_settings_groups' ) ) :
add_filter( 'nice_team_admin_ui_settings_groups', 'nice_team_admin_ui_add_settings_groups' );
/**
 * Create groups of settings.
 *
 * @since 1.0
 */
function nice_team_admin_ui_add_settings_groups() {
	$general_settings = array(
		'general-settings' => array(
			'title'       => esc_html__( 'General Settings', 'nice-team' ),
			'description' => esc_html__( 'Configure how your team members will be displayed by default. All these options can be overridden in a shortcode basis.', 'nice-team' ),
		),
	);

	$images_settings = array(
		'images-settings' => array(
			'title'       => esc_html__( 'Images Settings', 'nice-team' ),
			'description' => wp_kses( __( 'Here you can set the sizes for your project images. Once you change these settings, you may need to <a href="http://wordpress.org/extend/plugins/regenerate-thumbnails/" target="_blank">regenerate your thumbnails</a>.', 'nice-team' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		),
	);

	$advanced_settings = array(
		'advanced-settings' => array(
			'title'       => esc_html__( 'Advanced Settings', 'nice-team' ),
			'description' => esc_html__( 'Options presented here are for advanced users only, so you must use them carefully.', 'nice-team' ),
		),
	);

	$settings_groups = array(
		array(
			'tab'     => 'general',
			'section' => 'settings',
			'args'    => $general_settings,
		),
		array(
			'tab'     => 'images',
			'section' => 'settings',
			'args'    => $images_settings,
		),
		array(
			'tab'     => 'advanced',
			'section' => 'settings',
			'args'    => $advanced_settings,
		),
	);

	return $settings_groups;
}
endif;
