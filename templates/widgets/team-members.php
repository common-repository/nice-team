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

/**
 * Obtain widget instance.
 *
 * @var Nice_Team_Members_Widget $widget
 */
$widget = nice_team_current_widget();
?>

<?php
	/**
	 * @hook nice_team_before_widget_content
	 *
	 * All hooks that print contents before the widget contents are displayed
	 * should be hooked here.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_widget_wrapper_start()    - 10 (prints the opening HTML for the widget)
	 * @see Nice_Team_WP_Widget::widget_title() - 20 (prints the title of the widget)
	 */
	do_action( 'nice_team_before_widget_content', $widget );
?>

	<ul <?php nice_team_class(); ?>>

		<?php
			/**
			 * @hook nice_team_before_widget_members_loop
			 *
			 * All actions that print HTML before the loop of members run
			 * should be hooked here.
			 *
			 * @since 1.0
			 */
			do_action( 'nice_team_before_widget_members_loop', $widget );
		?>

		<?php while ( $widget->team->have_posts() ) : $widget->team->the_post(); ?>

			<?php nice_team_get_template_part( 'widgets/team-member' ); ?>

		<?php endwhile; ?>

		<?php
			/**
			 * @hook nice_team_after_widget_members_loop
			 *
			 * All actions that print HTML after the loop of members run
			 * should be hooked here.
			 *
			 * @since 1.0
			 */
			do_action( 'nice_team_after_widget_members_loop', $widget );
		?>

	</ul>

<?php
	/**
	 * @hook nice_team_after_widget_content
	 *
	 * All hooks that print contents before the widget contents are displayed
	 * should be hooked here.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_widget_wrapper_end() - 10 (prints the closing HTML for the widget)
	 */
	do_action( 'nice_team_after_widget_content', $widget );
?>
