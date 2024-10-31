<?php
/**
 * Nice Team by NiceThemes.
 *
 * General Settings tab content.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<h3><?php esc_html_e( 'General Settings', 'nice-team' ); ?></h3>

<p><?php esc_html_e( 'Configure how your team members will be displayed by default. The options presented here can be overridden in a shortcode basis. You can set the number of team members to display by default, change the size of the images, select the information you want to show, etc.', 'nice-team' ); ?></p>

<p><?php printf( esc_html__( 'This screen provides the most basic settings for configuring the plugin. If you need further support, please consider checking the %sdocumentation%s or %sreporting a bug%s.', 'nice-team' ), '<a href="https://nicethemes.com/documentation/team/" target="_blank">', '</a>', '<a href="https://nicethemes.com/support/support-forum/" target="_blank">', '</a>' ); ?></p>
