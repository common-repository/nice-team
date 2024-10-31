<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains general options that can be used from the public-facing
 * side of the plugin only.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_team_obtain_instance' ) ) :
/**
 * Obtain an instance of the Nice_Team class.
 *
 * A new instance will be created with the given arguments. If no arguments
 * are given, the function will return the last created instance of
 * Nice_Team.
 *
 * @since  1.0
 *
 * @param  array          $args Arguments to create a new instance.
 *
 * @return Nice_Team
 */
function nice_team_obtain_instance( $args = null ) {
	return Nice_Team::obtain( $args );
}
endif;

if ( ! function_exists( 'nice_team_obtain_member' ) ) :
/**
 * Obtain a member by its ID.
 *
 * If no ID is provided, the one of the currently looped element will be
 * used instead.
 *
 * @since  1.0
 *
 * @param  null|int               $member_id
 *
 * @return Nice_Team_Member
 */
function nice_team_obtain_member( $member_id = null ) {
	return Nice_Team_Member::obtain( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_needs_assets' ) ) :
/**
 * Check if we need to load assets.
 *
 * @since  1.0
 *
 * @return bool
 */
function nice_team_needs_assets() {
	$post = get_post();

	$settings     = nice_team_settings();
	$needs_assets = false;

	if ( ! $settings['avoidcss']                                           // Usage of scripts is permitted.
	     && (    ( $post && has_shortcode( $post->post_excerpt, 'team' ) ) // Excerpt uses the shortcode.
	          || ( $post && has_shortcode( $post->post_content, 'team' ) ) // Content uses the shortcode
	          || is_home()                                                 // Current page is home page.
	          || is_archive()                                              // Current page is some kind of archive page.
			  || nice_team_is_team_member_post_type()                      // Current page is for team_member post type.
			  || nice_team_is_category()                                   // Current page is a team category.
			)
	) {
		$needs_assets = true;
	}

	$needs_assets = apply_filters( 'nice_team_needs_assets', $needs_assets );

	return $needs_assets;
}
endif;
