<?php
/**
 * Nice Team by NiceThemes.
 *
 * Check for plugin requirements.
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
 * Check if GD library is installed.
 *
 * @since 1.0
 */
add_filter( 'nice_team_check_gd_installed', '__return_true' );
