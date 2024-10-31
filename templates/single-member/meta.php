<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the attributes of a single member.
 *
 * Override this template by copying it to `your-theme/team/single-member/meta.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<div class="nice-team-member-meta">
		<?php
			/**
			 * @hook nice_team_single_member_meta
			 *
			 * Hook here to add or remove meta data for a single member.
			 *
			 * In case you need to display more data, you may want to check
			 * `nice_team_single_member_meta()` and hook into the
			 * `nice_team_single_member_meta_load_template` filter.
			 *
			 * @see nice_team_single_member_meta()
			 *
			 * Hooked here:
			 * @see nice_team_single_member_url()      - 10 (prints contents of templates/single-member/url.php)
			 * @see nice_team_single_member_email()    - 20 (prints contents of templates/single-member/email.php)
			 * @see nice_team_single_member_twitter()  - 30 (prints contents of templates/single-member/twitter.php)
			 * @see nice_team_single_member_facebook() - 40 (prints contents of templates/single-member/facebook.php)
			 * @see nice_team_single_member_linkedin() - 50 (prints contents of templates/single-member/linkedin.php)
			 * @see nice_team_single_member_posts()    - 60 (prints contents of templates/single-member/posts.php)
			 */
			do_action( 'nice_team_single_member_meta' );
		?>
	</div>
