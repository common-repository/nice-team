<?php
/**
 * Nice Team by NiceThemes.
 *
 * Register settings for Admin UI.
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

if ( ! function_exists( 'nice_team_admin_ui_add_settings' ) ) :
add_filter( 'nice_team_admin_ui_settings', 'nice_team_admin_ui_add_settings' );
/**
 * Create tabs.
 *
 * @since 1.0
 */
function nice_team_admin_ui_add_settings() {
	// Fields for General tab.
	$general_settings = array(
		'limit' => array(
			'id'          => 'limit',
			'title'       => esc_html__( 'Number of Team', 'nice-team' ),
			'description' => esc_html__( 'The number of members to be displayed. A value of 0 (zero) means no team members will display. Use -1 (minus one) to display unlimited team members.', 'nice-team' ) . ' ' . sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-team' ), '<code>limit</code>' ),
			'type'        => 'text-small',
			'priority'    => 10,
		),
		'columns' => array(
			'id'          => 'columns',
			'title'       => esc_html__( 'Number of Columns', 'nice-team' ),
			'description' => esc_html__( 'The number of columns to display the team members in.', 'nice-team' ) . ' ' . sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-team' ), '<code>columns</code>' ),
			'type'        => 'text-small',
			'priority'    => 20,
		),
		'visible_data' => array(
			'id'          => 'visible_data',
			'title'       => esc_html__( 'Visible Data', 'nice-team' ),
			'description' => esc_html__( 'Check which fields should be displayed for a team member.', 'nice-team' ),
			'type'        => 'checkbox-group',
			'options'     => array(
				'position'  => esc_html__( 'Position', 'nice-team' ),
				'thumbnail' => esc_html__( 'Image', 'nice-team' ),
				'url'       => esc_html__( 'Website', 'nice-team' ),
				'email'     => esc_html__( 'Email', 'nice-team' ),
				'twitter'   => esc_html__( 'Twitter Profile', 'nice-team' ),
				'facebook'  => esc_html__( 'Facebook Profile', 'nice-team' ),
				'linkedin'  => esc_html__( 'LinkedIn Profile', 'nice-team' ),
			),
			'priority'    => 40,
		),
		'orderby' => array(
			'id'          => 'orderby',
			'title'       => esc_html__( 'Order items by', 'nice-team' ),
			'description' => sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-team' ), '<code>orderby</code>' ),
			'type'        => 'select',
			'options'     => array(
				'ID'         => esc_html__( 'Team Member ID', 'nice-team' ),
				'title'      => esc_html__( 'Title', 'nice-team' ),
				'menu_order' => esc_html__( 'Menu Order', 'nice-team' ),
				'date'       => esc_html__( 'Date', 'nice-team' ),
				'random'     => esc_html__( 'Random Order', 'nice-team' ),
			),
			'placeholder' => esc_html__( 'Select an option', 'nice-team' ),
			'priority'    => 50,
		),
		'order' => array(
			'id'          => 'order',
			'title'       => esc_html__( 'Sort items by', 'nice-team' ),
			'description' => sprintf( esc_html__( 'You can override this setting in shortcodes using the %s property.', 'nice-team' ), '<code>order</code>' ),
			'type'        => 'select',
			'options'     => array(
				'asc'  => esc_html__( 'Ascending Order', 'nice-team' ),
				'desc' => esc_html__( 'Descending Order', 'nice-team' ),
			),
			'placeholder' => esc_html__( 'Select an option', 'nice-team' ),
			'priority'    => 60,
		),
		'include_children' => array(
			'id'          => 'include_children',
			'title'       => esc_html__( 'Include Children Categories', 'nice-team' ),
			'description' => esc_html__( 'Show children of parent categories.', 'nice-team' ),
			'type'        => 'checkbox',
			'priority'    => 70,
		),
		'avoidcss' => array(
			'id'          => 'avoidcss',
			'title'       => esc_html__( 'Avoid Plugin CSS', 'nice-team' ),
			'description' => esc_html__( 'Apply styles to team elements using your own CSS.', 'nice-team' ),
			'type'        => 'checkbox',
			'priority'    => 80,
		),
	);

	// Fields for Images tab.
	$images_settings = array(
		'archive_image_size' => array(
			'id'          => 'archive_image_size',
			'title'       => esc_html__( 'Archive Images', 'nice-team' ),
			'description' => esc_html__( 'Size of your member images in lists of projects.', 'nice-team' ),
			'type'        => 'image_size',
			'priority'    => 0,
		),
		'single_image_size' => array(
			'id'          => 'single_image_size',
			'title'       => esc_html__( 'Single Images', 'nice-team' ),
			'description' => esc_html__( 'Size of member image in member pages.', 'nice-team' ),
			'type'        => 'image_size',
			'priority'    => 10,
		),
	);

	// Fields for Advanced tab.
	$advanced_settings = array(
		'rewrite_member_slug' => array(
			'id'          => 'rewrite_member_slug',
			'title'       => esc_html__( 'Team Member Slug', 'nice-team' ),
			'description' => sprintf( esc_html__( 'Base name for permalinks to single pages for theme members. &mdash; i.e.: %s/team-member-slug/.', 'nice-team' ), get_site_url() ),
			'type'        => 'text',
			'priority'    => 0,
		),
		'rewrite_category_slug' => array(
			'id'          => 'rewrite_category_slug',
			'title'       => esc_html__( 'Team Slug', 'nice-team' ),
			'description' => sprintf( esc_html__( 'Base name for permalinks to team indexes. &mdash; i.e.: %s/team-slug/.', 'nice-team' ), get_site_url() ),
			'type'        => 'text',
			'priority'    => 10,
		),
		'rewrite_category_hierarchical' => array(
			'id'          => 'rewrite_category_hierarchical',
			'title'       => esc_html__( 'Hierarchical Team Permalinks', 'nice-team' ),
			'description' => esc_html__( 'Add parent slugs to show hierarchy in team permalinks.', 'nice-team' ),
			'type'        => 'checkbox',
			'priority'    => 20,
		),
		'rewrite_with_front' => array(
			'id'          => 'rewrite_with_front',
			'title'       => esc_html__( 'Custom Permalink Front', 'nice-team' ),
			'description' => esc_html__( 'Add the front part of a custom permalink structure (if being used) to single team member and team index permalinks', 'nice-team' ),
			'type'        => 'checkbox',
			'priority'    => 30,
		),
		'remove_data_on_deactivation' => array(
			'id'          => 'remove_data_on_deactivation',
			'title'       => esc_html__( 'Remove Data On Deactivation', 'nice-team' ),
			'description' => esc_html__( 'Delete all plugin settings once you deactivate it.', 'nice-team' ),
			'type'        => 'checkbox',
			'priority'    => 40,
		),
	);

	// Construct settings array.
	$settings = array(
		'general'  => array(
			'settings_section' => 'general-settings',
			'tab'              => 'general',
			'section'          => 'settings',
			'args'             => $general_settings,
		),
		'images'   => array(
			'settings_section' => 'images-settings',
			'tab'              => 'images',
			'section'          => 'settings',
			'args'             => $images_settings,
		),
		'advanced' => array(
			'settings_section' => 'advanced-settings',
			'tab'              => 'advanced',
			'section'          => 'settings',
			'args'             => $advanced_settings,
		),
	);

	return $settings;
}
endif;

