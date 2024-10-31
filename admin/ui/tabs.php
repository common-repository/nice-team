<?php
/**
 * Nice Team by NiceThemes.
 *
 * Register section tabs for Admin UI.
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

if ( ! function_exists( 'nice_team_admin_ui_add_tabs' ) ) :
add_filter( 'nice_team_admin_ui_tabs', 'nice_team_admin_ui_add_tabs' );
/**
 * Create tabs.
 *
 * @since 1.0
 */
function nice_team_admin_ui_add_tabs() {
	$tabs = array(
		array(
			'section' => 'settings',
			'args'    => array(
				'general' => array(
					'title'    => esc_html__( 'General', 'nice-team' ),
					'icon'     => 'dashicons-admin-generic',
					'priority' => 10,
				),
			),
		),
		array(
			'section' => 'settings',
			'args'    => array(
				'images'  => array(
					'title'    => esc_html__( 'Images', 'nice-team' ),
					'icon'     => 'dashicons-format-image',
					'priority' => 20,
				),
			),
		),
		array(
			'section' => 'settings',
			'args'    => array(
				'advanced' => array(
					'title'    => esc_html__( 'Advanced', 'nice-team' ),
					'icon'     => 'dashicons-admin-settings',
					'priority' => 30,
				),
			),
		),
	);

	return $tabs;
}
endif;
