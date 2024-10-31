<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the link to all the posts of the looped member inside a widget.
 *
 * Override this template by copying it to `your-theme/team/widgets/team-member/posts.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Obtain current member.
 */
$member = nice_team_obtain_member();
?>
	<?php if ( count_user_posts( $member->user->ID ) ) : ?>

		<span class="member-posts">
			<a href="<?php echo esc_url( get_author_posts_url( $member->user->ID ) ); ?>"><?php printf( esc_html__( 'See all posts by %s', 'nice-team' ), esc_html( $member->get_name() ) ); ?></a>
		</span>

	<?php endif; ?>
