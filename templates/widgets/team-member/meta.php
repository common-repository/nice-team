<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the meta data of a looped member inside a widget.
 *
 * Override this template by copying it to `your-theme/team/widget/team-member/meta.php`.
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
			 * @hook nice_team_widget_member_meta
			 *
			 * Hook here to add or remove meta data for a looped member.
			 *
			 * In case you need to display more data, you may want to check
			 * `Nice_Team_Members_Widget::member_meta()` and hook into the
			 * `nice_team_widget_member_meta_load_template` filter.
			 *
			 * @see Nice_Team_Members_Widget::member_meta()
			 *
			 * Hooked here:
			 * @see Nice_Team_Members_Widget::member_url()      - 10 (prints contents of templates/widgets/team-member/url.php)
			 * @see Nice_Team_Members_Widget::member_email()    - 20 (prints contents of templates/widgets/team-member/email.php)
			 * @see Nice_Team_Members_Widget::member_twitter()  - 30 (prints contents of templates/widgets/team-member/twitter.php)
			 * @see Nice_Team_Members_Widget::member_facebook() - 40 (prints contents of templates/widgets/team-member/facebook.php)
			 * @see Nice_Team_Members_Widget::member_linkedin() - 50 (prints contents of templates/widgets/team-member/linkedin.php)
			 * @see Nice_Team_Members_Widget::member_posts()    - 60 (prints contents of templates/widgets/team-member/posts.php)
			 */
			do_action( 'nice_team_widget_member_meta' );
		?>
	</div>
