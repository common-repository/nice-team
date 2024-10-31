<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles processes for media management.
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

if ( ! function_exists( 'nice_team_add_image_sizes' ) ) :
add_action( 'init', 'nice_team_add_image_sizes' );
/**
 * Add custom image sizes
 *
 * @since 1.0
 */
function nice_team_add_image_sizes() {
	$settings           = nice_team_settings();
	$archive_image_size = $settings['archive_image_size'];
	$single_image_size  = $settings['single_image_size'];

	// Add size for archive images.
	add_image_size(
		'nice-team-archive',
		absint( $archive_image_size['width'] ),
		absint( $archive_image_size['height'] ),
		$archive_image_size['crop']
	);

	// Add size for single project images.
	add_image_size(
		'nice-team-single',
		absint( $single_image_size['width'] ),
		absint( $single_image_size['height'] ),
		$single_image_size['crop']
	);
}
endif;
