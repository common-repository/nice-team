<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles functionality related to plugin settings.
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

if ( ! function_exists( 'nice_team_set_default_settings' ) ) :
add_filter( 'nice_team_default_settings', 'nice_team_set_default_settings' );
/**
 * Set default plugin settings.
 *
 * @see    nice_team_default_settings()
 *
 * @since  1.0
 *
 * @return array
 */
function nice_team_set_default_settings() {
	$defaults = array(
		'remove_data_on_deactivation'   => false,
		'rewrite_member_slug'           => 'team-member',
		'rewrite_category_slug'         => 'team',
		'rewrite_category_hierarchical' => true,
		'rewrite_with_front'            => false,
		'limit'                         => get_option( 'posts_per_page' ),
		'columns'                       => 3,
		'orderby'                       => 'id',
		'order'                         => 'desc',
		'avoidcss'                      => false,
		'include_children'              => true,
		'visible_data'                  => array(
			'position'  => 1,
			'thumbnail' => 1,
			'url'       => 1,
			'email'     => 1,
			'twitter'   => 1,
			'facebook'  => 1,
			'linkedin'  => 1,
		),
		'archive_image_size'            => array(
			'width'  => 300,
			'height' => 300,
			'crop'   => true,
		),
		'single_image_size'             => array(
			'width'  => 1024,
			'height' => 1024,
			'crop'   => false,
		),
	);

	return $defaults;
}
endif;
