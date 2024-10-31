<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles help pointers for the admin-facing side of the plugin.
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

if ( ! function_exists( 'nice_team_admin_pointers_data' ) ) :
add_filter( 'nice_team_admin_pointers_data', 'nice_team_admin_pointers_data' );
/**
 * Register help pointers.
 *
 * @since  1.0
 *
 * @param  array $pointers Current lis of help pointers.
 *
 * @return array
 */
function nice_team_admin_pointers_data( array $pointers = null ) {
	$pointers[] = array(
		'id'       => 'nice_team_help_pointer',
		'screen'   => nice_team_post_type_name() . '_page_' . nice_team_plugin_slug(),
		'target'   => '#navtabs a:first-child',
		'title'    => nice_team_plugin_name(),
		'content'  => esc_html__( 'Thank you for installing this plugin :) In this page you can set all the available options to display your team members the way you want.', 'nice-team' ),
		'position' => array(
			'edge'  => 'left',   // top, bottom, left, right
			'align' => 'middle', // top, bottom, left, right, middle
		),
	);

	return $pointers;
}
endif;
