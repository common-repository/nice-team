<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains functions that load templates.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/** ==========================================================================
 *  Global Templates.
 *  ======================================================================= */

if ( ! function_exists( 'nice_team_wrapper_start' ) ) :
/**
 * Print the opening content wrapper.
 *
 * @uses nice_team_get_template()
 *
 * Remove this action using:
 *
	remove_action( 'nice_team_before_main_content', 'nice_team_wrapper_start', 10 );
 *
 * Then you can use `get_template_part()` to use your custom wrapper.
 *
 * @since 1.0
 */
function nice_team_wrapper_start() {
	nice_team_get_template( 'global/wrapper-start.php' );
}
endif;

if ( ! function_exists( 'nice_team_wrapper_end' ) ) :
/**
 * Print the closing content wrapper.
 *
 * @uses nice_team_get_template()
 *
 * Remove this action using:
 *
	remove_action( 'nice_team_after_main_content', 'nice_team_wrapper_end', 10 );
 *
 * Then you can use `get_template_part()` to use your custom wrapper.
 *
 * @since 1.0
 */
function nice_team_wrapper_end() {
	nice_team_get_template( 'global/wrapper-end.php' );
}
endif;

if ( ! function_exists( 'nice_team_title' ) ) :
/**
 * Display a pre-formatted version of the title.
 *
 * Use this function only to display top-level page titles. It will not work for
 * titles within loops.
 *
 * @since 1.0
 *
 * @uses  nice_team_the_title()
 */
function nice_team_title() {
	nice_team_get_template( 'global/title.php' );
}
endif;

/** ==========================================================================
 *  Loop Templates.
 *  ======================================================================= */

if ( ! function_exists( 'nice_team_loop_empty' ) ) :
/**
 * Load template for the empty message.
 *
 * @since 1.0
 */
function nice_team_loop_empty() {
	nice_team_get_template( 'loop/empty/empty.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_main_wrapper_start' ) ) :
/**
 * Load opening wrapper before the loop from `nice_team()` has been processed.
 *
 * @since 1.0
 */
function nice_team_loop_main_wrapper_start() {
	nice_team_get_template( 'loop/main-wrapper-start.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_main_wrapper_end' ) ) :
/**
 * Load closing wrapper after the loop from `nice_team()` has been processed.
 *
 * @since 1.0
 */
function nice_team_loop_main_wrapper_end() {
	nice_team_get_template( 'loop/main-wrapper-end.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_member_wrapper_start' ) ) :
/**
 * Load template with the opening wrapper for a looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_wrapper_start() {
	nice_team_get_template( 'loop/member/wrapper-start.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_member_wrapper_end' ) ) :
/**
 * Load template with the closing wrapper for a looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_wrapper_end() {
	nice_team_get_template( 'loop/member/wrapper-end.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_members_page_navigation' ) ) :
/**
 * Display navigation to next/previous pages.
 *
 * @since 1.0
 */
function nice_team_loop_members_page_navigation() {
	global $wp_query;

	// Return early if we don't have more than one page.
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	nice_team_get_template( 'loop/members-page-navigation.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_member_thumbnail' ) ) :
/**
 * Load template for the looped member thumbnail.
 *
 * @since 1.0
 */
