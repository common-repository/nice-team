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
 * Class Nice_Team_UpdateActionAbstract
 *
 * This class takes charge of the update processes fired against the WordPress API.
 *
 * @package Nice_Team_ADR
 * @since   1.0
 */
abstract class Nice_Team_UpdateActionAbstract extends Nice_Team_ActionAbstract {
	/**
	 * Prepare a Nice_Team_EntityInterface instance to be updated.
	 *
	 * @since  1.0
	 *
	 * @param  array                          $data Data to create the new instance.
	 *
	 * @return Nice_Team_EntityInterface
	 */
	public function __invoke( array $data ) {
		$instance = $this->domain->get_updated( $data );
		$this->responder->__invoke( $instance );
	}
}
