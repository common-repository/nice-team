<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template starting wrapper.
 *
 * Override this template by copying it to `your-theme/team/global/wrapper-start.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

echo apply_filters( 'nice_team_wrapper_start', '<div id="container"><div id="content" class="nice-team-content" role="main">' ); // WPCS: XSS ok.
