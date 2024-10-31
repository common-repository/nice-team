<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the position of a single member.
 *
 * Override this template by copying it to `your-theme/team/single-member/position.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( nice_team_get_member_position() ) : ?>

		<div class="nice-team-member-data">

			<span class="member-position" itemprop="jobTitle"><?php nice_team_member_position(); ?></span>

		</div>

	<?php endif; ?>
