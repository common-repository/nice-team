<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks for compatibility with the Twenty Eleven theme.
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

if ( ! function_exists( 'nice_team_twentyeleven_wrapper_start' ) ) :
add_filter( 'nice_team_wrapper_start', 'nice_team_twentyeleven_wrapper_start' );
/**
 * Define opening template wrapper.
 *
 * @since 1.0
 */
function nice_team_twentyeleven_wrapper_start() {
	return '<div id="primary"><div id="content" role="main" class="nice-team-content twentyeleven">';
}
endif;

if ( ! function_exists( 'nice_team_twentyeleven_remove_sidebar' ) ) :
add_action( 'nice_team_after_page_setup', 'nice_team_twentyeleven_remove_sidebar', 10 );
/**
 * Remove default plugin sidebar.
 *
 * @since 1.0
 */
function nice_team_twentyeleven_remove_sidebar() {
	remove_action( 'nice_team_sidebar', 'nice_team_sidebar', 10 );
}
endif;

if ( ! function_exists( 'nice_team_twentyeleven_page_navigation' ) ) :
remove_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );
add_action( 'nice_team_after_main_content', 'nice_team_twentyeleven_page_navigation', 0 );
/**
 * Display custom page navigation.
 *
 * @since 1.0
 */
function nice_team_twentyeleven_page_navigation() {
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	?>
		<nav id="<?php nice_team_page_navigation_id(); ?>">
			<h3 class="assistive-text"><?php esc_html_e( 'Member navigation', 'nice-team' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( wp_kses( __( '<span class="meta-nav">&larr;</span> Older members', 'nice-team' ), array( 'span' => array( 'class' => array() ) ) ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( wp_kses( __( 'Newer members <span class="meta-nav">&rarr;</span>', 'nice-team' ), array( 'span' => array( 'class' => array() ) ) ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php
}
endif;

if ( ! function_exists( 'nice_team_twentyeleven_member_navigation' ) ) :
remove_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );
add_action( 'nice_team_before_single_member', 'nice_team_twentyeleven_member_navigation', 10 );
/**
 * Display page navigation for Twenty Eleven.
 *
 * @since 1.0
 */
function nice_team_twentyeleven_member_navigation() {
	?>
		<nav id="nav-single">
			<h3 class="assistive-text"><?php esc_html_e( 'Member navigation', 'nice-team' ); ?></h3>
			<span class="nav-previous"><?php previous_post_link( '%link', wp_kses( __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ), array( 'span' => array( 'class' => array() ) ) ) ); ?></span>
			<span class="nav-next"><?php next_post_link( '%link', wp_kses( __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ), array( 'span' => array( 'class' => array() ) ) ) ); ?></span>
		</nav><!-- #nav-single -->
	<?php
}
endif;

/**
 * Remove thumbnail from single member in Twenty Eleven.
 *
 * @since 1.0
 */
remove_action( 'nice_team_single_member_content', 'nice_team_single_member_thumbnail', 10 );
