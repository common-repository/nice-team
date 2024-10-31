<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for all single team members.
 *
 * Override this template by copying it to `your-theme/team/single-member.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header( 'nice-team' ); ?>

	<?php
		/**
		 * @hook nice_team_before_main_content
		 *
		 * All actions that print HTML before the current page contents are
		 * displayed should be hooked here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see nice_team_wrapper_start() - 10 (prints the opening content wrapper)
		 */
		do_action( 'nice_team_before_main_content' );
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php nice_team_get_template( 'content-single-member.php' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * @hook nice_team_after_main_content
		 *
		 * All actions that print HTML after the current page contents are
		 * displayed should be hooked here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see nice_team_wrapper_end() - 10 (prints the closing content wrapper)
		 */
		do_action( 'nice_team_after_main_content' );
	?>

	<?php
		/**
		 * @hook nice_team_sidebar
		 *
		 * All actions that call a sidebar for the current page should be
		 * hooked here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see nice_team_sidebar() - 10
		 */
		do_action( 'nice_team_sidebar' );
	?>

<?php get_footer( 'nice-team' ); ?>
