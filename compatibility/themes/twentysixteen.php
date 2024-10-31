<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks for compatibility with the Twenty Sixteen theme.
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

if ( ! function_exists( 'nice_team_twentysixteen_wrapper_start' ) ) :
add_filter( 'nice_team_wrapper_start', 'nice_team_twentysixteen_wrapper_start' );
/**
 * Define opening template wrapper.
 *
 * @since 1.0
 */
function nice_team_twentysixteen_wrapper_start() {
	return '<div id="primary" class="content-area twentysixteen"><main id="main" class="site-main nice-team-content" role="main">';
}
endif;

if ( ! function_exists( 'nice_team_twentysixteen_wrapper_end' ) ) :
add_filter( 'nice_team_wrapper_end', 'nice_team_twentysixteen_wrapper_end' );
/**
 * Define closing template wrapper.
 *
 * @since 1.0
 */
function nice_team_twentysixteen_wrapper_end() {
	ob_start();
	?>
			</main>
			<?php get_sidebar( 'content-bottom' ); ?>
		</div>
	<?php

	$wrapper_end = ob_get_contents();
	ob_end_clean();

	return $wrapper_end;
}
endif;

if ( ! function_exists( 'nice_team_twentysixteen_content_bottom_sidebar' ) ) :
add_action( 'nice_team_after_main_content', 'nice_team_twentysixteen_content_bottom_sidebar', 20 );
/**
 * Display `content-bottom` sidebar after the main content.
 *
 * @since 1.0
 */
function nice_team_twentysixteen_content_bottom_sidebar() {
	get_sidebar( 'content-bottom' );
}
endif;

if ( ! function_exists( 'nice_team_twentysixteen_page_navigation' ) ) :
remove_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );
add_action( 'nice_team_after_main_content', 'nice_team_twentysixteen_page_navigation', 0 );
/**
 * Display page navigation for Twenty sixteen.
 *
 * @since 1.0
 */
function nice_team_twentysixteen_page_navigation() {
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	the_posts_pagination( array(
			'prev_text'          => esc_html__( 'Previous page', 'twentysixteen' ),
			'next_text'          => esc_html__( 'Next page', 'twentysixteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'twentysixteen' ) . ' </span>',
		)
	);
}
endif;

if ( ! function_exists( 'nice_team_twentysixteen_member_navigation' ) ) :
remove_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );
add_filter( 'nice_team_after_single_member', 'nice_team_twentysixteen_member_navigation', 10 );
/**
 * Display page navigation for Twenty sixteen.
 *
 * @since 1.0
 */
function nice_team_twentysixteen_member_navigation() {
	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'twentysixteen' ) . '</span>
			<span class="screen-reader-text">' . esc_html__( 'Next member:', 'nice-team' ) . '</span>
			<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'twentysixteen' ) . '</span>
			<span class="screen-reader-text">' . esc_html__( 'Previous member:', 'nice-team' ) . '</span>
			<span class="post-title">%title</span>',
	) );
}
endif;
