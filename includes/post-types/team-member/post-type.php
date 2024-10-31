<?php
/**
 * Nice Team by NiceThemes.
 *
 * Handle the `team_member` post type.
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

if ( ! function_exists( 'nice_team_get_post_type' ) ) :
add_filter( 'nice_team_post_type', 'nice_team_get_post_type' );
/**
 * Obtain values to construct the team custom post type.
 *
 * @since  1.0
 *
 * @return array
 */
function nice_team_get_post_type() {
	$post_type_name = nice_team_post_type_name();
	$settings       = nice_team_settings();

	$labels = array(
		'name'               => esc_html__( 'Team Members',                  'nice-team' ),
		'singular_name'      => esc_html__( 'Team Member',                   'nice-team' ),
		'menu_name'          => esc_html__( 'Team',                          'nice-team' ),
		'name_admin_bar'     => esc_html__( 'Team',                          'nice-team' ),
		'add_new'            => esc_html__( 'Add New',                       'nice-team' ),
		'add_new_item'       => esc_html__( 'Add New Team Member',           'nice-team' ),
		'edit_item'          => esc_html__( 'Edit Team Member',              'nice-team' ),
		'new_item'           => esc_html__( 'New Team Member',               'nice-team' ),
		'view_item'          => esc_html__( 'View Team Member',              'nice-team' ),
		'search_items'       => esc_html__( 'Search Team Member',            'nice-team' ),
		'not_found'          => esc_html__( 'No team member found',          'nice-team' ),
		'not_found_in_trash' => esc_html__( 'No team member found in trash', 'nice-team' ),
		'all_items'          => esc_html__( 'All Team Members',              'nice-team' ),
	);
	$labels = apply_filters( 'nice_team_post_type_labels', $labels );

	$args = array(
		'menu_icon'           => 'dashicons-groups',
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'exclude_from_search' => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 15,
		'can_export'          => true,
		'delete_with_user'    => false,
		'hierarchical'        => false,
		'has_archive'         => ! empty( $settings['rewrite_member_slug'] ) ? $settings['rewrite_member_slug'] : 'team-member',
		'query_var'           => $post_type_name,
		'capability_type'     => 'post',
		'map_meta_cap'        => true,
		'rewrite' => array(
			'slug'       => ! empty( $settings['rewrite_member_slug'] ) ? $settings['rewrite_member_slug'] : 'team-member',
			'with_front' => nice_team_bool( $settings['rewrite_with_front'] ),
			'pages'      => true,
			'feeds'      => true,
			'ep_mask'    => EP_PERMALINK,
		),
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'page-attributes',
		),
	);
	$args = apply_filters( 'nice_team_post_type_args', $args );

	$team_post_type = array(
		'name'            => $post_type_name,
		'labels'          => $labels,
		'args'            => $args,
		'dashicons_glyph' => '\\f307',
	);

	return $team_post_type;
}
endif;

if ( ! function_exists( 'nice_team_flush_rewrite_rules_maybe' ) ) :
add_filter( 'pre_update_option_nice_team_settings', 'nice_team_add_flush_rewrite_rules_flag', 100, 2 );
/**
 * Flush rewrite rules if post type slug changes.
 *
 * @since  1.0
 *
 * @param  mixed $value
 * @param  mixed $old_value
 *
 * @return mixed
 */
function nice_team_add_flush_rewrite_rules_flag( $value, $old_value ) {
	if ( $value !== $old_value ) {
		add_option( 'nice_team_flush_rewrite_rules', true );
	}

	return $value;
}
endif;

if ( ! function_exists( 'nice_team_flush_rewrite_rules_maybe' ) ) :
add_action( 'init', 'nice_team_flush_rewrite_rules_maybe', 0 );
/**
 * Flush rewrite rules if needed.
 *
 * @since 1.0
 */
function nice_team_flush_rewrite_rules_maybe() {
	if ( get_option( 'nice_team_flush_rewrite_rules' ) ) {
		flush_rewrite_rules();
		delete_option( 'nice_team_flush_rewrite_rules' );
	}
}
endif;

