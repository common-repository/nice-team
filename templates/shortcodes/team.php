<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the `team` shortcode.
 *
 * Override this template by copying it to `your-theme/team/shortcodes/team.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Obtain the current instance of the shortcode.
 */
$shortcode = nice_team_current_shortcode();

/**
 * Obtain arguments to create a loop of projects.
 *
 * @see Nice_Team_Shortcode::get_default_atts() For the complete list of accepted shortcode attributes.
 */
$atts = $shortcode->atts;
?>
	<?php
		/**
		 * Display Team grid using shortcode attributes.
		 *
		 * @since 1.0
		 */
		nice_team( array(
				'avoidcss'              => nice_team_bool( $atts['avoidcss'] ),
				'limit'                 => $atts['limit'],
				'columns'               => $atts['columns'],
				'orderby'               => $atts['orderby'],
				'order'                 => $atts['order'],
				'category'              => $atts['category'],
				'exclude_category'      => $atts['exclude_category'],
				'include_children'      => nice_team_bool( $atts['include_children'] ),
				'position'              => nice_team_bool( $atts['position'] ),
				'thumbnail'             => nice_team_bool( $atts['thumbnail'] ),
				'url'                   => nice_team_bool( $atts['url'] ),
				'email'                 => nice_team_bool( $atts['email'] ),
				'twitter'               => nice_team_bool( $atts['twitter'] ),
				'facebook'              => nice_team_bool( $atts['facebook'] ),
				'linkedin'              => nice_team_bool( $atts['linkedin'] ),
				'id'                    => $atts['id'],
				'display_empty_message' => nice_team_bool( $atts['display_empty_message'] ),
			)
		);
	?>
