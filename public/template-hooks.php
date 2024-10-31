<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file adds actions and filters to hooks that are fired within templates,
 * setting up the visibility of single members and team pages.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/** ==========================================================================
 *  HTML wrappers.
 *  ======================================================================= */
/**
 * Print opening wrapper before the main content of a team page, category
 * tag, archive or single member.
 *
 * @since  1.0
 *
 * Hook origin:
 * @see All team page templates.
 *
 * @uses nice_team_wrapper_start()
 */
add_action( 'nice_team_before_main_content', 'nice_team_wrapper_start', 10 );

/**
 * Print opening wrapper after the main content of a team page, category
 * tag or archive.
 *
 * @since  1.0
 *
 * Hook origin:
 * @see All team page templates.
 *
 * @uses nice_team_wrapper_end()
 */
add_action( 'nice_team_after_main_content', 'nice_team_wrapper_end', 10 );

/**
 * Print opening wrapper before processing a loop of members.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_main_wrapper_start()
 */
add_action( 'nice_team_before_loop', 'nice_team_loop_main_wrapper_start', 10 );

/**
 * Print closing wrapper after processing a loop of members.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_main_wrapper_end()
 */
add_action( 'nice_team_after_loop', 'nice_team_loop_main_wrapper_end', 10 );

/**
 * Print loop opening wrapper.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_wrapper_start()
 */
add_action( 'nice_team_loop_member', 'nice_team_loop_member_wrapper_start', 10 );

/**
 * Print loop closing wrapper.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_wrapper_end()
 */
add_action( 'nice_team_loop_member', 'nice_team_loop_member_wrapper_end', 60 );

/** ==========================================================================
 *  Navigation.
 *  ======================================================================= */
/**
 * Print navigation for single members after the member has been processed.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Single member content template.
 *
 * @uses nice_team_single_member_navigation()
 */
add_action( 'nice_team_after_single_member', 'nice_team_single_member_navigation', 10 );

/**
 * Print navigation for categories, tags and archives after page main contents
 * and before the closing wrapper.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Team category, tag and archive templates.
 *
 * @uses nice_team_loop_members_page_navigation()
 */
add_action( 'nice_team_after_main_content', 'nice_team_loop_members_page_navigation', 0 );

/**
 * Display a sidebar in team pages and single member.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see All team page templates.
 *
 * @uses nice_team_sidebar()
 */
add_action( 'nice_team_sidebar', 'nice_team_sidebar', 10 );

/** ==========================================================================
 *  Page Header.
 *  ======================================================================= */
/**
 * Display the title of the current page.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see All team page templates.
 *
 * @uses nice_team_title()
 */
add_action( 'nice_team_header', 'nice_team_title' );

/** ==========================================================================
 *  Content.
 *  ======================================================================= */
/**
 * Print empty message when the list of members has no data.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_empty()
 */
add_action( 'nice_team_empty', 'nice_team_loop_empty', 10 );

/**
 * Print the list of members based on Team > Settings.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see All team page templates.
 *
 * @uses nice_team()
 */
add_action( 'nice_team', 'nice_team', 10 );

/**
 * Print the list of members based on Team > Settings.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_members()
 */
add_action( 'nice_team_loop', 'nice_team_loop_members', 10 );

/**
 * Print the thumbnail of a member inside the loop.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_member_thumbnail()
 */
add_action( 'nice_team_loop_member', 'nice_team_loop_member_thumbnail', 20 );

/**
 * Print the title of a member inside the loop.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_member_title()
 */
add_action( 'nice_team_loop_member', 'nice_team_loop_member_title', 30 );

/**
 * Print looped member's position if available.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see templates/loop/member/title.php
 *
 * @uses nice_team_loop_member_position()
 */
add_action( 'nice_team_loop_after_member_title', 'nice_team_loop_member_position', 10 );

/**
 * Print the description of a member inside the loop.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_member_description()
 */
add_action( 'nice_team_loop_member', 'nice_team_loop_member_description', 40 );

/**
 * Print the meta data of a member inside the loop.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see nice_team()
 *
 * @uses nice_team_loop_member_meta()
 */
add_action( 'nice_team_loop_member', 'nice_team_loop_member_meta', 50 );

/**
 * Add meta data for looped members.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see templates/loop/member/meta.php
 *
 * @uses nice_team_loop_member_url()
 * @uses nice_team_loop_member_email()
 * @uses nice_team_loop_member_twitter()
 * @uses nice_team_loop_member_facebook()
 * @uses nice_team_loop_member_linkedin()
 * @uses nice_team_loop_member_posts()
 */
add_action( 'nice_team_loop_member_meta', 'nice_team_loop_member_url', 10 );
add_action( 'nice_team_loop_member_meta', 'nice_team_loop_member_email', 20 );
add_action( 'nice_team_loop_member_meta', 'nice_team_loop_member_twitter', 30 );
add_action( 'nice_team_loop_member_meta', 'nice_team_loop_member_facebook', 40 );
add_action( 'nice_team_loop_member_meta', 'nice_team_loop_member_linkedin', 50 );
add_action( 'nice_team_loop_member_meta', 'nice_team_loop_member_posts', 60 );

/**
 * Print the title of a single member.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Single member title template.
 *
 * @uses nice_team_single_member_description()
 */
add_action( 'nice_team_single_member_content', 'nice_team_single_member_position', 10 );

/**
 * Print the description of a single member.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Single member content template.
 *
 * @uses nice_team_single_member_description()
 */
add_action( 'nice_team_single_member_content', 'nice_team_single_member_description', 20 );

/**
 * Print the attributes of a single member.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Single member content template.
 *
 * @uses nice_team_single_member_meta()
 */
add_action( 'nice_team_single_member_content', 'nice_team_single_member_meta', 30 );

/**
 * Add meta data for single members.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see templates/single-member/meta.php
 *
 * @uses nice_team_single_member_url()
 * @uses nice_team_single_member_email()
 * @uses nice_team_single_member_twitter()
 * @uses nice_team_single_member_facebook()
 * @uses nice_team_single_member_linkedin()
 * @uses nice_team_single_member_posts()
 */
add_action( 'nice_team_single_member_meta', 'nice_team_single_member_url', 10 );
add_action( 'nice_team_single_member_meta', 'nice_team_single_member_email', 20 );
add_action( 'nice_team_single_member_meta', 'nice_team_single_member_twitter', 30 );
add_action( 'nice_team_single_member_meta', 'nice_team_single_member_facebook', 40 );
add_action( 'nice_team_single_member_meta', 'nice_team_single_member_linkedin', 50 );
add_action( 'nice_team_single_member_meta', 'nice_team_single_member_posts', 60 );
