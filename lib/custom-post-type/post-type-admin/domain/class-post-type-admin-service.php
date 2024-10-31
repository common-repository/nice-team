<?php
/**
 * NiceThemes Post Type API
 *
 * @package Nice_Team_Post_Type_API
 * @since   1.1
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Nice_Team_Post_Type_AdminService
 *
 * This class deals with typical operations over Nice_Team_Post_Type_Admin instances.
 *
 * @since 1.1
 */
class Nice_Team_Post_Type_AdminService extends Nice_Team_Service {
	/**
	 * Initialize Admin UI.
	 *
	 * @since 1.1
	 *
	 * @param Nice_Team_Post_Type_Admin $post_type_admin
	 */
	public static function set_glancer( Nice_Team_Post_Type_Admin $post_type_admin ) {
		/**
		 * Update admin instance.
		 */
		nice_team_update( $post_type_admin, array(
				'glancer' => self::get_glancer( $post_type_admin ),
			)
		);
	}

	/**
	 * Obtain a glancer instance for our post type.
	 *
	 * @since  1.1
	 *
	 * @param  Nice_Team_Post_Type_Admin $post_type_admin
	 *
	 * @return Nice_Team_Glancer
	 */
	protected static function get_glancer( Nice_Team_Post_Type_Admin $post_type_admin ) {
		static $glancer = null;

		if ( $glancer ) {
			return $glancer;
		}

		/**
		 * Obtain basic data.
		 */
		$data = $post_type_admin->get_info();
		$data = $data->post_type->args;

		/**
		 * Create new glancer instance.
		 */
		$glancer = nice_team_glancer_create( array(
				'textdomain' => $post_type_admin->{'textdomain'},
				'items'      => array(),
			)
		);

		/**
		 * Obtain arguments to add a new item to the glancer object.
		 */
		$args = apply_filters( 'nice_team_post_type_admin_glancer_args', array(
				'glancer'   => $glancer,
				'post_type' => $data['name'],
				'statuses'  => array( 'publish', 'pending' ),
				'glyph'     => empty( $data['dashicons_glyph'] ) ? null : $data['dashicons_glyph'],
			), $post_type_admin
		);

		/**
		 * Update our glancer object.
		 */
		call_user_func_array( 'nice_team_glancer_add_item', $args );

		return $glancer;
	}
}
