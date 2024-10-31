<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for team category archive.
 *
 * Override this template by copying it to `your-theme/team/team-category.php`.
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

	<div class="hentry">

		<?php
			/**
			 * @hook nice_team_title
			 *
			 * All actions that add HTML to the title of the current page should be
			 * hooked here.
			 *
			 * @since 1.0
			 *
			 * Hooked here:
			 * @see nice_team_title() - 10 (prints out the title of the current page)
			 */
			do_action( 'nice_team_header' );
		?>

		<div class="entry-content">
			<?php
				/**
				 * @hook nice_team
				 *
				 * All actions that output HTML for the main content of the
				 * team category page should be hooked here, preferably
				 * through the`nice_team_category_page` hook instead of
				 * the global context.
				 *
				 * Hooked here:
				 * @see nice_team_category() - 10 (prints all published members in the current category)
				 *
				 * Hooked in:
				 * @see nice_team_setup_category_page()
				 *
				 * @since  1.0
				 */
				do_action( 'nice_team' );
			?>
		</div>

	</div>

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
		 * @see nice_team_loop_members_page_navigation() - 0 (prints previous/next page navigation)
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