function nice_team_loop_member_thumbnail() {
	if ( nice_team_member_can_display( 'thumbnail' ) ) {
		nice_team_get_template( 'loop/member/featured-image.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_description' ) ) :
/**
 * Load template for the looped member description.
 *
 * @since 1.0
 */
function nice_team_loop_member_description() {
	nice_team_get_template( 'loop/member/description.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_member_meta' ) ) :
/**
 * Load template for the looped member's meta data.
 *
 * @since 1.0
 */
function nice_team_loop_member_meta() {
	$member = nice_team_obtain_member();

	$load_template = ( nice_team_member_can_display( 'url' ) && nice_team_get_member_url() )
	                 || ( nice_team_member_can_display( 'email' ) && nice_team_get_member_email() )
	                 || ( nice_team_member_can_display( 'twitter' ) && nice_team_get_member_twitter() )
	                 || ( nice_team_member_can_display( 'facebook' ) && nice_team_get_member_facebook() )
	                 || ( nice_team_member_can_display( 'linkedin' ) && nice_team_get_member_linkedin() )
	                 || isset( $member->user->ID );

	/**
	 * @hook nice_team_loop_member_meta_load_template
	 *
	 * Hook here to modify the conditions to load the template.
	 *
	 * @since 1.0
	 */
	if ( apply_filters( 'nice_team_loop_member_meta_load_template', $load_template ) ) {
		nice_team_get_template( 'loop/member/meta.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_title' ) ) :
/**
 * Load template for the looped member's title.
 *
 * @since 1.0
 */
function nice_team_loop_member_title() {
	nice_team_get_template( 'loop/member/title.php' );
}
endif;

if ( ! function_exists( 'nice_team_loop_member_position' ) ) :
/**
 * Load template for the looped member's position.
 *
 * @since 1.0
 */
function nice_team_loop_member_position() {
	if ( nice_team_member_can_display( 'position' ) ) {
		nice_team_get_template( 'loop/member/position.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_url' ) ) :
/**
 * Load template for the URL of the looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_url() {
	if ( nice_team_member_can_display( 'url' ) ) {
		nice_team_get_template( 'loop/member/url.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_email' ) ) :
/**
 * Load template for the email of the looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_email() {
	if ( nice_team_member_can_display( 'email' ) ) {
		nice_team_get_template( 'loop/member/email.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_facebook' ) ) :
/**
 * Load template for the Facebook profile of the looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_facebook() {
	if ( nice_team_member_can_display( 'facebook' ) ) {
		nice_team_get_template( 'loop/member/facebook.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_twitter' ) ) :
/**
 * Load template for the Twitter username of the looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_twitter() {
	if ( nice_team_member_can_display( 'twitter' ) ) {
		nice_team_get_template( 'loop/member/twitter.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_linkedin' ) ) :
/**
 * Load template for the Linkedin profile of the looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_linkedin() {
	if ( nice_team_member_can_display( 'linkedin' ) ) {
		nice_team_get_template( 'loop/member/linkedin.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_loop_member_posts' ) ) :
/**
 * Load template for the link to all the posts of the looped member.
 *
 * @since 1.0
 */
function nice_team_loop_member_posts() {
	$member = nice_team_obtain_member();

	if ( isset( $member->user->ID ) ) {
		nice_team_get_template( 'loop/member/posts.php' );
	}
}
endif;

/** ==========================================================================
 *  Single member templates.
 *  ======================================================================= */

if ( ! function_exists( 'nice_team_single_member_description' ) ) :
/**
 * Load template for the description of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_description() {
	$show_thumbnail   = nice_team_member_can_display( 'thumbnail' ) && nice_team_get_member_thumbnail();
	$show_description = nice_team_bool( nice_team_get_member_description() );

	// Only load if either the thumbnail or the description can be displayed.
	if ( $show_thumbnail || $show_description ) {
		nice_team_get_template( 'single-member/description.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_meta' ) ) :
/**
 * Load template for the attributes of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_meta() {
	$member = nice_team_obtain_member();

	$load_template = ( nice_team_member_can_display( 'url' ) && nice_team_get_member_url() )
	                 || ( nice_team_member_can_display( 'email' ) && nice_team_get_member_email() )
	                 || ( nice_team_member_can_display( 'twitter' ) && nice_team_get_member_twitter() )
	                 || ( nice_team_member_can_display( 'facebook' ) && nice_team_get_member_facebook() )
	                 || ( nice_team_member_can_display( 'linkedin' ) && nice_team_get_member_linkedin() )
	                 || isset( $member->user->ID );

	/**
	 * @hook nice_team_single_member_meta_load_template
	 *
	 * Hook here to modify the conditions to load the template.
	 *
	 * @since 1.0
	 */
	if ( apply_filters( 'nice_team_single_member_meta_load_template', $load_template ) ) {
		nice_team_get_template( 'single-member/meta.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_position' ) ) :
/**
 * Load template for the title of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_position() {
	if ( nice_team_member_can_display( 'position' ) ) {
		nice_team_get_template( 'single-member/position.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_url' ) ) :
/**
 * Load template for the URL of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_url() {
	if ( nice_team_member_can_display( 'url' ) ) {
		nice_team_get_template( 'single-member/url.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_email' ) ) :
/**
 * Load template for the email of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_email() {
	if ( nice_team_member_can_display( 'email' ) ) {
		nice_team_get_template( 'single-member/email.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_facebook' ) ) :
/**
 * Load template for the Facebook profile of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_facebook() {
	if ( nice_team_member_can_display( 'facebook' ) ) {
		nice_team_get_template( 'single-member/facebook.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_twitter' ) ) :
/**
 * Load template for the Twitter username of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_twitter() {
	if ( nice_team_member_can_display( 'twitter' ) ) {
		nice_team_get_template( 'single-member/twitter.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_linkedin' ) ) :
/**
 * Load template for the Linkedin profile of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_linkedin() {
	if ( nice_team_member_can_display( 'linkedin' ) ) {
		nice_team_get_template( 'single-member/linkedin.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_posts' ) ) :
/**
 * Load template for the link to all the posts of a single member.
 *
 * @since 1.0
 */
function nice_team_single_member_posts() {
	$member = nice_team_obtain_member();

	if ( isset( $member->user->ID ) ) {
		nice_team_get_template( 'single-member/posts.php' );
	}
}
endif;

if ( ! function_exists( 'nice_team_single_member_navigation' ) ) :
/**
 * Display navigation for team members.
 *
 * @since  1.0
 *
 * @return string
 */
function nice_team_single_member_navigation() {
	nice_team_get_template( 'single-member/navigation.php' );
}
endif;
