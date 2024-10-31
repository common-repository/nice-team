<?php
/**
 * Nice Team by NiceThemes.
 *
 * Content for single team member.
 *
 * Override this template by copying it to `your-theme/team/content-single-member.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$settings = nice_team_settings();
?>

<?php
	/**
	 * @hook nice_team_before_single_member
	 *
	 * All actions that print HTML before the single member is displayed
	 * should be hooked here.
	 *
	 * @since 1.0
	 */
	do_action( 'nice_team_before_single_member' );
?>

<div id="nice-team-member-<?php the_ID(); ?>" <?php nice_team_member_class(); ?>>

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

	<?php
		/**
		 * @hook nice_team_before_single_member_content
		 *
		 * All actions that print HTML before the contents of the single member
		 * should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_before_single_member_content' );
	?>

	<div class="entry-content nice-team-member">
		<?php
			if ( post_password_required() ) :
				echo get_the_password_form();
			else :
				/**
				 * @hook  nice_team_single_member_content
				 *
				 * All actions that print HTML for the main contents of the
				 * single member should be hooked here.
				 *
				 * @since 1.0
				 *
				 * Hooked here:
				 * @see nice_team_single_member_position()    - 10 (prints the position of the current member)
				 * @see nice_team_single_member_description() - 20 (prints the description of the current member)
				 * @see nice_team_single_member_meta() -        30 (prints the attributes of the current member)
				 */
				do_action( 'nice_team_single_member_content' );
			endif;
		?>
	</div><!-- .entry-content -->

	<?php
		/**
		 * @hook nice_team_after_single_member_content
		 *
		 * All actions that print HTML after the contents of the single member
		 * should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_after_single_member_content' );
	?>

</div><!-- #nice-team-member-<?php the_ID(); ?> -->

<?php
	/**
	 * @hook nice_team_after_single_member
	 *
	 * All actions that print HTML after the single member was displayed
	 * should be hooked here.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_single_member_navigation() - 10 (prints previous/next member navigation)
	 */
	do_action( 'nice_team_after_single_member' );
?>
