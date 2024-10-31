<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template closing wrapper.
 *
 * Override this template by copying it to `your-theme/team/global/wrapper-end.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

echo apply_filters( 'nice_team_wrapper_end', '</div></div>' ); // WPCS: XSS ok.
