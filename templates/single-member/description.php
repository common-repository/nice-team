<?php
/**
 * Nice Team by NiceThemes.
 *
 * Template for the description of a single member.
 *
 * Override this template by copying it to `your-theme/team/single-member/description.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
	<div class="nice-team-member-content">

		<?php if ( nice_team_get_member_thumbnail() ) : ?>

			<div class="nice-team-member-featured-image featured-image">

				<a class="thumbnail" href="<?php the_permalink(); ?>">
					<?php
						/**
						 * Print out the member's thumbnail.
						 *
						 * By default, the image will be a square. The value that
						 * you entered in the "Image Size" option of the plugin
						 * settings will be used for both the width and the
						 * height of the image.
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

			</div>

		<?php endif; ?>

		<?php if ( nice_team_get_member_description() ) : ?>

			<?php
				/**
				 * Print team member description.
				 *
				 * If a registered user matches the current team member, and
				 * that user's bio is not empty, the user's bio will be printed.
				 * Otherwise, we'll print the content of the post.
				 */
				nice_team_member_description();
			?>

		<?php endif; ?>

	</div>
