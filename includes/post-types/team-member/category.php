<?php
/**
 * Nice Team by NiceThemes.
 *
 * Handle the `team_category` taxonomy.
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

if ( ! function_exists( 'nice_team_get_category' ) ) :
add_filter( 'nice_team_category', 'nice_team_get_category' );
/**
 * Obtain values to construct the category for team post type.
 *
 * This method is meant to ensure compatibility with content type standards.
 * {link https://github.com/justintadlock/content-type-standards}
 *
 * @since  1.0
 *
 * @return array
 */
function nice_team_get_category() {
	$category_name = nice_team_category_name();
	$settings      = nice_team_settings();

	$labels = array(
		'name'                       => esc_html__( 'Teams',         'nice-team' ),
		'singular_name'              => esc_html__( 'Team',          'nice-team' ),
		'menu_name'                  => esc_html__( 'Teams',         'nice-team' ),
		'name_admin_bar'             => esc_html__( 'Team',          'nice-team' ),
		'search_items'               => esc_html__( 'Search Teams',  'nice-team' ),
		'popular_items'              => esc_html__( 'Popular Teams', 'nice-team' ),
		'all_items'                  => esc_html__( 'All Teams',     'nice-team' ),
		'edit_item'                  => esc_html__( 'Edit Team',     'nice-team' ),
		'view_item'                  => esc_html__( 'View Team',     'nice-team' ),
		'update_item'                => esc_html__( 'Update Team',   'nice-team' ),
		'add_new_item'               => esc_html__( 'Add New Team',  'nice-team' ),
		'new_item_name'              => esc_html__( 'New Team Name', 'nice-team' ),
		'parent_item'                => esc_html__( 'Parent Team',   'nice-team' ),
		'parent_item_colon'          => esc_html__( 'Parent Team:',  'nice-team' ),
		'separate_items_with_commas' => null,
		'add_or_remove_items'        => null,
		'choose_from_most_used'      => null,
		'not_found'                  => null,
	);
	$labels = apply_filters( 'nice_team_category_labels', $labels );

	$args = array(
		'public'            => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'query_var'         => $category_name,
		'rewrite' => array(
			'slug'         => ! empty( $settings['rewrite_category_slug'] ) ? $settings['rewrite_category_slug'] : 'team',
			'with_front'   => nice_team_bool( $settings['rewrite_with_front'] ),
			'hierarchical' => nice_team_bool( $settings['rewrite_category_hierarchical'] ),
			'ep_mask'      => EP_NONE,
		),
	);
	$args = apply_filters( 'nice_team_category_args', $args );

	$team_category = array(
		'name'   => $category_name,
		'labels' => $labels,
		'args'   => $args,
	);

	return $team_category;
}
endif;
