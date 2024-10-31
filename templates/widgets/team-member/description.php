<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the description of a looped member inside a widget.
 *
 * Override this template by copying it to `your-theme/team/widget/team-member/description.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<div class="nice-team-member-excerpt">

		<?php
			/**
			 * Print team member excerpt.
			 */
			the_excerpt();
		?>

	</div>
