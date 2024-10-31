<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks for compatibility with the Twenty Fifteen theme.
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

if ( ! function_exists( 'nice_team_twentyfifteen_wrapper_start' ) ) :
add_filter( 'nice_team_wrapper_start', 'nice_team_twentyfifteen_wrapper_start' );
/**
 * Define opening template wrapper.
 *
 * @since 1.0
 */
function nice_team_twentyfifteen_wrapper_start() {
	return '<div id="primary" role="main" class="content-area twentyfifteen"><div id="main" class="site-main nice-team-content">';
}
endif;

if ( ! function_exists( 'nice_team_twentyfifteen_remove_sidebar' ) ) :
add_action( 'nice_team_after_page_setup', 'nice_team_twentyfifteen_remove_sidebar', 10 );
/**
 * Remove default plugin sidebar.
 *
 * @since 1.0
 */
function nice_team_twentyfifteen_remove_sidebar() {
	remove_action( 'nice_team_sidebar', 'nice_team_sidebar', 10 );
}
endif;

if ( ! function_exists( 'nice_team_twentyfifteen_page_navigation' ) ) :
remove_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );
add_action( 'nice_team_after_main_content', 'nice_team_twentyfifteen_page_navigation', 0 );
/**
 * Display page navigation for Twenty Fifteen.
 *
 * @since 1.0
 */
function nice_team_twentyfifteen_page_navigation() {
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	the_posts_pagination( array(
			'prev_text'          => esc_html__( 'Previous page', 'twentyfifteen' ),
			'next_text'          => esc_html__( 'Next page', 'twentyfifteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'twentyfifteen' ) . ' </span>',
		)
	);
}
endif;

if ( ! function_exists( 'nice_team_twentyfifteen_member_navigation' ) ) :
remove_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );
add_filter( 'nice_team_after_single_member', 'nice_team_twentyfifteen_member_navigation', 10 );
/**
 * Display page navigation for Twenty Fifteen.
 *
 * @since 1.0
 */
function nice_team_twentyfifteen_member_navigation() {
	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'twentyfifteen' ) . '</span>
			<span class="screen-reader-text">' . esc_html__( 'Next member:', 'nice-team' ) . '</span>
			<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'twentyfifteen' ) . '</span>
			<span class="screen-reader-text">' . esc_html__( 'Previous member:', 'nice-team' ) . '</span>
			<span class="post-title">%title</span>',
	) );
}
endif;
