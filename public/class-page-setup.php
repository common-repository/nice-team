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

if ( ! class_exists( 'Nice_Team_Setup_Page' ) ) :
/**
 * class Nice_Team_Setup_Page
 *
 * This class manages the hooks to be fired on each kind of team page
 * when it's been rendered.
 *
 * @since 1.0
 */
class Nice_Team_Setup_Page {
	/**
	 * Internal name for the current page.
	 *
	 * @var   null|string
	 * @since 1.0
	 */
	protected $current_page = null;

	/**
	 * Set the current page.
	 *
	 * @since 1.0
	 */
	public function __construct() {
		$this->current_page = $this->get_current_page();
	}

	/**
	 * Initialize an instance of this class and setup the current page.
	 *
	 * @since 1.0
	 *
	 * @param Nice_Team_Setup_Page $setup
	 */
	public static function init( Nice_Team_Setup_Page $setup = null ) {
		if ( ! $setup ) {
			$setup = new self;
		}

		$setup->setup_current_page();
	}

	/**
	 * Obtain an internal name for the current page.
	 *
	 * @since 1.0
	 *
	 * @return null|string
	 */
	public function get_current_page() {
		if ( $this->current_page ) {
			return $this->current_page;
		}

		$current_page = null;

		if ( nice_team_is_member_404() ) {
			$current_page = '404-single-member';

		} elseif ( nice_team_is_category_404() ) {
			$current_page = '404-category';

		} elseif ( nice_team_is_single() ) {
			$current_page = 'single-member';

		} elseif ( nice_team_is_category() ) {
			$current_page = 'team-category';

		} elseif ( nice_team_is_archive() ) {
			$current_page = 'team-archive';

		} elseif ( ! nice_team_is_team_member_post_type() ) {
			$current_page = null;

		}

		return $current_page;
	}

	/**
	 * Setup before, after and specific hooks for the current page.
	 *
	 * @since 1.0
	 */
	public function setup_current_page() {
		// Return early if the current page is not set.
		if ( ! $this->current_page ) {
			return;
		}

		/**
		 * @hook  nice_team_before_page_setup
		 *
		 * All actions that add functionality or output right before the
		 * current page is setup should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_before_page_setup' );

		/**
		 * Setup hooks for the current page.
		 */
		switch ( $this->current_page ) {
			case '404-single-member':
				$this::setup_single_member_404_page();
				break;

			case '404-category':
				$this::setup_category_404_page();
				break;

			case 'single-member':
				$this::setup_single_member_page();
				break;

			case 'team-category':
				$this::setup_team_category();
				break;

			case 'team-archive':
				$this::setup_team_archive();
				break;

			default:
				$this::setup_page();
				break;
		}

		/**
		 * @hook  nice_team_after_page_setup
		 *
		 * All actions that add functionality or output right after the
		 * current page is setup should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_after_page_setup' );
	}

	/**
	 * Fire actions for 404 pages triggered by menu items.
	 *
	 * @since 1.0
	 */
	public static function setup_single_member_404_page() {
		/**
		 * @hook  nice_team_single_member_404
		 *
		 * All specific actions for member 404 pages that need to be
		 * processed before loading the template should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_single_member_404' );
	}

	/**
	 * Fire actions for 404 pages triggered by categories.
	 *
	 * @since 1.0
	 */
	public static function setup_category_404_page() {
		/**
		 * @hook  nice_team_category_404
		 *
		 * All specific actions for member 404 pages that need to be
		 * processed before loading the template should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_category_404' );
	}

	/**
	 * Fire actions for single member pages.
	 *
	 * @since 1.0
	 */
	public static function setup_single_member_page() {
		/**
		 * @hook  nice_team_single_member_page
		 *
		 * All specific actions for single member pages that need to be
		 * processed before loading the template should be hooked here.
		 *
		 * @since 1.0
		 */
		do_action( 'nice_team_single_member_page' );
	}

	/**
	 * Fire actions for team category pages.
	 *
	 * @since 1.0
	 */
	public static function setup_team_category() {
		/**
		 * @hook nice_team_category_page
		 *
		 * All specific actions for team category pages that need to be
		 * processed before loading the template should be hooked here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see nice_team_setup_category_page() - 10
		 */
		do_action( 'nice_team_category_page' );
	}

	/**
	 * Fire actions for team archive pages.
	 *
	 * @since 1.0
	 */
	public static function setup_team_archive() {
		/**
		 * @hook  nice_team_archive_page
		 *
		 * All specific actions for team archive pages that need to be
		 * processed before loading the template should be hooked here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see nice_team_setup_archive_page() - 10
		 */
		do_action( 'nice_team_archive_page' );
	}

	/**
	 * Placeholder method for extensibility purposes.
	 *
	 * @since 1.0
	 */
	public function setup_page() {}
}
endif;
