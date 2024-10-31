<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the thumbnail of a looped member inside a widget.
 *
 * Override this template by copying it to `your-theme/team/widget/team-member/featured-image.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<?php if ( nice_team_get_member_thumbnail() ) : ?>

		<figure class="nice-team-member-featured-image">
			<a class="thumbnail" href="<?php the_permalink(); ?>">
				<?php
					/**
					 * Print out the member's thumbnail.
					 *
					 * By default, the image will be a square. The value that
					 * you entered in the "Image Size" option of the widget
					 * will be used for both the width and the height of the
					 * image.
					 *
					 * If you want to use different dimensions for your image,
					 * just override this template and call
					 * `nice_team_member_thumbnail()` this way:
					 *
					 * <?php
					 *      nice_team_member_thumbnail( get_the_ID(), array(
									300, // Or your custom width in pixels.
									300, // Or your custom height in pixels.
					 *          )
					 *      );
					 * ?>
					 */
					nice_team_member_thumbnail();
				?>
			</a>
		</figure>

	<?php endif; ?>
