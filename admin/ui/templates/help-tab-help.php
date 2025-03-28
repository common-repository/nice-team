<?php
/**
 * Nice Team by NiceThemes.
 *
 * Help and Support tab content.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<h3><?php esc_html_e( 'Help & Support', 'nice-team' ); ?></h3>

<p><?php printf( esc_html__( 'Before asking for help we recommend checking the %splugin documentation%s to identify any problems with your configuration.', 'nice-team' ), '<a href="https://nicethemes.com/documentation/team/" target="_blank">', '</a>' ); ?></p>

<p><?php printf( esc_html__( 'After reading the documentation, for further assistance you can use our %scommunity forum%s.', 'nice-team' ), '<a href="https://nicethemes.com/support/support-forum/" target="_blank">', '</a>' ); ?></p>

<p><strong><?php esc_html_e( 'Found a bug?', 'nice-team' ); ?></strong></p>

<p><?php esc_html_e( 'If you find a bug within this plugin, you can either report it in our forum or create a ticket via GitHub issues. Be as descriptive as possible and please tell us how to reproduce the issue step by step.', 'nice-team' ); ?></p>

<p><a class="button button-primary" href="http://github.com/nicethemes/nice-team/" target="_blank"><?php esc_html_e( 'Report bug in GitHub', 'nice-team' ); ?></a> <a class="button" href="https://nicethemes.com/support/support-forum/" target="_blank"><?php esc_html_e( 'Report bug in forum', 'nice-team' ); ?></a></p>
