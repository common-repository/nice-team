<?php
/**
 * Nice Team by NiceThemes.
 *
 * Create action links for plugin entry in plugins page.
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

if ( ! function_exists( 'nice_team_admin_action_links' ) ) :
add_filter( 'nice_team_admin_action_links', 'nice_team_admin_action_links' );
/**
 * Add settings action link to the plugins page.
 *
 * @since  1.0
 *
 * @param  array $links Current list of action links.
 * @return array
 */
function nice_team_admin_action_links( $links ) {
	// Return early if we're in an AJAX context.
	if ( nice_team_doing_ajax() ) {
		return null;
	}

	// Set values for link components.
	$url = admin_url( 'edit.php?post_type=' . nice_team_post_type_name() . '&page=' . nice_team_plugin_slug() );
	$text = esc_html__( 'Settings', 'nice-team' );

	// List new links to be introduced.
	$new_links = array(
		'settings' => '<a href="' . esc_url( $url ) . '">' . esc_html( $text ) . '</a>',
	);
	$new_links = apply_filters( 'nice_team_admin_new_action_links', $new_links );

	$links = array_merge( $new_links, $links );

	return $links;
}
endif;
