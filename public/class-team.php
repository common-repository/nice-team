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

if ( ! class_exists( 'Nice_Team' ) ) :
/**
 * Class Nice_Team
 *
 * Manage internal team information.
 *
 * @since 1.0
 *
 * @property-read array             $args
 * @property-read WP_Query          $members
 * @property-read Nice_Team_Member $member
 * @property-read int               $loop_position
 */
class Nice_Team {
	/**
	 * Instance arguments to help constructing output.
	 *
	 * @since 1.0
	 * @var   array|mixed|void
	 */
	protected $args = array();

	/**
	 * Members contained by this instance.
	 *
	 * @since 1.0
	 * @var   array|WP_Query
	 */
	protected $members = array();

	/**
	 * Current member being looped.
	 *
	 * @since 1.0
	 * @var   Nice_Team_Member|null
	 */
	protected $member = null;

	/**
	 * Context where the list of team members is being requested.
	 *
	 * @since 1.0
	 * @var   string
	 */
	protected $context = null;

	/**
	 * Current position within the loop.
	 *
	 * @since 1.0
	 * @var   int
	 */
	protected $loop_position = -1;

	/**
	 * Setup initial data.
	 *
	 * @param array $args Arguments for the new instance.
	 *
	 * @since 1.0
	 */
	public function __construct( $args = array() ) {
		$this->args     = self::sanitize_args( $args );
		$this->context = $this->get_context();
		$this->members = $this->get_members();
		$this->member  = $this->get_member();
	}

	/**
	 * Obtain a Nice_Team object.
	 *
	 * New instances are saved to a static variable, so they can be retrieved
	 * later without needing to be reinitialized.
	 *
	 * @since 1.0
	 *
	 * @param  array          $args Arguments for the new instance.
	 *
	 * @return Nice_Team
	 */
	public static function obtain( $args = null ) {
		static $teams = array();

		if ( is_null( $args ) ) {
			if ( is_array( $teams ) && ! empty( $teams ) ) {
				return end( $teams );
			}

			/**
			 * Trigger error if we don't have arguments and the array of
			 * instances is empty.
			 */
			_nice_team_doing_it_wrong(
				__METHOD__,
				esc_html__( 'You need to create at least one instance before trying to obtain one.', 'nice-team' ),
				'1.0'
			);

			return null;
		}

		$team = new self( $args );

		$teams[] = $team;

		return $team;
	}

	/**
	 * Obtain the value of a property.
	 *
	 * @since  1.0
	 *
	 * @param  string $property
	 *
	 * @return null|string
	 */
	public function __get( $property ) {
		if ( property_exists( $this, $property ) ) {
			return $this->{$property};
		}

		return null;
	}

	/**
	 * Sanitize arguments.
	 *
	 * @since  1.0
	 * @param  array       $args
	 *
	 * @return mixed|void
	 */
	protected static function sanitize_args( $args = array() ) {
		$settings = nice_team_settings();

		/**
		 * @hook nice_team_default_args
		 *
		 * All modifications to the default arguments should be hooked here.
		 *
		 * @since 1.0
		 */
		$defaults = apply_filters( 'nice_team_default_args', array(
				'avoidcss'              => $settings['avoidcss'],
				'limit'                 => $settings['limit'],
				'columns'               => $settings['columns'],
				'orderby'               => $settings['orderby'],
				'order'                 => $settings['order'],
				'category'              => null,
				'exclude_category'      => null,
				'include_children'      => $settings['include_children'],
				'position'              => $settings['visible_data']['position'],
				'thumbnail'             => $settings['visible_data']['thumbnail'],
				'url'                   => $settings['visible_data']['url'],
				'email'                 => $settings['visible_data']['email'],
				'twitter'               => $settings['visible_data']['twitter'],
				'facebook'              => $settings['visible_data']['facebook'],
				'linkedin'              => $settings['visible_data']['linkedin'],
				'image_width'           => $settings['archive_image_size']['width'],
				'image_height'          => $settings['archive_image_size']['height'],
				'id'                    => 0,
				'display_empty_message' => true,
			)
		);

		$args = wp_parse_args( $args, $defaults );

		// Force the number of columns to be at least 1.
		$args['columns'] = intval( $args['columns'] );

		/**
		 * @hook nice_team_args
		 *
		 * All modifications to the arguments should hooked here.
		 *
		 * @since 1.0
		 */
		return apply_filters( 'nice_team_args', $args );
	}

