<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the URL of a single member.
 *
 * Override this template by copying it to `your-theme/team/single-member/url.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( nice_team_get_member_facebook() ) : ?>

		<span class="member-facebook">
			<a href="<?php nice_team_member_facebook(); ?>" target="_blank">Facebook</a>
		</span>

	<?php endif; ?>
