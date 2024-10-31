<?php
/**
 * Nice Team by NiceThemes.
 *
 * Opening wrapper before loop of members.
 *
 * Override this template by copying it to `your-theme/team/loop/main-wrapper-start.php`.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

$team = nice_team_obtain_instance();
$args = $team->args;
?>
<div <?php nice_team_class(); ?> data-columns="<?php nice_team_grid_columns(); ?>">
