<?php
/**
 * NiceThemes Post Type API
 *
 * @package Nice_Team_Post_Type_API
 * @license GPL-2.0+
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Nice_Team_Post_Type_Admin' ) ) :
/**
 * Register post types and taxonomies.
 *
 * @package Nice_Team_Post_Type
 * @since   1.1
 */
class Nice_Team_Post_Type_Admin extends Nice_Team_Entity {
	/**
	 * Registered post type object.
	 *
	 * @var Nice_Team_Post_Type
	 */
	protected $post_type;

	/**
	 * Data for Dashboard at a Glance.
	 *
	 * @var   Nice_Team_Glancer
	 * @since 1.1
	 */
	protected $glancer;

	/**
	 * Text domain for this class.
	 *
	 * @var  string
	 * since 1.1
	 */
	protected $textdomain = 'nice-team-post-type-admin';
}
endif;
