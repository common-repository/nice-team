<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the title of a looped member.
 *
 * Override this template by copying it to `your-theme/team/loop/member/title.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( get_the_title() ) : ?>

		<div class="nice-team-member-data">
			<?php
				/**
				 * @hook nice_team_loop_before_member_title
				 *
				 * Hook here to print contents before the title is displayed.
				 *
				 * @since 1.0
				 */
				do_action( 'nice_team_loop_before_member_title' );
			?>

			<?php the_title( '<span class="member-name"><a href="' . get_the_permalink() . '">', '</a></span>' ); ?>

			<?php
				/**
				 * @hook nice_team_loop_after_member_title
				 *
				 * Hook here to print contents after the title was displayed.
				 *
				 * @since 1.0
				 *
				 * Hooked here:
				 * @see nice_team_loop_member_position() - 10 (prints contents of templates/loop/member/position.php)
				 */
				do_action( 'nice_team_loop_after_member_title' );
			?>
		</div>

	<?php endif; ?>
