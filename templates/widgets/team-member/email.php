<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the email of the looped member inside a widget.
 *
 * Override this template by copying it to `your-theme/team/widgets/team-member/email.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( nice_team_get_member_email() ) : ?>

		<span class="member-email">
			<a href="mailto:<?php nice_team_member_email(); ?>" itemprop="email"><?php nice_team_member_email(); ?></a>
		</span>

	<?php endif; ?>
