<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains hooks to handle meta boxes for the admin-facing side of
 * the `team_member` post type.
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

if ( ! function_exists( 'nice_team_register_meta' ) ) :
add_action( 'nice_team_admin_loaded', 'nice_team_register_meta' );
/**
 * Register post meta fields.
 *
 * @since 1.0
 */
function nice_team_register_meta() {
	register_meta( 'post', '_team_member_url',      'esc_url_raw',         '__return_true' );
	register_meta( 'post', '_team_member_gravatar', 'sanitize_text_field', '__return_true' );
	register_meta( 'post', '_team_member_email',    'sanitize_text_field', '__return_true' );
	register_meta( 'post', '_team_member_twitter',  'sanitize_text_field', '__return_true' );
	register_meta( 'post', '_team_member_facebook', 'esc_url_raw',         '__return_true' );
	register_meta( 'post', '_team_member_linkedin', 'esc_url_raw',         '__return_true' );
	register_meta( 'post', '_team_member_position', 'sanitize_text_field', '__return_true' );
	register_meta( 'post', '_team_member_username', 'sanitize_text_field', '__return_true' );
}
endif;

if ( ! function_exists( 'nice_team_create_metabox_info' ) ) :
add_filter( 'nice_team_metaboxes', 'nice_team_create_metabox_info' );
/**
 * Create a metabox for our custom post type.
 *
 * @since 1.0
 *
 * @param  array $metaboxes List of current metaboxes.
 *
 * @return array
 */
function nice_team_create_metabox_info( array $metaboxes = array() ) {
	$post_type_name = nice_team_post_type_name();

	// Define post types.
	$post_types = array( $post_type_name );
	$post_types = apply_filters( 'nice_team_member_metabox_info_post_types', $post_types );

	// Define byline.
	$position = array(
		'type'  => 'text',
		'label' => esc_html__( 'Position', 'nice-team' ),
		'name'  => '_team_member_position',
		'desc'  => esc_html__( 'Enter here the team member\'s position.', 'nice-team' ),
	);
	$position = apply_filters( 'nice_team_member_metabox_position', $position );

	// Define team member URL.
	$url = array(
		'type'  => 'text',
		'label' => esc_html__( 'Website', 'nice-team' ),
		'name'  => '_team_member_url',
		'desc'  => esc_html__( 'Link to the team member\'s website.', 'nice-team' ),
	);
	$url = apply_filters( 'nice_team_member_metabox_url', $url );

	// Define team member email.
	$email = array(
		'type'  => 'text',
		'label' => esc_html__( 'Email', 'nice-team' ),
		'name'  => '_team_member_email',
		'desc'  => esc_html__( 'Enter here the team member\'s email.', 'nice-team' ),
	);
	$email = apply_filters( 'nice_team_member_metabox_email', $email );

	// Define team member email for Gravatar.
	$gravatar = array(
		'type'  => 'text',
		'label' => esc_html__( 'Gravatar Email', 'nice-team' ),
		'name'  => '_team_member_gravatar',
		'desc'  => esc_html__( 'Email address to show the team member\'s avatar from Gravatar. This setting will not be used if you entered a custom team member\'s image.', 'nice-team' ),
	);
	$gravatar = apply_filters( 'nice_team_member_metabox_gravatar', $gravatar );

	// Define team member Twitter username.
	$twitter = array(
		'type'  => 'text',
		'label' => esc_html__( 'Twitter', 'nice-team' ),
		'name'  => '_team_member_twitter',
		'desc'  => esc_html__( 'Enter the team member\'s Twitter username (without @).', 'nice-team' ),
	);
	$twitter = apply_filters( 'nice_team_member_metabox_twitter', $twitter );

	// Define team member Facebook URL.
	$facebook = array(
		'type'  => 'text',
		'label' => esc_html__( 'Facebook', 'nice-team' ),
		'name'  => '_team_member_facebook',
		'desc'  => esc_html__( 'Enter the team member\'s Facebook URL.', 'nice-team' ),
	);
	$facebook = apply_filters( 'nice_team_member_metabox_facebook', $facebook );

	// Define team member LinkedIn URL.
	$linkedin = array(
		'type'  => 'text',
		'label' => esc_html__( 'LinkedIn', 'nice-team' ),
		'name'  => '_team_member_linkedin',
		'desc'  => esc_html__( 'Enter the team member\'s LinkedIn URL.', 'nice-team' ),
	);
	$linkedin = apply_filters( 'nice_team_member_metabox_facebook', $linkedin );

	if ( nice_team_sync_member_with_user() ) {
		// Define team member username.
		$username = array(
			'type'  => 'text',
			'label' => esc_html__( 'User Name', 'nice-team' ),
			'name'  => '_team_member_username',
			'desc'  => esc_html__( 'The name of the user associated to this team member. If present, the member\'s description will be retrieved from the user\'s profile. Also, if you have not entered a custom image or a Gravatar Email, the featured image will be used as the member\'s image.', 'nice-team' ),
		);
		$username = apply_filters( 'nice_team_member_metabox_username', $username );
	}

	// Group all fields.
	$fields = array(
		$position,
		$url,
		$email,
		$gravatar,
		$twitter,
		$facebook,
		$linkedin,
	);

	if ( nice_team_sync_member_with_user() ) {
		$fields[] = $username;
	}

	$fields = apply_filters( 'nice_team_member_metabox_info_fields', $fields );

	// Define meta box settings.
	$settings = array(
		'title' => esc_html__( 'Team Member Details', 'nice-team' ),
	);
	$settings = apply_filters( 'nice_team_member_metabox_info_settings', $settings );

	// Prepare arguments.
	$args = array(
		'id'         => 'nice-team-member-details',
		'post_types' => $post_types,
		'fields'     => $fields,
		'settings'   => $settings,
	);

	$metaboxes[] = apply_filters( 'nice_team_member_metabox_info_args', $args );

	return $metaboxes;
}
endif;

