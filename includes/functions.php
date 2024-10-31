<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file includes general functions that can be used from both the public
 * and admin-facing side of this plugin.
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

if ( ! function_exists( 'nice_team_post_type_name' ) ) :
/**
 * Name of main custom post type of this plugin.
 *
 * @since 1.0
 */
function nice_team_post_type_name() {
	return apply_filters( 'nice_team_post_type_name', 'team_member' );
}
endif;

if ( ! function_exists( 'nice_team_category_name' ) ) :
/**
 * Name of main taxonomy of this plugin.
 *
 * @since 1.0
 */
function nice_team_category_name() {
	return apply_filters( 'nice_team_category_name', 'team' );
}
endif;

if ( ! function_exists( 'nice_team_get_current_post' ) ) :
/**
 * Obtain currently viewed post from custom post type.
 *
 * @since  1.0
 *
 * @return string
 */
function nice_team_get_current_post() {
	$current_post = get_query_var( nice_team_post_type_name() );
	$current_post = apply_filters( 'nice_team_current_post', $current_post );

	return $current_post;
}
endif;

if ( ! function_exists( 'nice_team_get_current_category' ) ) :
/**
 * Obtain currently viewed post from custom post type.
 *
 * @since  1.0
 *
 * @return string
 */
function nice_team_get_current_category() {
	$current_category = get_query_var( nice_team_category_name() );
	$current_category = apply_filters( 'nice_team_current_category', $current_category );

	return $current_category;
}
endif;

if ( ! function_exists( 'nice_team_is_team_member_post_type' ) ) :
/**
 * Check if the current page belongs to the team member post type.
 *
 * @since 1.0
 *
 * @return bool
 */
function nice_team_is_team_member_post_type() {
	// Compare custom post type with current post type.
	$is_team_member_post_type = nice_team_post_type_name() === get_post_type();

	// Allow overriding.
	$is_team_member_post_type = apply_filters( 'nice_team_is_team_member_post_type', $is_team_member_post_type );

	return $is_team_member_post_type;
}
endif;

if ( ! function_exists( 'nice_team_is_404' ) ) :
/**
 * Check if the current page is a 404 error page triggered by a team post type or taxonomy.
 *
 * @since  1.0
 *
 * @return bool
 */
function nice_team_is_404() {
	return nice_team_is_member_404() || nice_team_is_category_404();
}
endif;

if ( ! function_exists( 'nice_team_is_member_404' ) ) :
/**
 * Check if the current page is a 404 error page triggered by a team menu item.
 *
 * @since  1.0
 *
 * @return bool
 *
 */
function nice_team_is_member_404() {
	static $is_member_404 = null;

	if ( ! is_null( $is_member_404 ) ) {
		return $is_member_404;
	}

	// Check if we're in a 404 page.
	$is_404 = is_404();

	// Set initial state.
	$is_member_404 = false;

	// Initialize filter arguments.
	$filter_args = array(
		'is_404' => $is_404,
	);

	if ( $is_404 ) {
		// Retrieve relevant query vars.
		$query_post_type = get_query_var( 'post_type' );

		// Check if the current 404 page was triggered from a team member.
		$is_query_member_404 = ( nice_team_post_type_name() === $query_post_type );

		// Evaluate all previous values.
		$is_member_404 = $is_404 && $is_query_member_404;

		// Add corresponding filter arguments.
		$filter_args['is_menu_item_404'] = $is_query_member_404;
	}

	// Allow overriding.
	$is_member_404 = apply_filters( 'nice_team_is_member_404', $is_member_404, $filter_args );

	return $is_member_404;
}
endif;

if ( ! function_exists( 'nice_team_is_category_404' ) ) :
/**
 * Check if the current page is a 404 error page triggered by a team category.
 *
 * @since 1.0
 *
 * @return bool
 *
 */
function nice_team_is_category_404() {
	static $is_category_404 = null;

	if ( ! is_null( $is_category_404 ) ) {
		return $is_category_404;
	}

	$is_category_404 = false;

	// Check if we're in a 404 page.
	$is_404 = is_404();

	// Initialize filter arguments.
	$filter_args = array(
		'is_404' => $is_404,
	);

	if ( $is_404 ) {

		// Retrieve relevant query vars.
		$query_taxonomy = get_query_var( 'taxonomy' );

		// Check if the current 404 page was triggered from a team category.
		$is_query_category_404 = ( nice_team_category_name() === $query_taxonomy );

		// Evaluate all previous values.
		$is_category_404 = $is_404 && $is_query_category_404;

		// Add corresponding filter arguments.
		$filter_args['is_category_404'] = $is_query_category_404;
	}

	// Allow overriding.
	$is_category_404 = apply_filters( 'nice_team_is_category_404', $is_category_404, $filter_args );

	return $is_category_404;
}
endif;

if ( ! function_exists( 'nice_team_is_single' ) ) :
/**
 * Check if the current page is a single team member.
 *
 * @since  1.0
 *
 * @return bool
 */
function nice_team_is_single() {
	static $is_team_single = null;

	if ( is_null( $is_team_single ) ) {
		// Check if we're in a team member page.
		$is_team_single = nice_team_bool( nice_team_get_current_post() );
	}

	return $is_team_single;
}
endif;

if ( ! function_exists( 'nice_team_is_archive' ) ) :
/**
 * Check if the current page is a team archive.
 *
 * @since 1.0
 *
 * @return bool
 */
function nice_team_is_archive() {
	// Check if the current page is an archive.
	$is_archive = is_archive() && ! is_tax();

	// Check if the current page belongs to the team member post type.
	$is_team = nice_team_is_team_member_post_type();

	// Evaluate both previous values.
	$is_team_archive = $is_archive && $is_team;

	// Allow overriding.
	$is_team_archive = apply_filters( 'nice_team_is_archive', $is_team_archive );

	return $is_team_archive;
}
endif;

if ( ! function_exists( 'nice_team_is_category' ) ) :
/**
 * Check if the current page is a team category.
 *
 * @since 1.0
 *
 * @return mixed|string|bool Slug of the current category, or false if not found.
 */
function nice_team_is_category() {
	// Check for a current team category.
	$is_team_category = nice_team_get_current_category();

	// Allow overriding.
	$is_team_category = apply_filters( 'nice_team_is_category', $is_team_category );

	return $is_team_category;
}
endif;

if ( ! function_exists( 'nice_team_sync_member_with_user' ) ) :
/**
 * Check if team members should retrieve data from matched users.
 *
 * @since  1.0
 *
 * @return bool
 */
function nice_team_sync_member_with_user() {
	static $sync = null;

	if ( is_null( $sync ) ) {
		$sync = apply_filters( 'nice_team_sync_member_with_user', false );
	}

	return $sync;
}
endif;
