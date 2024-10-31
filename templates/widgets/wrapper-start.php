<?php
/**
 * Nice Team by NiceThemes.
 *
 * Opening wrapper for widgets.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * @hook nice_team_widget_wrapper_start
 *
 * Hook here to modify the opening wrapper of the widget.
 *
 * @since 1.0
 */
echo apply_filters( 'nice_team_widget_wrapper_start', '<aside class="widget nice-team-widget"><div class="nice-team-widget-box">' ); // WPCS: XSS ok.
