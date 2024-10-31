<?php
/**
 * Nice Team by NiceThemes.
 *
 * Closing wrapper for widgets.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * @hook nice_team_widget_wrapper_end
 *
 * Hook here to modify the closing wrapper of the widget.
 *
 * @since 1.0
 */
echo apply_filters( 'nice_team_widget_wrapper_end', '</div></aside>' ); // WPCS: XSS ok.
