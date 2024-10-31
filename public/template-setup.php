<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles the initialization of the plugin's templating system.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/** ==========================================================================
 *  Initial basic setup.
 *  ======================================================================= */
if ( ! function_exists( 'nice_team_templates_dir' ) ) :
add_filter( 'nice_team_templates_dir', 'nice_team_templates_dir' );
/**
 * Define the name of the directory where templates should be placed within a
 * theme.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Nice_Team_Template_Handler::get_theme_template_dir_name()
 *
 * @return string
 */
function nice_team_templates_dir() {
	return 'team';
}
endif;

if ( ! function_exists( 'nice_team_current_page_template' ) ) :
add_filter( 'nice_team_template_include', 'nice_team_current_page_template' );
/**
 * Set the location of the current template.
 *
 * @since 1.0
 *
 * Hook origin:
 * @see Nice_Team_PublicDisplayResponder::template_include()
 *
 * @param  string $template Current page template.
 *
 * @return string
 */
function nice_team_current_page_template( $template ) {
	return Nice_Team_Page_Template::obtain( $template );
}
endif;

if ( ! function_exists( 'nice_team_setup_current_page' ) ) :
add_action( 'nice_team_setup_page', 'nice_team_setup_current_page' );
/**
 * Setup hooks for the current page.
 *
 * All actions that generate specific HTML output for different team
 * pages should be hooked to the actions that are fired within the
 * following function.
 *
 * @uses  Nice_Team_Setup_Page::init()
 *
 * @see   nice_team_setup_category_page()
 * @see   nice_team_setup_archive_page()
 *
 * Hook origin:
 * @see Nice_Team_PublicDisplayResponder::setup_page()
 *
 * @since 1.0
 */
function nice_team_setup_current_page() {
	Nice_Team_Setup_Page::init();
}
endif;

/** ==========================================================================
 *  Page setup.
 *  ======================================================================= */
if ( ! function_exists( 'nice_team_setup_category_page' ) ) :
add_action( 'nice_team_category_page', 'nice_team_setup_category_page' );
/**
 * Setup hooks for team category page.
 *
 * Hook origin:
 * @see nice_team_setup_current_page()
 * @see Nice_Team_Setup_Page::setup_team_category_page()
 *
 * @since 1.0
 */
function nice_team_setup_category_page() {
	/**
	 * Set the title of the current page to the category title.
	 *
	 * @since 1.0
	 *
	 * @uses  nice_team_get_category_title()
	 */
	add_filter( 'nice_team_the_title', 'nice_team_get_category_title', 10 );
}
endif;

if ( ! function_exists( 'nice_team_setup_archive_page' ) ) :
add_action( 'nice_team_archive_page', 'nice_team_setup_archive_page' );
/**
 * Setup hooks for team archive page.
 *
 * Hook origin:
 * @see nice_team_setup_current_page()
 * @see Nice_Team_Setup_Page::setup_team_archive_page()
 *
 * @since 1.0
 */
function nice_team_setup_archive_page() {
	/**
	 * Set the title of the current page to the archive title.
	 *
	 * @since 1.0
	 *
	 * @uses  nice_team_get_archive_title()
	 */
	add_filter( 'nice_team_the_title', 'nice_team_get_archive_title', 10 );
}
endif;
