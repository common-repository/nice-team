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
 * Interface Nice_Team_ResponderInterface
 *
 * @package Nice_Team_ADR
 * @author  NiceThemes <hello@nicethemes.com>
 * @since   1.0
 */
interface Nice_Team_ResponderInterface {
	/**
	 * Fire main responder functionality.
	 *
	 * @since 1.0
	 *
	 * @param Nice_Team_EntityInterface $instance
	 */
	public function __invoke( Nice_Team_EntityInterface $instance );
}
