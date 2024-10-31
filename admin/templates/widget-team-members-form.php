<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for recent team widget form.
 *
 * @var Nice_Team_Members_Widget $widget
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Obtain widget instance.
 *
 * @var Nice_Team_Members_Widget $widget
 */
$widget = nice_team_admin_current_widget();
?>
<p>
	<label for="<?php echo esc_attr( $widget->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Widget Title (optional)', 'nice-team' ); ?></strong></label>
	<input class="widefat" id="<?php echo esc_attr( $widget->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $widget->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $widget->args['title'] ); ?>"/>
</p>
<p>
	<label for="<?php echo esc_attr( $widget->get_field_id( 'limit' ) ); ?>"><strong><?php esc_html_e( 'Number of Team Members to Show', 'nice-team' ); ?></strong></label>
	<input class="widefat" type="text" size="3" value="<?php echo esc_attr( $widget->args['limit'] ); ?>" name="<?php echo esc_attr( $widget->get_field_name( 'limit' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'limit' ) ); ?>">
</p>
<p>
	<strong><?php esc_html_e( 'Thumbnail Size:', 'nice-team' ); ?></strong><br />
	<label for="<?php echo esc_attr( $widget->get_field_id( 'thumbnail_width' ) ); ?>"><?php esc_html_e( 'Width:', 'nice-team' ); ?></label>
	<input type="text" size="3" value="<?php echo esc_attr( $widget->args['thumbnail_width'] ); ?>" name="<?php echo esc_attr( $widget->get_field_name( 'thumbnail_width' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'thumbnail_width' ) ); ?>">
	<label for="<?php echo esc_attr( $widget->get_field_id( 'thumbnail_height' ) ); ?>"><?php esc_html_e( 'Height:', 'nice-team' ); ?></label>
	<input type="text" size="3" value="<?php echo esc_attr( $widget->args['thumbnail_height'] ); ?>" name="<?php echo esc_attr( $widget->get_field_name( 'thumbnail_height' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'thumbnail_height' ) ); ?>">
</p>
<p>
	<label for="<?php echo esc_attr( $widget->get_field_id( 'orderby' ) ); ?>"><strong><?php esc_html_e( 'Order Team By', 'nice-team' ); ?></strong></label><br />
	<select name="<?php echo esc_attr( $widget->get_field_name( 'orderby' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'orderby' ) ); ?>">
		<option value="" disabled><?php esc_html_e( 'Select an option', 'nice-team' ); ?></option>
		<?php $orderby_options = array(
			'default'    => esc_html__( 'Specified Order Setting', 'nice-team' ),
			'ID'         => esc_html__( 'Team Member ID', 'nice-team' ),
			'title'      => esc_html__( 'Title', 'nice-team' ),
			'menu_order' => esc_html__( 'Menu Order', 'nice-team' ),
			'date'       => esc_html__( 'Date', 'nice-team' ),
			'random'     => esc_html__( 'Random Order', 'nice-team' ),
		); ?>
		<?php foreach ( $orderby_options as $value => $text ) : ?>
			<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $widget->args['orderby'] ) ?>><?php echo esc_html( $text ); ?></option>
		<?php endforeach; ?>
	</select>
</p>
<p>
	<label for="<?php echo esc_attr( $widget->get_field_id( 'order' ) ); ?>"><strong><?php esc_html_e( 'Sort Team By', 'nice-team' ); ?></strong></label><br />
	<select name="<?php echo esc_attr( $widget->get_field_name( 'order' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'order' ) ); ?>">
		<option value="" disabled><?php esc_html_e( 'Select an option', 'nice-team' ); ?></option>
		<?php $order_options = array(
			'default'     => esc_html__( 'Specified Sort Setting', 'nice-team' ),
			'asc'         => esc_html__( 'Ascending Order', 'nice-team' ),
			'desc'        => esc_html__( 'Descending Order', 'nice-team' ),
		); ?>
		<?php foreach ( $order_options as $value => $text ) : ?>
			<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $value, $widget->args['order'] ) ?>><?php echo esc_html( $text ); ?></option>
		<?php endforeach; ?>
	</select>
</p>

