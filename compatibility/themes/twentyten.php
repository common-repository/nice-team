<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks for compatibility with the Twenty Ten theme.
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

if ( ! function_exists( 'nice_team_twentyten_page_navigation' ) ) :
remove_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );
add_action( 'nice_team_after_main_content', 'nice_team_twentyten_page_navigation', 0 );
/**
 * Display page navigation for Twenty Ten.
 *
 * @since 1.0
 */
function nice_team_twentyten_page_navigation() {
	global $wp_query;

	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php next_posts_link( wp_kses( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ), array( 'span' => array( 'class' => array() ) ) ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( wp_kses( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ), array( 'span' => array( 'class' => array() ) ) ) ); ?></div>
		</div><!-- #nav-below -->
	<?php
}
endif;

if ( ! function_exists( 'nice_team_twentyten_member_navigation' ) ) :
remove_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );
add_action( 'nice_team_after_single_member', 'nice_team_twentyten_member_navigation', 10 );
/**
 * Display page navigation for Twenty Ten.
 *
 * @since 1.0
 */
function nice_team_twentyten_member_navigation() {
	?>
		<div id="nav-below" class="navigation">
			<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous member link', 'nice-team' ) . '</span> %title' ); ?></div>
			<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next member link', 'nice-team' ) . '</span>' ); ?></div>
		</div><!-- #nav-below -->
	<?php
}
endif;
