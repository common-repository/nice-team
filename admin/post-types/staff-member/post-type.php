<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks to handle the `team_member` post type in the
 * admin-facing side of the plugin.
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

if ( ! function_exists( 'nice_team_relocate_image' ) ) :
add_filter( 'nice_team_post_type_add_image_column', 'nice_team_relocate_image' );
/**
 * Move featured image to the first column in the list of team members.
 *
 * @since 1.0
 *
 * @param  array $columns
 * @return array
 */
function nice_team_relocate_image( $columns ) {
	if ( nice_team_doing_ajax() && isset( $_POST['post_ID'] ) ) { // WPCS: CSRF ok.
		$post_type = get_post_type( intval( $_POST['post_ID'] ) ); // WPCS: CSRF ok.
	}

	if ( empty( $post_type ) ) {
		$post_type = get_query_var( 'post_type' );
	}

	if ( empty( $post_type ) ) {
		return $columns;
	}

	if ( isset( $columns['thumbnail'] ) && nice_team_post_type_name() === $post_type ) {
		// Store the original key and value for the thumbnail.
		$new_columns['thumbnail'] = $columns['thumbnail'];

		// Remove value from original array.
		unset( $columns['thumbnail'] );

		// Divide the original array in two by the necessary position.
		$f = array_splice( $columns, 0, array_search( 'cb', array_keys( $columns ) ) + 1 );

		// Put the parts together again as needed.
		$columns = array_merge( $f, $new_columns, $columns );
	}
	$columns = apply_filters( 'nice_team_relocate_image', $columns );

	return $columns;
}
endif;

if ( ! function_exists( 'nice_team_post_updated_messages' ) ) :
add_filter( 'post_updated_messages', 'nice_team_post_updated_messages' );
/**
 * Add custom messages after updating a team member.
 *
 * @since  1.0
 *
 * @param  array $messages
 * @return array
 */
function nice_team_post_updated_messages( $messages ) {
	global $post;

	$post_type_name = nice_team_post_type_name();

	if ( $post_type_name === $post->post_type ) {
		$team_member_updated_messages = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf(
				wp_kses( __( 'Team member updated. <a href="%s">View team member</a>', 'nice-team' ), array( 'a' => array( 'href' ) ) ),
				esc_url( get_permalink( $post->ID ) )
			),
			2  => esc_html__( 'Custom field updated.', 'nice-team' ),
			3  => esc_html__( 'Custom field deleted.', 'nice-team' ),
			4  => esc_html__( 'Team member updated.', 'nice-team' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Team member restored to revision from %s', 'nice-team' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf(
				wp_kses( __( 'Team member published. <a href="%s">View team member</a>', 'nice-team' ), array( 'a' => array( 'href' ) ) ),
				esc_url( get_permalink( $post->ID ) )
			),
			7  => esc_html__( 'Team member saved.', 'nice-team' ),
			8  => sprintf(
				wp_kses( __( 'Team member submitted. <a target="_blank" href="%s">Preview team member</a>', 'nice-team' ), array( 'a' => array( 'href', 'target' ) ) ),
				esc_url( add_query_arg( 'preview', 'true', get_permalink( $post->ID ) ) )
			),
			9  => sprintf(
				wp_kses( __( 'Team member scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview team member</a>', 'nice-team' ), array( 'a' => array( 'href', 'target' ), 'strong' => array() ) ),
				// translators: Publish box date format, see http://php.net/date
				date_i18n( esc_html__( 'M j, Y @ G:i', 'nice-team' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post->ID ) )
			),
			10 => sprintf( wp_kses( __( 'Team member draft updated. <a target="_blank" href="%s">Preview team member</a>', 'nice-team' ), array( 'a' => array( 'href' ) ) ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post->ID ) ) ) ),
		);
		$team_member_updated_messages = apply_filters(
			'nice_team_post_updated_messages',
			$team_member_updated_messages
		);

		$messages[ $post_type_name ] = $team_member_updated_messages;
	}

	return $messages;
}
endif;
