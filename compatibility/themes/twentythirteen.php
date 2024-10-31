<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks for compatibility with the Twenty Thirteen theme.
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

if ( ! function_exists( 'nice_team_twentythirteen_wrapper_start' ) ) :
add_filter( 'nice_team_wrapper_start', 'nice_team_twentythirteen_wrapper_start' );
/**
 * Define opening template wrapper.
 *
 * @since 1.0
 */
function nice_team_twentythirteen_wrapper_start() {
	return '<div id="primary" class="site-content"><div id="content" role="main" class="nice-team-content twentythirteen">';
}
endif;

if ( ! function_exists( 'nice_team_twentythirteen_page_navigation' ) ) :
remove_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );
add_action( 'nice_team_after_main_content', 'nice_team_twentythirteen_page_navigation', 0 );
/**
 * Display page navigation for Twenty Thirteen.
 *
 * @since 1.0
 */
function nice_team_twentythirteen_page_navigation() {
	twentythirteen_paging_nav();
}
endif;

if ( ! function_exists( 'nice_team_twentythirteen_member_navigation' ) ) :
remove_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );
add_filter( 'nice_team_after_single_member', 'nice_team_twentythirteen_member_navigation', 10 );
/**
 * Display page navigation for Twenty Thirteen.
 *
 * @since 1.0
 */
function nice_team_twentythirteen_member_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( $next || $previous ) : ?>

		<nav class="navigation post-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Member navigation', 'nice-team' ); ?></h1>
			<div class="nav-links">

				<?php previous_post_link( '%link', wp_kses( _x( '<span class="meta-nav">&larr;</span> %title', 'Previous member link', 'nice-team' ), array( 'span' => array( 'class' => array() ) ) ) ); ?>
				<?php next_post_link( '%link', wp_kses( _x( '%title <span class="meta-nav">&rarr;</span>', 'Next member link', 'nice-team' ), array( 'span' => array( 'class' => array() ) ) ) ); ?>

			</div><!-- .nav-links -->
		</nav><!-- .navigation -->

	<?php endif;
}
endif;
