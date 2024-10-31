<?php
/**
 * Nice Team by NiceThemes.
 *
 * Opening wrapper for looped member.
 *
 * Override this template by copying it to `your-theme/team/loop/member/wrapper-start.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="nice-team-member-<?php the_ID(); ?>" <?php nice_team_member_class(); ?>>