<fieldset class="nice-team-widget-display-fields-settings">
	<p>
		<strong><?php esc_html_e( 'Display Fields', 'nice-team' ); ?></strong><br />

		<input type="radio" onclick="jQuery( '#<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>_custom' ).hide();" class="use-default" name="<?php echo esc_attr( $widget->get_field_name( 'display_fields' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'display_fields' ) ); ?>[default]" value="default" <?php checked( 'default', $widget->args['display_fields'] ); ?>/>
		<label for="<?php echo esc_attr( $widget->get_field_id( 'display_fields' ) ); ?>[default]"><?php esc_html_e( 'Use specified field settings', 'nice-team' ); ?></label><br />

		<input type="radio" onclick="jQuery( '#<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>_custom' ).show();" name="<?php echo esc_attr( $widget->get_field_name( 'display_fields' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'display_fields' ) ); ?>[custom]" value="custom" <?php checked( 'custom', $widget->args['display_fields'] ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'display_fields' ) ); ?>[custom]"><?php esc_html_e( 'Use custom settings', 'nice-team' ); ?></label><br />
	</p>
</fieldset>
<fieldset id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>_custom" class="nice-team-widget-display-fields-custom" style="display: <?php echo ( 'custom' === $widget->args['display_fields'] ) ? 'block' : 'none'; ?>">
	<p>
		<strong><?php esc_html_e( 'Display These Fields:', 'nice-team' ); ?></strong><br />

		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[position]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[position]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[position]" value="1" class="checkbox" <?php checked( $widget->args['visible_data']['position'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[position]"><?php esc_html_e( 'Team Member Position', 'nice-team' ); ?></label><br />

		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[thumbnail]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[thumbnail]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[thumbnail]" value="1" class="checkbox" <?php checked( $widget->args['visible_data']['thumbnail'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[thumbnail]"><?php esc_html_e( 'Image', 'nice-team' ); ?></label><br />

		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[url]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[url]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[url]" class="checkbox" value="1" <?php checked( $widget->args['visible_data']['url'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[url]"><?php esc_html_e( 'Website', 'nice-team' ); ?></label><br />
		
		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[email]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[email]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[email]" class="checkbox" value="1" <?php checked( $widget->args['visible_data']['email'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[email]"><?php esc_html_e( 'Email', 'nice-team' ); ?></label><br />
		
		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[twitter]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[twitter]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[twitter]" class="checkbox" value="1" <?php checked( $widget->args['visible_data']['twitter'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[twitter]"><?php esc_html_e( 'Twitter', 'nice-team' ); ?></label><br />
		
		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[facebook]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[facebook]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[facebook]" class="checkbox" value="1" <?php checked( $widget->args['visible_data']['facebook'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[facebook]"><?php esc_html_e( 'Facebook', 'nice-team' ); ?></label><br />
		
		<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[linkedin]" value="0" />
		<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'visible_data' ) ); ?>[linkedin]" id="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[linkedin]" class="checkbox" value="1" <?php checked( $widget->args['visible_data']['linkedin'], '1' ); ?> />
		<label for="<?php echo esc_attr( $widget->get_field_id( 'visible_data' ) ); ?>[linkedin]"><?php esc_html_e( 'LinkedIn', 'nice-team' ); ?></label><br />
	</p>
</fieldset>
<p>
	<label for="<?php echo esc_attr( $widget->get_field_id( 'category' ) ); ?>"><strong><?php esc_html_e( 'Category', 'nice-team' ); ?></strong></label><br />
	<?php wp_dropdown_categories( array(
			'id'              => $widget->get_field_name( 'category' ),
			'name'            => $widget->get_field_name( 'category' ),
			'selected'        => $widget->args['category'],
			'taxonomy'        => 'team',
			'hide_empty'      => false,
			'show_option_all' => esc_html__( 'All Categories', 'nice-team' ),
	) ); ?>
	<br />

	<input type="hidden" name="<?php echo esc_attr( $widget->get_field_name( 'include_children' ) ); ?>" value="0" />
	<input type="checkbox" name="<?php echo esc_attr( $widget->get_field_name( 'include_children' ) ); ?>" id="<?php echo esc_attr( $widget->get_field_id( 'include_children' ) ); ?>" class="checkbox" <?php checked( $widget->args['include_children'], true ); ?> />
	<label for="<?php echo esc_attr( $widget->get_field_id( 'include_children' ) ); ?>"><?php esc_html_e( 'Include Children Categories', 'nice-team' ); ?></label><br />
</p>
<p>
	<label for="<?php echo esc_attr( $widget->get_field_id( 'id' ) ); ?>"><strong><?php esc_html_e( 'Specific ID (optional)', 'nice-team' ); ?></strong></label>
	<input class="widefat" id="<?php echo esc_attr( $widget->get_field_id( 'id' ) ); ?>" name="<?php echo esc_attr( $widget->get_field_name( 'id' ) ); ?>" type="text" value="<?php echo esc_attr( $widget->args['id'] ); ?>"/>
	<span class="description" style="padding-left: 0; padding-right: 0;"><?php esc_html_e( 'Display a specific team member instead of a list.', 'nice-team' ); ?></span>
</p>
