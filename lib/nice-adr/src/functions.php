<?php
/**
 * NiceThemes ADR
 *
 * This file contains general helper functions that allow deeper-level
 * interactions with the Plugin API in an easier way.
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
 * Make a request for an action and obtain a response.
 *
 * @uses   nice_team_action()
 * @uses   Nice_Team_ActionInterface::__invoke()
 *
 * @since  1.0
 *
 * @param  string $domain Name of the class to get a new instance from.
 * @param  string $action Name of the action to execute.
 * @param  array  $data   Information for requested instance properties.
 *
 * @return Nice_Team_EntityInterface
 */
function nice_team_request( $domain, $action, array $data = array() ) {
	if ( ! class_exists( $domain ) ) {
		return null;
	}

	/**
	 * Initialize action instance.
	 */
	$action = nice_team_action( $domain, $action );

	/**
	 * Set domain as part of data.
	 */
	$data['classname'] = $domain;

	if ( method_exists( $action, '__invoke' ) ) {
		return $action->__invoke( $data );
	}

	return null;
}

/**
 * Obtain a requested instance factory.
 *
 * @uses   nice_team_get_instance_maybe()
 *
 * @since  1.0
 *
 * @param  string                      $domain Name of the class to get a new factory instance from.
 *
 * @return Nice_Team_FactoryInterface
 */
function nice_team_factory( $domain ) {
	$classname = nice_team_factory_classname( $domain );

	return nice_team_get_instance_maybe( $classname );
}

/**
 * Obtain the name of a factory class.
 *
 * @since  1.0
 *
 * @param  string $domain Name of the domain of the factory.
 *
 * @return string
 */
function nice_team_factory_classname( $domain ) {
	// List possible classes.
	$classnames = array(
		$domain . 'Factory'      => true,
		'Nice_Team_Factory' => true,
	);

	foreach ( $classnames as $classname => $validate ) {
		if ( class_exists( $classname ) && $validate ) {
			return $classname;
		}
	}

	return null;
}

/**
 * Obtain a requested service.
 *
 * @uses   nice_team_get_instance_maybe()
 * @uses   nice_team_factory()
 *
 * @since  1.0
 *
 * @param  string                          $domain Name of the class to get a new service instance from.
 *
 * @return Nice_Team_ServiceInterface
 */
function nice_team_service( $domain ) {
	$classname = nice_team_service_classname( $domain );

	return nice_team_get_instance_maybe( $classname, array(
			'factory' => nice_team_factory( $domain ),
		)
	);
}

/**
 * Obtain the name of a service class.
 *
 * @since  1.0
 *
 * @param  string $domain Name of the domain of the action.
 *
 * @return string
 */
function nice_team_service_classname( $domain ) {
	// List possible classes.
	$classnames = array(
		$domain . 'Service',
		'Nice_Team_Service',
	);

	foreach ( $classnames as $classname ) {
		if ( class_exists( $classname ) ) {
			return $classname;
		}
	}

	return null;
}

/**
 * Obtain a requested responder.
 *
 * @uses   nice_team_get_instance_maybe()
 *
 * @since  1.0
 *
 * @param  string                          $domain Name of the domain to get a new responder instance from.
 * @param  string                          $action Name of the action to be processed.
 *
 * @return Nice_Team_ResponderInterface
 */
function nice_team_responder( $domain, $action ) {
	$classname = nice_team_responder_classname( $domain, $action );

	return nice_team_get_instance_maybe( $classname );
}

/**
 * Obtain the name of a responder class.
 *
 * @since  1.0
 *
 * @param  string $domain Name of the domain of the action.
 * @param  string $action Name of the action.
 *
 * @return string
 */
function nice_team_responder_classname( $domain, $action ) {
	// Uppercase name of action.
	$action = ucfirst( $action );

	// List possible classes.
	$classnames = array(
		$domain . $action . 'Responder'                    => true,
		'Nice_Team_' . $action . 'Responder'   => true,
	);

	foreach ( $classnames as $classname => $validate ) {
		if ( class_exists( $classname ) && $validate ) {
			return $classname;
		}
	}

	return null;
}

/**
 * Obtain a requested action.
 *
 * @uses   nice_team_get_instance_maybe()
 * @uses   nice_team_service()
 * @uses   nice_team_responder()
 *
 * @since  1.0
 *
 * @param  string                     $domain Name of the class to get a new service instance from.
 * @param  string                     $action Name of the action to be processed.
 *
 * @return Nice_Team_ActionInterface
 */
function nice_team_action( $domain, $action ) {
	$classname = nice_team_action_classname( $domain, $action );

	return nice_team_get_instance_maybe( $classname, array(
		'domain'    => nice_team_service( $domain ),
		'responder' => nice_team_responder( $domain, $action ),
	) );
}

/**
 * Obtain the name of an action class.
 *
 * @since  1.0
 *
 * @param  string $domain Name of the domain of the action.
 * @param  string $action Name of the action.
 *
 * @return string
 */
function nice_team_action_classname( $domain, $action ) {
	// Uppercase name of action.
	$action = ucfirst( $action );

	// List possible classes.
	$classnames = array(
		$domain . $action . 'Action'                    => true,
		'Nice_Team_' . $action . 'Action'   => true,
	);

	foreach ( $classnames as $classname => $validate ) {
		if ( class_exists( $classname ) && $validate ) {
			return $classname;
		}
	}

	wp_die( sprintf( esc_html__( '%s action does not exist. You need to create it in order to proceed.', 'nice-team-plugin-textdomain' ), esc_html( $action ) ) );

	return null;
}

/**
 * Obtain an initialized object of a given class name, whether is a singleton
 * or not.
 *
 * @uses  Nice_Team_SingletonEntity::get_instance()
 * @uses  ReflectionClass::newInstanceArgs()
 *
 * @since 1.0
 *
 * @param  string                     $classname Name of the class to get an object from.
 * @param  array                      $data      Information to construct the object.
 *
 * @return Nice_Team_EntityInterface
 */
function nice_team_get_instance_maybe( $classname, array $data = array() ) {
	if ( method_exists( $classname, 'get_instance' ) && is_callable( array( $classname, 'get_instance' ) ) ) {
		return $classname::get_instance( $data );
	}

	if ( empty( $data ) ) {
		return new $classname;
	}

	$reflect  = new ReflectionClass( $classname );
	$instance = $reflect->newInstanceArgs( $data );

	return $instance;
}

/**
 * Create a new instance of the given class.
 *
 * @uses   nice_team_request()
 *
 * @since  1.0
 *
 * @param  string                     $classname Name of the new object's class.
 * @param  array                      $data      Information to create the new instance.
 *
 * @return Nice_Team_EntityInterface
 */
function nice_team_create( $classname, array $data ) {
	return nice_team_request( $classname, 'create', $data );
}

/**
 * Setup an instance to be displayed.
 *
 * @uses  nice_team_request()
 *
 * @since 1.0
 *
 * @param Nice_Team_EntityInterface $instance
 */
function nice_team_display( Nice_Team_EntityInterface $instance ) {
	nice_team_request( get_class( $instance ), 'display', array( 'instance' => $instance ) );
}

/**
 * Setup an instance to be updated.
 *
 * @uses  nice_team_request()
 *
 * @since 1.0
 *
 * @param Nice_Team_EntityInterface $instance
 * @param array                          $data      Information to update instance.
 */
function nice_team_update( Nice_Team_EntityInterface $instance, array $data = array() ) {
	nice_team_request( get_class( $instance ), 'update', array_merge( $data, array( 'instance' => $instance ) ) );
}
