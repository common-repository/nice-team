<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the title of a team page.
 *
 * Override this template by copying it to `your-theme/team/global/title.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<header class="entry-header">
		<?php nice_team_the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
