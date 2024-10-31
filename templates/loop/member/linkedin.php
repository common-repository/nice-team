<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the URL of the looped member.
 *
 * Override this template by copying it to `your-theme/team/loop/member/url.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( nice_team_get_member_linkedin() ) : ?>

		<span class="member-linkedin">
			<a href="<?php nice_team_member_linkedin(); ?>" itemprop="email">LinkedIn</a>
		</span>

	<?php endif; ?>
