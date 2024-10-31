<?php
/**
 * Nice Team by NiceThemes.
 *
 * Create help tabs for Admin UI.
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

if ( ! function_exists( 'nice_team_admin_ui_add_help_tabs' ) ) :
add_filter( 'nice_team_admin_ui_help_tabs', 'nice_team_admin_ui_add_help_tabs', 10, 2 );
/**
 * Create help tabs.
 *
 * @since 1.0
 *
 * @param array                   $help_tabs List of current help tabs.
 * @param Nice_Team_Admin_UI $ui        Current Admin UI object.
 *
 * @return array
 */
function nice_team_admin_ui_add_help_tabs( $help_tabs = array(), Nice_Team_Admin_UI $ui ) {
	$help_tabs = ! empty( $help_tabs ) && is_array( $help_tabs ) ? $help_tabs : array();

	$help_tabs = array_merge( $help_tabs, array(
		array(
			'section' => 'settings',
			'args'    => array(
				'nice-team-general-settings' => array(
					'id'      => 'nice-team-general-settings',
					'title'   => esc_html__( 'General Settings', 'nice-team' ),
					'content' => $ui->get_template_part( 'help-tab-general', '', true ),
				),
				'nice-team-advanced-settings' => array(
					'id'      => 'nice-team-advanced-settings',
					'title'   => esc_html__( 'Advanced Settings', 'nice-team' ),
					'content' => $ui->get_template_part( 'help-tab-advanced', '', true ),
				),
				'nice-team-help-support' => array(
					'id'      => 'nice-team-help-support',
					'title'   => esc_html__( 'Help & Support', 'nice-team' ),
					'content' => $ui->get_template_part( 'help-tab-help', '', true ),
				),
				'nice-team-compatible-themes' => array(
					'id'      => 'nice-team-compatible-themes',
					'title'   => esc_html__( 'Compatible Themes', 'nice-team' ),
					'content' => $ui->get_template_part( 'help-tab-themes', '', true ),
				),
			),
		),
	) );

	return $help_tabs;
}
endif;
