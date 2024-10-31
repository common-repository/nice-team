<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks for compatibility with the Twenty Twelve theme.
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

if ( ! function_exists( 'nice_team_twentytwelve_wrapper_start' ) ) :
add_filter( 'nice_team_wrapper_start', 'nice_team_twentytwelve_wrapper_start' );
/**
 * Define opening template wrapper.
 *
 * @since 1.0
 */
function nice_team_twentytwelve_wrapper_start() {
	return '<div id="primary" class="site-content"><div id="content" role="main" class="nice-team-content twentytwelve">';
}
endif;

if ( ! function_exists( 'nice_team_twentytwelve_before_single_member' ) ) :
add_action( 'nice_team_before_single_member', 'nice_team_twentytwelve_before_single_member' );
/**
 * Print HTML before a single member.
 *
 * @since 1.0
 */
function nice_team_twentytwelve_before_single_member() {
	echo '<article>';
}
endif;

if ( ! function_exists( 'nice_team_twentytwelve_after_single_member' ) ) :
add_action( 'nice_team_after_single_member', 'nice_team_twentytwelve_after_single_member' );
/**
 * Print HTML after a single member.
 *
 * @since 1.0
 */
function nice_team_twentytwelve_after_single_member() {
	echo '</article>';
}
endif;

if ( ! function_exists( 'nice_team_twentytwelve_page_navigation' ) ) :
remove_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );
add_action( 'nice_team_after_main_content', 'nice_team_twentytwelve_page_navigation', 0 );
/**
 * Display page navigation for Twenty Thirteen.
 *
 * @since 1.0
 */
function nice_team_twentytwelve_page_navigation() {
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	twentytwelve_content_nav( 'nav-below' );
}
endif;

if ( ! function_exists( 'nice_team_twentytwelve_member_navigation' ) ) :
remove_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );
add_action( 'nice_team_after_single_member', 'nice_team_twentytwelve_member_navigation', 10 );
/**
 * Display page navigation for Twenty Twelve.
 *
 * @since 1.0
 */
function nice_team_twentytwelve_member_navigation() {
	?>
		<nav class="nav-single">
			<h3 class="assistive-text"><?php esc_html_e( 'Members navigation', 'nice-team' ); ?></h3>
			<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous member link', 'nice-team' ) . '</span> %title' ); ?></span>
			<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next member link', 'nice-team' ) . '</span>' ); ?></span>
		</nav><!-- .nav-single -->
	<?php
}
endif;