if ( ! function_exists( 'nice_team_post_title_placeholder_text' ) ) :
add_filter( 'enter_title_here', 'nice_team_post_title_placeholder_text', 20 );
/**
 * Modify the default placeholder for team in the editor.
 *
 * @param $title
 *
 * @return string|void
 */
function nice_team_post_title_placeholder_text( $title ) {
	$screen = get_current_screen();

	if ( nice_team_post_type_name() === $screen->post_type ) {
		$title = esc_html__( 'Enter the name of the team member here', 'nice-team' );
	}

	return $title;
}
endif;

if ( ! function_exists( 'nice_team_thumbnail_meta_box_html_title' ) ) :
add_action( 'add_meta_boxes', 'nice_team_thumbnail_meta_box_html_title' );
/**
 * Modify the title of the Featured Image meta box.
 *
 * @since  1.0
 */
function nice_team_thumbnail_meta_box_html_title() {
	global $wp_meta_boxes;

	$wp_meta_boxes[ nice_team_post_type_name() ]['side']['low']['postimagediv']['title'] = esc_html__( 'Team member\'s image', 'nice-team' );
}
endif;

if ( ! function_exists( 'nice_team_thumbnail_meta_box_html' ) ) :
add_filter( 'admin_post_thumbnail_html', 'nice_team_thumbnail_meta_box_html' );
/**
 * Modify the output of the Featured Image meta box.
 *
 * @since  1.0
 *
 * @param  string      $content
 * @return string|void
 */
function nice_team_thumbnail_meta_box_html( $content ) {
	global $typenow;

	$post_type      = $typenow;
	$post_type_name = nice_team_post_type_name();

	$post_id = isset( $_POST['id'] ) ? intval( $_POST['id'] ) : 0; // WPCS: CSRF ok.

	if ( ! $post_type ) {
		$post = ( $p = get_post() ) ? $p : get_post( $post_id );
		$post_type = $post->post_type;
	}

	if ( $post_type_name === $post_type ) {
		$content = str_replace(
			esc_html__( 'Set featured image', 'nice-team' ),
			esc_html__( 'Set team member\'s image', 'nice-team' ),
			$content
		);

		$content = str_replace(
			esc_html__( 'Remove featured image', 'nice-team' ),
			esc_html__( 'Remove team member\'s image', 'nice-team' ),
			$content
		);
	}
	$content = apply_filters( 'nice_team_thumbnail_meta_box_html', $content );

	return $content;
}
endif;

if ( ! function_exists( 'nice_team_media_view_strings' ) ) :
add_filter( 'media_view_strings', 'nice_team_media_view_strings' );
/**
 * Modify strings for media uploader localization.
 *
 * @since  1.0.0
 *
 * @param  array $strings List of localized strings.
 *
 * @return array
 */
function nice_team_media_view_strings( array $strings = array() ) {
	global $typenow;

	$post_type      = $typenow;
	$post_type_name = nice_team_post_type_name();

	$post_id = isset( $_POST['post_id'] ) ? intval( $_POST['post_id'] ) : 0; // WPCS: CSRF ok.

	if ( ! $post_type ) {
		$post = ( $p = get_post() ) ? $p : get_post( $post_id );

		if ( ! $post ) {
			return $strings;
		}

		$post_type = $post->post_type;
	}

	if ( $post_type_name === $post_type ) {
		$strings = array_merge( $strings, array(
				'setFeaturedImage'      => esc_html__( 'Set Team Member\'s Image', 'nice-team' ),
				'setFeaturedImageTitle' => esc_html__( 'Set Team Member\'s Image', 'nice-team' ),
			)
		);
	}

	return $strings;
}
endif;
