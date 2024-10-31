<?php
/**
 * Nice Team by NiceThemes.
 *
 * Register sections for Admin UI.
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

if ( ! function_exists( 'nice_team_admin_ui_add_sections' ) ) :
add_filter( 'nice_team_admin_ui_sections', 'nice_team_admin_ui_add_sections' );
/**
 * Create sections.
 *
 * @since 1.0
 */
function nice_team_admin_ui_add_sections() {
	$sections = array(
		'settings' => array(
			'title'         => esc_html__( 'Settings', 'nice-team' ),
			'heading_title' => esc_html__( 'Nice Team Settings', 'nice-team' ),
			'icon'          => 'dashicons-admin-settings',
			'description'   => '<p>' . esc_html__( 'Welcome to the Settings Panel. Here you can set up and configure all of the different options for this magnificent plugin.', 'nice-team' ) . '</p>',
			'priority'      => 10,
		),
		'about' => array(
			'title'         => esc_html__( 'About', 'nice-team' ),
			'heading_title' => esc_html__( 'About Nice Team', 'nice-team' ),
			'icon'          => 'dashicons-info',
			'priority'      => 20,
		),
	);

	return $sections;
}
endif;
