<?php
/**
 * Nice Team by NiceThemes.
 *
 * Manage functionality for integrations.
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

if ( ! function_exists( 'nice_team_theme_compatibility' ) ) :
add_filter( 'nice_team_supported_integrations', 'nice_team_theme_compatibility' );
/**
 * Setup data for compatibility with themes.
 *
 * @since  1.0
 *
 * @param  array $integrations List of existing integrations.
 *
 * @return array
 */
function nice_team_theme_compatibility( $integrations = array() ) {
	$theme_compatibility_path = trailingslashit( NICE_TEAM_COMPATIBILITY_PATH ) . 'themes/';

	/**
	 * Create an array containing data to initialize our integrations when needed.
	 */
	$integrations = array_merge( $integrations, array(
		/**
		 * Twenty Ten.
		 *
		 * @see https://wordpress.org/themes/twentyten/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentyten',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentyten.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentyten_setup',
		),

		/**
		 * Twenty Eleven.
		 *
		 * @see https://wordpress.org/themes/twentyeleven/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentyeleven',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentyeleven.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentyeleven_setup',
		),

		/**
		 * Twenty Twelve.
		 *
		 * @see https://wordpress.org/themes/twentytwelve/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentytwelve',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentytwelve.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentytwelve_setup',
		),

		/**
		 * Twenty Thirteen.
		 *
		 * @see https://wordpress.org/themes/twentythirteen/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentythirteen',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentythirteen.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentythirteen_setup',
		),

		/**
		 * Twenty Fourteen.
		 *
		 * @see https://wordpress.org/themes/twentyfourteen/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentyfourteen',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentyfourteen.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentyfourteen_setup',
		),

		/**
		 * Twenty Fifteen.
		 *
		 * @see https://wordpress.org/themes/twentyfifteen/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentyfifteen',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentyfifteen.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentyfifteen_setup',
		),

		/**
		 * Twenty Sixteen.
		 *
		 * @see https://wordpress.org/themes/twentysixteen/
		 *
		 * @since 1.0
		 */
		array(
			'name'            => 'twentysixteen',
			'type'            => 'theme',
			'path'            => $theme_compatibility_path . 'twentysixteen.php',
			'action'          => 'after_setup_theme',
			'function_exists' => 'twentysixteen_setup',
		),
	) );

	return $integrations;
}
endif;
