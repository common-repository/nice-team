<?php
/**
 * Nice Team by NiceThemes.
 *
 * Extra styles for Admin UI.
 *
 * @package   Nice_Team
 * @author    NiceThemes <hello@nicethemes.com>
 * @license   GPL-2.0+
 * @link      https://nicethemes.com/product/nice-team
 * @copyright 2016 NiceThemes
 * @since     1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! function_exists( 'nice_team_admin_ui_add_style' ) ) :
add_filter( 'nice_team_admin_ui_style_extra', 'nice_team_admin_ui_add_style' );
/**
 * Add custom CSS file to Admin UI.
 *
 * @since 1.0
 */
function nice_team_admin_ui_add_style() {
	return NICE_TEAM_ADMIN_ASSETS_URL . 'css/nice-team-admin-ui.css';
}
endif;
