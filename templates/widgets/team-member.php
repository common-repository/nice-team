<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for Recent Members widget.
 *
 * @see     Nice_Team_Recent_Members_Widget
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>

<?php
	/**
	 * @hook nice_team_before_widget_recent_member_content
	 *
	 * All actions that print HTML before the contents of the current member
	 * should be hooked here.
	 *
	 * @since 1.0
	 */
	do_action( 'nice_team_before_widget_member_content' );
?>

<li <?php nice_team_member_class(); ?>>
	<?php
		/**
		 * @hook nice_team_widget_recent_member_content
		 *
		 * All actions that print HTML for the contents of the current member
		 * should be hooked here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see Nice_Team_Members_Widget::update_member()
		 */
		do_action( 'nice_team_widget_member_content' );
	?>
</li>

<?php
	/**
	 * @hook nice_team_after_widget_recent_member_content
	 *
	 * All actions that print HTML after the contents of the current member
	 * should be hooked here.
	 *
	 * @since 1.0
	 */
	do_action( 'nice_team_after_widget_member_content' );
?>
