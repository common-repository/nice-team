<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains actions to register the `team_member` post type and its
 * related taxonomies.
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

if ( ! function_exists( 'nice_team_add_post_type' ) ) :
add_filter( 'nice_team_post_types', 'nice_team_add_post_type' );
/**
 * Register the team post type using our CPT creator library.
 *
 * @since  1.0
 *
 * @param  array $post_types Current list of post types.
 *
 * @return array
 */
function nice_team_add_post_type( array $post_types = array() ) {
	/**
	 * Prepare arguments.
	 */
	$post_type = array(
		'args'  => apply_filters( 'nice_team_post_type', array() ),
		'taxonomies' => array(
			apply_filters( 'nice_team_category', array() )
		),
	);

	$post_types[] = apply_filters( 'nice_team_register_team_args', $post_type );

	return $post_types;
}
endif;
