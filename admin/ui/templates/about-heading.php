<?php
/**
 * Nice Team by NiceThemes.
 *
 * About Page Header for Admin UI.
 *
 * @package Nice_Team_Admin_UI
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<div class="heading">
		<div class="masthead about">
			<h1><?php echo esc_html( nice_team_plugin_name() . ' ' . nice_team_plugin_version() ); ?></h1>
			<h2><?php esc_html_e( 'A great and powerful plugin to show information about your team members.', 'nice-team' ); ?></h2>
		</div>
	</div>
