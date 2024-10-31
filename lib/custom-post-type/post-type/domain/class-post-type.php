<?php
/**
 * Nice Post Type
 *
 * @package Nice_Team_Post_Type
 * @license GPL-2.0+
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Nice_Team_Post_Type_Registrations' ) ) :
/**
 * Register post types and taxonomies.
 *
 * @package Nice_Team_Post_Type
 * @since   1.1
 */
class Nice_Team_Post_Type extends Nice_Team_Entity {
	/**
	 * Arguments to construct a new post type.
	 *
	 * @var array
	 */
	protected $args = array(
		'name'     => 'default',
		'labels'   => array(),
		'supports' => array(),
		'args'     => array(),
	);

	/**
	 * Arguments to create new taxonomies for our custom post type.
	 *
	 * @var array
	 */
	protected $taxonomies = array(
		array(
			'name'   => 'block-category',
			'labels' => array(),
			'args'   => array(),
		),
	);

	/**
	 * The text domain for this class.
	 *
	 * @var string
	 */
	protected $textdomain = 'nice-team-post-type';
}
endif;
