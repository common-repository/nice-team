<?php
/**
 * Nice Team by NiceThemes.
 *
 * About page content for Admin UI.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

?>
	<?php if ( $ui instanceof Nice_Team_Admin_UI ) : ?>
		<div class="page-content full-width clearfix">

			<div class="content about-wrap">

				<div class="features box-container">

					<h2>Plugin Features</h2>

					<div class="description">
						<p>Nice Team displays information about your team
							members in a clean, responsive and beautiful way. You can show team
							members using a shortcode, widgets or template tags (PHP functions).</p>
					</div>

					<div class="box first">
						<h4>Comprehensive settings page</h4>

						<p>Define how your team are displayed without having to code with our intuitive
							settings page.</p>
					</div>

					<div class="box">
						<h4>Member information</h4>

						<p>Full details such as member image, position, website, teams and extensive contact information.</p>
					</div>

					<div class="box">
						<h4>Templating system</h4>

						<p>You can customize how your team members look even more by using your own
							template files instead of the default ones.</p>
					</div>

					<div class="box first">
						<h4>Shortcode</h4>

						<p>You can use the <code>[team]</code> shortcode to show your
							team anywhere you want.</p>
					</div>

					<div class="box">
						<h4>Template tag</h4>

						<p>Use our <code>nice_team()</code> PHP function to show team members anywhere you want.</p>
					</div>

					<div class="box">
						<h4>Widget</h4>

						<p>Display lists of team members using a widget instead of having them in
							the content of a page or post.</p>
					</div>

					<div class="box first">
						<h4>Mobile friendly</h4>

						<p>Nice Team includes a responsive layout, and gives you the
							possibility to define the number of columns you want to show.</p>
					</div>

					<div class="box">
						<h4>Theme compatibility</h4>

						<p>This plugin works right out of the box with any theme, but it looks even
							better with our <a href="https://nicethemes.com/themes/" target="_blank">premium themes</a>,
							so you may want to take a look at them :)</p>
					</div>
				</div>

				<div class="help box-container">
					<h2>Need Help?</h2>

					<div class="box first">

						<h4>Extensive documentation</h4>

						<p>If you have any doubt about how to configure any part of the plugin,
							you can read our
							<a href="https://nicethemes.com/documentation/team/" target="_blank">documentation page</a>
							to sort it out.
						</p>
					</div>

					<div class="box">

						<h4>Great support</h4>

						<p>We work hard to provide the best support we can. If you find a
							problem or have a question, you can post it in our
							<a href="https://nicethemes.com/support/support-forum/" target="_blank">support forums</a>.
						</p>
					</div>

					<div class="box">
						<h4>Developer friendly</h4>

						<p><strong>Nice Team</strong> is developed following the
							<a href="http://codex.wordpress.org/WordPress_Coding_Standards" target="_blank">WordPress Coding
								Standards</a> and includes a huge set of hooks, so you can customize it in any way you need.</p>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
