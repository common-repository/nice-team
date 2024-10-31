<?php
/**
 * Nice Team by NiceThemes.
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

if ( ! class_exists( 'Nice_Team_Page_Template' ) ) :
/**
 * class Nice_Team_Template
 *
 * This class manages the templates to be loaded for the public-facing side
 * of this plugin, depending on the current view.
 *
 * @since 1.0
 */
class Nice_Team_Page_Template {
	/**
	 * Path of the current non-filtered template.
	 *
	 * @since 1.0
	 * @var   null|string
	 */
	protected $original_template = null;

	/**
	 * Path of the template to be used for the current page.
	 *
	 * @since 1.0
	 * @var   null|string
	 */
	protected $current_template = null;

	/**
	 * Set initial values.
	 *
	 * @since 1.0
	 *
	 * @param string $original_template Location of the current non-hooked template.
	 */
	public function __construct( $original_template ) {
		$this->original_template = $original_template;
	}

	/**
	 * Create an instance of this class and return the current template.
	 *
	 * @since  1.0
	 *
	 * @param  string      $original_template Location of the current non-hooked template.
	 *
	 * @return null|string
	 */
	public static function obtain( $original_template ) {
		$template = new self( $original_template );
		return $template->get_current_template();
	}

	/**
	 * Obtain the template for the current page.
	 *
	 * @since  1.0
	 *
	 * @return null|string
	 */
	public function get_current_template() {
		if ( ! $this->current_template ) {
			$this->current_template = $this->process_current_template();
		}

		return $this->current_template;
	}

	/**
	 * Process the template for the current page.
	 *
	 * @since 1.0
	 *
	 * @return string
	 */
	protected function process_current_template() {
		if ( nice_team_is_404() ) {
			/**
			 * Keep original template for 404 error pages.
			 */
			$template = $this->original_template;

		} elseif ( nice_team_is_single() ) {
			/**
			 * Setup template for single team members.
			 */
			$template = self::get_single_template();

		} elseif ( nice_team_is_category() ) {
			/**
			 * Setup template for team member category.
			 */
			$template = self::get_category_template();

		} elseif ( nice_team_is_archive() ) {
			/**
			 * Setup template for team member archive.
			 */
			$template = self::get_archive_template();

		} else {
			/**
			 * Use current template as fallback value.
			 */
			$template = $this->original_template;
		}

		return $template;
	}

	/**
	 * Obtain the location of the default single template.
	 *
	 * @since  1.0
	 */
	public static function get_single_template() {
		// Allow bypassing.
		/**
		 * @hook nice_team_single_template
		 *
		 * Modify the team member template for single member pages by hooking here.
		 *
		 * @since 1.0
		 */
		$template = apply_filters( 'nice_team_single_template', '' );

		// Look for a custom file before loading default.
		if ( ! $template && ! file_exists( $template = locate_template( 'team/single-member.php' ) ) ) {
			$template = nice_team_locate_template( 'single-member.php' );
		}

		return $template;
	}

	/**
	 * Obtain the location of the default category template.
	 *
	 * @since  1.0
	 */
	public static function get_category_template() {
		// Allow bypassing.
		/**
		 * @hook nice_team_category_template
		 *
		 * Modify the member template for team category pages by hooking here.
		 *
		 * @since 1.0
		 */
		$template = apply_filters( 'nice_team_category_template', '' );

		// Look for a custom file before loading default.
		if ( ! $template && ! file_exists( $template = locate_template( 'team/team-category.php' ) ) ) {
			$template = nice_team_locate_template( 'team-category.php' );
		}

		return $template;
	}

	/**
	 * Obtain the location of the default archive template.
	 *
	 * @since  1.0
	 */
	public function get_archive_template() {
		// Allow bypassing.
		/**
		 * @hook nice_team_archive_template
		 *
		 * Modify the member template for team archive pages by hooking here.
		 *
		 * @since 1.0
		 */
		$template = apply_filters( 'nice_team_archive_template', '' );

		// Look for a custom file before loading default.
		if ( ! $template && ! file_exists( $template = locate_template( 'team/team-archive.php' ) ) ) {
			$template = nice_team_locate_template( 'team-archive.php' );
		}

		return $template;
	}
}
endif;
