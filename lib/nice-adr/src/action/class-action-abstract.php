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
 * Class Nice_Team_ActionAbstract
 *
 * This class takes charge of the plugin activation process and the preparation
 * of the related responder.
 *
 * @package Nice_Team_ADR
 * @author  NiceThemes <hello@nicethemes.com>
 * @since   1.0
 */
abstract class Nice_Team_ActionAbstract implements Nice_Team_ActionInterface {
	/**
	 * @var   Nice_Team_ServiceInterface
	 * @since 1.0
	 */
	protected $domain;

	/**
	 * @var   Nice_Team_ResponderInterface
	 * @since 1.0
	 */
	protected $responder;

	/**
	 * Set up initial state of action.
	 *
	 * @since 1.0
	 *
	 * @param Nice_Team_ServiceInterface   $domain
	 * @param Nice_Team_ResponderInterface $responder
	 */
	public function __construct(
		Nice_Team_ServiceInterface $domain,
		Nice_Team_ResponderInterface $responder
	) {
		$this->domain    = $domain;
		$this->responder = $responder;
	}

	/**
	 * Create new Nice_Team_EntityInterface instance and fire responder.
	 *
	 * @since  1.0
	 *
	 * @param  array                          $data Data to create the new instance.
	 *
	 * @return Nice_Team_EntityInterface
	 */
	public function __invoke( array $data ) {}

	/**
	 * Prepare instance to be displayed or updated.
	 *
	 * @since  1.0
	 *
	 * @param  array $data Data to prepare the instance.
	 */
	public function prepare( array $data ) {}
}
