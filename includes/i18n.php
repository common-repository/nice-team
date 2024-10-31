<?php
/**
 * Nice Team by NiceThemes.
 *
 * Manage functionality for localization features.
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

/**
 * The following strings define translatable data that's not tied to any
 * particular output.
 *
 * @since 1.0
 */
$nice_team_i18n_plugin_data = array(
	'plugin_name'        => esc_html__( 'Nice Team', 'nice-team' ),
	'plugin_name_author' => esc_html__( 'Nice Team By NiceThemes', 'nice-team' ),
	'plugin_description' => esc_html__( 'A great plugin to display team member profiles on your WordPress site.', 'nice-team' ),
);

add_filter( 'nice_team_plugin_i18n_data', 'nice_team_plugin_i18_domain_path' );
/**
 * Set the right location of language files.
 *
 * @since  1.0
 *
 * @param  array $data
 *
 * @return array
 */
function nice_team_plugin_i18_domain_path( array $data = array() ) {
	return array_merge( $data, array(
			'path' => nice_team_plugin_domain() . 'languages',
		)
	);
}
