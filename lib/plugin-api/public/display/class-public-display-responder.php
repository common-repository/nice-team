<?php
/**
 * NiceThemes Plugin API
 *
 * @package Nice_Team_Plugin_API
 * @since   1.0
 */
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Nice_Team_PublicDisplayResponder
 *
 * This class takes charge of the Nice_Team_Public instances to be
 * displayed through WordPress APIs.
 *
 * @since   1.0
 */
class Nice_Team_PublicDisplayResponder extends Nice_Team_DisplayResponder {
	/**
	 * Schedule interactions with WordPress APIs.
	 *
	 * @since 1.0
	 */
	protected function set_interactions() {
		/**
		 * Setup hooks for the current page.
		 */
		add_action( 'wp', array( $this, 'setup_page' ) );

		/**
		 * Setup current page template.
		 */
		add_filter( 'template_include', array( $this, 'template_include' ) );

		/**
		 * Load plugin styles.
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );

		/**
		 * Load plugin scripts.
		 */
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		/**
		 * Fire default functionality.
		 */
		parent::set_interactions();
	}

	/**
	 * Setup hooks for the current page.
	 *
	 * @since 1.0
	 */
	public function setup_page() {
		/**
		 * @hook nice_team_setup_page
		 *
		 * All the actions setting up functionality for the currently viewed
		 * page should be fired within the context of this hook.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_setup_page' );
	}

	/**
	 * Obtain the template of the current page.
	 *
	 * @since  1.0
	 *
	 * @param  string $template Current page template.
	 *
	 * @return string
	 */
	public function template_include( $template ) {
		/**
		 * @hook nice_team_template_include
		 *
		 * All template modifications for this plugin should be hooked here.
		 *
		 * @since 1.0
		 */
		return apply_filters( 'nice_team_template_include', $template, $this->data->get_info() );
	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since 1.0
	 */
	public function enqueue_styles() {
		do_action( 'nice_team_plugin_enqueue_styles', $this->data->get_info() );
	}

	/**
	 * Register and enqueue public-facing JavaScript files.
	 *
	 * @since  1.0
	 */
	public function enqueue_scripts() {
		do_action( 'nice_team_plugin_enqueue_scripts', $this->data->get_info() );
	}
}
