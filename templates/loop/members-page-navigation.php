<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for page navigation.
 *
 * Override this template by copying it to `your-theme/team/loop/members-page-navigation.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<nav id="<?php nice_team_page_navigation_id(); ?>" class="nice-team-members-navigation">

		<h3 class="assistive-text"><?php esc_html_e( 'Members navigation', 'nice-team' ); ?></h3>

		<?php echo paginate_links(); // WPCS: XSS ok. ?>

	</nav>
