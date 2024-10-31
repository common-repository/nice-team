<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the URL of the looped member inside a widget.
 *
 * Override this template by copying it to `your-theme/team/widgets/team-member/url.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( nice_team_get_member_twitter() ) : ?>

		<span class="member-twitter">
			<a href="https://twitter.com/<?php nice_team_member_twitter(); ?>" target="_blank">@<?php nice_team_member_twitter(); ?></a>
		</span>

	<?php endif; ?>
