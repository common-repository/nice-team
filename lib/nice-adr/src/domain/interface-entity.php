<?php
/**
 * NiceThemes ADR
 *
 * @package Nice_Team_ADR
 * @license GPL-2.0+
 * @since   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Interface Nice_Team_EntityInterface
 *
 * @package Nice_Team_ADR
 * @author  NiceThemes <hello@nicethemes.com>
 * @since   1.0
 */
interface Nice_Team_EntityInterface {
	/**
	 * Obtain the current value of a property.
	 *
	 * @since 1.0
	 *
	 * @param string $property Name of a property of this class.
	 */
	function __get( $property );

	/**
	 * Obtain current state of this instance.
	 *
	 * @since 1.0
	 *
	 * @param bool $array
	 */
	function get_info( $array );
}
