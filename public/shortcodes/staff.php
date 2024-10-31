<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file handles shortcode functionality.
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

if ( ! function_exists( 'nice_team_shortcode' ) ) :
/**
 * Process HTML for the `team` shortcode.
 *
 * @since  1.0
 *
 * @param  array  $atts
 * @param  string $content
 * @param  string $tag
 *
 * @return string
 */
function nice_team_shortcode( $atts = array(), $content = '', $tag ) {
	$atts = is_array( $atts ) ? $atts : array();
	$shortcode = new Nice_Team_Shortcode( $atts, $content, $tag );
	return $shortcode->output;
}
endif;

if ( ! shortcode_exists( 'team' ) ) :
/**
 * Register `team` shortcode.
 *
 * @since 1.0
 */
add_shortcode( 'team', 'nice_team_shortcode' );
endif;