	/**
	 * Create and return a custom query for team members.
	 *
	 * @since 1.0
	 *
	 * @return null|WP_Query
	 */
	protected function query() {
		$settings      = nice_team_settings();
		$category_name = nice_team_category_name();
		$query         = null;
		$args          = $this->args;

		$defaults = array(
			'limit'     => $settings['limit'],
			'orderby'   => $settings['orderby'],
			'order'     => strtoupper( $settings['order'] ),
			'paged'     => null,
		);
		/**
		 * @hook nice_team_query_default_args
		 *
		 * Hook here if you want to modify the default query arguments.
		 *
		 * @since 1.0
		 */
		$defaults = apply_filters( 'nice_team_query_default_args', $defaults, $this );

		$args = wp_parse_args( $args, $defaults );
		/**
		 * @hook nice_team_query_args
		 *
		 * Hook here if you want to modify the query arguments.
		 *
		 * @since 1.0
		 */
		$args = apply_filters( 'nice_team_query_args', $args, $this );

		// Build query for taxonomies.
		$tax_query = array();
		if ( $this->args['category'] ) {
			$tax_query[] = array(
				'taxonomy' => $category_name,
				'field'    => 'id',
				'terms'    => explode( ',', $this->args['category'] ),
			);
		}
		if ( $this->args['exclude_category'] ) {
			$tax_query[] = array(
				'taxonomy' => $category_name,
				'field'    => 'id',
				'terms'    => explode( ',', $this->args['exclude_category'] ),
				'operator' => 'NOT IN',
			);
		}

		/**
		 * @hook nice_team_tax_query
		 *
		 * Hook here if you want to modify the default taxonomy query.
		 *
		 * @since 1.0
		 */
		$tax_query = apply_filters( 'nice_team_tax_query', $tax_query, $this );

		if ( 0 !== $args['limit'] ) {
			$query = new WP_Query( array(
					'post_type'      => nice_team_post_type_name(),
					'orderby'        => $args['orderby'],
					'posts_per_page' => $args['limit'],
					'order'          => $args['order'],
					'tax_query'      => $tax_query,
					'paged'          => $args['paged'],
					'p'              => $args['id'],
				)
			);
		}

		return $query;
	}

	/**
	 * Return the query of members for the current instance.
	 *
	 * @since  1.0
	 *
	 * @return WP_Query
	 */
	public function get_members() {
		if ( ! $this->members ) {
			$this->set_members();
		}

		return $this->members;
	}

	/**
	 * Set the currently active query of members, if any.
	 *
	 * This function will obtain the query that WordPress is currently processing,
	 * and if it matches our custom post type, return it. If not, it will create a
	 * new WP_Query object with the received arguments.
	 *
	 * @since 1.0
	 */
	protected function set_members() {
		global $wp_query;

		$members = null;

		/**
		 * Try to get the query from the current one, if it's being processed.
		 */
		if ( 'global' === $this->context && ( nice_team_is_team_member_post_type() || nice_team_is_category() ) ) {
			$members = $wp_query;
		}

		/**
		 * Make our custom query if a valid WP_Query hasn't been set yet.
		 */
		if ( is_null( $members ) || $members->is_single ) {
			$members = $this->query();
		}

		$this->members = $members;
	}

	/**
	 * Obtain the current member.
	 *
	 * @since  1.0
	 *
	 * @return Nice_Team_Member
	 */
	protected function get_member() {
		if ( ! $this->member && ( $members = $this->get_members() ) ) {
			$this->set_member( isset( $members->post->ID ) ? $members->post->ID : null );
		}

		return $this->member;
	}

	/**
	 * Set the member for this instance.
	 *
	 * @since 1.0
	 *
	 * @param int $member_id ID of the member.
	 */
	protected function set_member( $member_id = null ) {
		$this->member = $member_id ? nice_team_obtain_member( $member_id ) : null;
	}

	/**
	 * Obtain the name of the current context.
	 *
	 * @since  1.0
	 *
	 * @return null|string
	 */
	public function get_context() {
		return nice_team_context();
	}

	/**
	 * Check if the members query has posts.
	 *
	 * This method is a wrapper for WP_Query::have_posts()
	 *
	 * @see WP_Query::have_posts()
	 *
	 * @since  1.0
	 *
	 * @return bool
	 */
	public function have_posts() {
		$members = $this->get_members();

		if ( $members ) {
			return $members->have_posts();
		}

		return false;
	}

	/**
	 * Process information for the current member in the loop.
	 *
	 * This method is a wrapper for WP_Query::the_post() with some additional
	 * functionality.
	 *
	 * @see WP_Query::the_post()
	 *
	 * @since  1.0
	 */
	public function the_post() {
		/**
		 * Obtain the members query.
		 */
		$members = $this->get_members();

		/**
		 * Process the current WP_Post object in the loop.
		 */
		$members->the_post();

		/**
		 * Update the current member of this object to the one in the loop.
		 */
		$this->update_member();

		/**
		 * Update the loop count.
		 */
		$this->increase_loop();
	}

	/**
	 * Update the member to match the current item inside the loop.
	 *
	 * @since 1.0
	 */
	public function update_member() {
		$this->set_member();
	}

	/**
	 * Update the loop position.
	 *
	 * @since 1.0
	 */
	public function increase_loop() {
		$this->loop_position++;
	}

	/**
	 * Return the current loop position.
	 *
	 * @since 1.0
	 */
	public function get_loop_position() {
		return $this->loop_position;
	}
}
endif;