if ( ! function_exists( 'nice_team_admin_ui_image_size' ) ) :
add_filter( 'nice_team_admin_ui_setting_field_image_size', 'nice_team_admin_ui_image_size', 10, 2 );
/**
 * Add new fields for image size.
 *
 * @since  1.0
 *
 * @param  string $output Original HTML contents.
 * @param  array  $args   List of arguments to construct the field.
 *
 * @return string
 */
function nice_team_admin_ui_image_size( $output, $args ) {
	$id = nice_team_settings_name() . '[' . $args['field']['id'] . ']';

	$defaults = array(
		'width'  => '',
		'height' => '',
		'crop'   => '',
	);
	$defaults = apply_filters( 'nice_team_image_admin_ui_size_defaults', $defaults );

	$value = wp_parse_args( $args['value'], $defaults );
	$value = apply_filters( 'nice_team_admin_ui_image_size_value', $value );

	ob_start();

	?>
	<label for="<?php echo esc_attr( $id ); ?>[width]"><?php esc_html_e( 'Width:', 'nice-team' ); ?></label>
	<input id="<?php echo esc_attr( $id ); ?>[width]" class="nice-text small-text" type="text" value="<?php echo esc_attr( $value['width'] ); ?>" name="<?php echo esc_attr( $id ); ?>[width]">
	<label for="<?php echo esc_attr( $id ); ?>[height]"><?php esc_html_e( 'Height:', 'nice-team' ); ?></label>
	<input id="<?php echo esc_attr( $id ); ?>[height]" class="nice-text small-text" type="text" value="<?php echo esc_attr( $value['height'] ); ?>" name="<?php echo esc_attr( $id ); ?>[height]">
	<label for="<?php echo esc_attr( $id ); ?>[crop]"> <?php esc_html_e( 'Crop:', 'nice-team' ); ?></label>
	<input type="hidden" value="0" name="<?php echo esc_attr( $id ); ?>[crop]">
	<input id="<?php echo esc_attr( $id ); ?>[crop]" class="nice-checkbox" type="checkbox" <?php checked( 1, $value['crop'] ); ?> value="1" name="<?php echo esc_attr( $id ); ?>[crop]">
	<p class="description">
		<?php echo esc_html( $args['field']['description'] ); ?>
	</p>
	<?php

	$output .= ob_get_contents();
	$output = apply_filters( 'nice_team_admin_ui_image_size', $output );

	ob_end_clean();

	return $output;
}
endif;
