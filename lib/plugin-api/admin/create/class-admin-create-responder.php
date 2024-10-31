<?php
/**
 * NiceThemes Plugin API
 *
 * @package Nice_Team_Plugin_API
 * @since   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Nice_Team_AdminCreateResponder
 *
 * This class takes charge of the interaction of created Nice_Team_Admin
 * instances with WordPress APIs.
 *
 * @since 1.0
 */
class Nice_Team_AdminCreateResponder extends Nice_Team_CreateResponder {
	/**
	 * Schedule interactions with other modules and WordPress APIs.
	 *
	 * @since 1.0
	 */
	protected function set_interactions() {
		/**
		 * Kill application if the plugin has installation errors.
		 */
		$this->wp_die_maybe();

		/**
		 * Process default functionality.
		 */
		parent::set_interactions();
	}

	/**
	 * Kill application if the plugin has installation errors.
	 *
	 * @since 1.0
	 */
	protected function wp_die_maybe() {
		$error_message = '';

		foreach ( $this->data->{'installation_errors'} as $key => $value ) {
			if ( $value ) {
				$error_message .= $this->get_error_message( $key );
			}
		}

		if ( $error_message ) {
			wp_die( $error_message ); // WPCS: XSS ok.
		}
	}

	/**
	 * Obtain error message for an installation issue.
	 *
	 * @param  string $key Error key.
	 *
	 * @return string
	 */
	protected static function get_error_message( $key ) {
		switch ( $key ) {
			case 'wp_version':
				$message = '<p>';
				$message .= sprintf( esc_html__( '%1$s requires WordPress %2$s or higher, and has been deactivated. Please upgrade WordPress and try again.', 'nice-team-plugin-textdomain' ), '<strong>' . nice_team_plugin_name() . '</strong>', nice_team_wp_required_version() );
				$message .= '</p><p>';
				$message .= sprintf( esc_html__( 'Back to %1$sWordPress Dashboard%2$s.', 'nice-team-plugin-textdomain' ), '<a href="' . admin_url() . '">', '</a>' );
				$message .= '</p>';
				break;
			case 'php_version':
				$message = '<p>';
				$message .= sprintf( esc_html__( '%1$s requires PHP %2$s or higher, and has been deactivated. Please contact your hosting provider about this issue.', 'nice-team-plugin-textdomain' ), '<strong>' . nice_team_plugin_name() . '</strong>', nice_team_php_required_version() );
				$message .= '</p><p>';
				$message .= sprintf( esc_html__( 'Back to %1$sWordPress Dashboard%2$s.', 'nice-team-plugin-textdomain' ), '<a href="' . admin_url() . '">', '</a>' );
				$message .= '</p>';
				break;
			case 'gd_installed':
				$message = '<p>';
				$message .= sprintf( esc_html__( '%s requires GD Library for PHP, which is not installed on your server. Please contact your hosting provider about this issue.', 'nice-team-plugin-textdomain' ), '<strong>' . nice_team_plugin_name() . '</strong>' );
				$message .= '</p><p>';
				$message .= sprintf( esc_html__( 'Back to %1$sWordPress Dashboard%2$s.', 'nice-team-plugin-textdomain' ), '<a href="' . admin_url() . '">', '</a>' );
				$message .= '</p>';
				break;
			default:
				$message = '';
				break;
		}

		return $message;
	}
}
