<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for members navigation.
 *
 * Override this template by copying it to `your-theme/team/navigation/member-navigation.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Obtain navigation links.
 */
$next     = get_next_post_link( '%link' );
$previous = get_previous_post_link( '%link' );
?>
	<?php if ( $next or $previous ) : // Only print navigation if we have at least one link. ?>

		<section id="nice-team-member-navigation" class="member-navigation">

			<?php if ( $next ) : ?>
				<span class="member-navigation next-member-link"><?php echo $next; // WPCS: XSS ok. ?></span>
			<?php endif; ?>

			<?php if ( $previous ) : ?>
				<span class="member-navigation previous-member-link"><?php echo $previous; // WPCS: XSS ok. ?></span>
			<?php endif; ?>

		</section>

	<?php endif; ?>
