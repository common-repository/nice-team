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

if ( ! class_exists( 'Nice_Team_Member' ) ) :
/**
 * Class Nice_Team_Member
 *
 * Manage internal information for team members.
 *
 * @since 1.0
 *
 * @property-read WP_User $user
 * @property-read array   $custom_fields
 * @property-read array   $categories
 * @property-read string  $description
 * @property-read string  $context
 */
class Nice_Team_Member {
	/**
	 * Post object to obtain member data.
	 *
	 * @var   null|WP_Post
	 * @since 1.0
	 */
	protected $post = null;

	/**
	 * Numeric ID for the member instance.
	 *
	 * @var   null|int
	 * @since 1.0
	 */
	protected $ID = null;

	/**
	 * Name of the member.
	 *
	 * @var   null|string
	 * @since 1.0
	 */
	protected $name = null;

	/**
	 * Description of the team member.
	 *
	 * @var   null|string
	 * @since 1.0
	 */
	protected $description = null;

	/**
	 * Member meta data.
	 *
	 * @var   null|array
	 * @since 1.0
	 */
	protected $custom_fields = null;

	/**
	 * List of categories that this member is associated to.
	 *
	 * @var   null
	 * @since 1.0
	 */
	protected $categories = null;

	/**
	 * User matching the team member.
	 *
	 * @var   null|WP_User
	 * @since 1.0
	 */
	protected $user = null;

	/**
	 * Context where the team member is being requested.
	 *
	 * @since 1.0
	 * @var   string
	 */
	protected $context = null;

	/**
	 * Setup initial data.
	 *
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 */
	public function __construct( WP_Post $post ) {
		$post_type_name = nice_team_post_type_name();

		/**
		 * Trigger error if the post type doesn't match.
		 */
		if ( ! ( $post->post_type === $post_type_name ) ) {
			_nice_team_doing_it_wrong( __FUNCTION__, sprintf( esc_html__( 'The WP_Post object passed to %s class must belong of the %s post type', 'nice-team' ), __CLASS__, $post_type_name ) );
			return;
		}

		$this->post          = $post;
		$this->ID            = $post->ID;
		$this->name          = $this->get_name();
		$this->custom_fields = $this->get_custom_fields();
		$this->context       = $this->get_context();
	}

	/**
	 * Obtain a Nice_Team_Member object by post ID or WP_Post object.
	 *
	 * New instances are saved to a static variable, so they can be retrieved
	 * later without needing to be reinitialized.
	 *
	 * @since 1.0
	 *
	 * @param  int|WP_Post       $post Post ID or full post object.
	 *
	 * @return Nice_Team_Member
	 */
	public static function obtain( $post = null ) {
		static $members = array();

		$post_id = $post;

		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		// Allow a `WP_Post` object as input parameter.
		if ( $post instanceof WP_Post ) {
			$post_id = $post->ID;
		}

		if ( isset( $members[ $post_id ] ) ) {
			/**
			 * @var Nice_Team_Member $member
			 **/
			$member = $members[ $post_id ];

			/**
			 * The context where the member is called may have changed from one
			 * call to another, so we need to try to update it.
			 */
			$member->update_context_maybe();

			return $member;
		}

		$members[ $post_id ] = new self( get_post( $post_id ) );

		return $members[ $post_id ];
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
		if ( method_exists( $this, 'get_' . $property ) ) {
			return call_user_func( array( $this, 'get_' . $property ) );
		}

		if ( property_exists( $this, $property ) ) {
			return $this->{$property};
		}

		return null;
	}

	/**
	 * Obtain the ID of the member.
	 *
	 * @since  1.0
	 *
	 * @return null|string
	 */
	public function get_the_ID() {
		if ( is_null( $this->ID ) ) {
			$this->set_the_ID();
		}

		return $this->ID;
	}

	/**
	 * Set the name of the member.
	 *
	 * @since 1.0
	 */
	protected function set_the_ID() {
		$this->ID = $this->post->ID;
	}

	/**
	 * Obtain the name of the member.
	 *
	 * @since  1.0
	 *
	 * @return null|string
	 */
	public function get_name() {
		if ( is_null( $this->name ) ) {
			$this->set_name();
		}

		return $this->name;
	}

	/**
	 * Set the name of the member.
	 *
	 * @since 1.0
	 */
	protected function set_name() {
		$this->name = $this->post->post_title;
	}

	/**
	 * Obtain the description of the team member.
	 *
	 * @since  1.0
	 *
	 * @return null|string
	 */
	public function get_description() {
		if ( is_null( $this->description ) ) {
			$this->set_description();
		}

		return $this->description;
	}

	/**
	 * Set the description of the team member.
	 *
	 * @since 1.0
	 */
	protected function set_description() {
		$description = ( $this->get_user() instanceof WP_User ) ? get_the_author_meta( 'description', $this->get_user( 'ID' ) ) : $this->post->post_content;
		$this->description = $description ? wpautop( $description ) : '';
	}

	/**
	 * Obtain fields for the member.
	 *
	 * If there's no value given to the function, it will retrieve all meta data.
	 *
	 * @since  1.0
	 *
	 * @param  string     $value Name of the meta property to obtain value from.
	 *
	 * @return null|array
	 */
	public function get_custom_fields( $value = '' ) {
		if ( is_null( $this->custom_fields ) ) {
			$this->set_custom_fields( $this->post );
		}

		if ( $value ) {
			if ( isset( $this->custom_fields[ $value ] ) ) {
				return $this->custom_fields[ $value ];
			}

			return null;
		}

		return $this->custom_fields;
	}

	/**
	 * Set meta data for the member.
	 *
	 * @since  1.0
	 *
	 * @param  WP_Post    $post
	 *
	 * @return null|array
	 */
	protected function set_custom_fields( WP_Post $post ) {
		$custom_fields = array(
			'url',
			'gravatar',
			'email',
			'twitter',
			'facebook',
			'linkedin',
			'position',
			'username',
		);

		/**
		 * @hook nice_team_member_custom_fields
		 *
		 * Hook here to modify the custom fields for a single project.
		 */
		$custom_fields = apply_filters( 'nice_team_member_custom_fields', $custom_fields );

		foreach ( $custom_fields as $key ) {
			$this->custom_fields[ $key ] = get_post_meta( $post->ID, '_team_member_' . $key, true );
		}
	}

	/**
	 * Obtain user data for the team member.
	 *
	 * If there's no value given to the function, it will retrieve all user data.
	 *
	 * @since  1.0
	 *
	 * @param  string             $value Name of the property to obtain value from.
	 *
	 * @return null|array|WP_User
	 */
	public function get_user( $value = '' ) {
		if ( ! $this->user ) {
			$this->set_user();
		}

		if ( $value ) {
			if ( isset( $this->user->{$value} ) ) {
				return $this->user->{$value};
			}

			return null;
		}

		return $this->user;
	}

	/**
	 * Set the user matched to the team member, if any.
	 *
	 * @since 1.0
	 */
	protected function set_user() {
		$this->user = nice_team_sync_member_with_user() ? get_user_by( 'slug', $this->get_custom_fields( 'username' ) ) : null;
	}

	/**
	 * Obtain the list of categories that this member is attached to.
	 *
	 * @since  1.0
	 *
	 * @return array
	 */
	public function get_categories() {
		if ( ! $this->categories ) {
			$this->set_categories();
		}

		return $this->categories;
	}

	/**
	 * Set the list of categories that this member is attached to.
	 *
	 * @since  1.0
	 */
	protected function set_categories() {
		$categories = get_the_terms( $this->get_the_ID(), nice_team_category_name() );
		$this->categories = empty( $categories ) ? array() : $categories;
	}

	/**
	 * Obtain currently visible data.
	 *
	 * This list may be different depending on the context where the team
	 * member is called from.
	 *
	 * @since  1.0
	 *
	 * @return array
	 */
	public function get_visible_data() {
		switch ( $this->context ) {
			case 'shortcode':
				$visible_data = $this->get_shortcode_visible_data();
				break;

			case 'widget':
				$visible_data = $this->get_widget_visible_data();
				break;

			default:
				$visible_data = $this->get_global_visible_data();
				break;
		}

		return $visible_data;
	}

	/**
	 * Obtain currently visible data for shortcode context.
	 *
	 * We get the user-defined attributes and match them against the plugin settings.
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	protected function get_shortcode_visible_data() {
		static $shortcodes = array();

		// Obtain shortcode data.
		$shortcode = nice_team_current_shortcode();

		if ( ! isset( $shortcodes[ $shortcode->id ] ) ) {
			// Obtain global visible data.
			$global_visible_data = $this->get_global_visible_data();

			// Limit fields to the ones allowed globally.
			$visible_data = array_intersect_key( $shortcode->atts, $global_visible_data );

			// Use global values for the fields that were not passed to the shortcode.
			$visible_data = wp_parse_args( $visible_data, $global_visible_data );

			// Ensure we have boolean values.
			if ( is_array( $visible_data ) && ! empty( $visible_data ) ) {
				foreach ( $visible_data as &$visible_data_item ) {
					$visible_data_item = nice_team_bool( $visible_data_item );
				}
			}

			$shortcodes[ $shortcode->id ] = $visible_data;
		}

		return $shortcodes[ $shortcode->id ];
	}

	/**
	 * Obtain currently visible data for widget context.
	 *
	 * We use the widget-specific settings.
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	protected function get_widget_visible_data() {
		static $widgets = array();

		// Obtain widget data.
		$widget = nice_team_current_widget();

		if ( ! isset( $widgets[ $widget->id ] ) ) {
			// Obtain global visible data.
			$global_visible_data = $this->get_global_visible_data();

			// Check if we should use the default plugin settings.
			$default_fields = ( 'default' === $widget->args['display_fields'] );

			// Assign default plugin settings or widget settings, depending on the case.
			$visible_data = $default_fields ? $global_visible_data : $widget->args['visible_data'];

			// Ensure we have boolean values.
			if ( is_array( $visible_data ) && ! empty( $visible_data ) ) {
				foreach ( $visible_data as &$visible_data_item ) {
					$visible_data_item = nice_team_bool( $visible_data_item );
				}
			}

			$widgets[ $widget->id ] = $visible_data;
		}

		return $widgets[ $widget->id ];
	}

	/**
	 * Obtain currently visible data for global context.
	 *
	 * We use the plugin settings.
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	protected function get_global_visible_data() {
		static $visible_data = null;

		if ( is_null( $visible_data ) ) {
			// Obtain plugin settings.
			$settings = nice_team_settings();

			// Obtain data from plugin settings.
			$visible_data = $settings['visible_data'];

			// Ensure we have boolean values.
			if ( is_array( $visible_data ) && ! empty( $visible_data ) ) {
				foreach ( $visible_data as &$visible_data_item ) {
					$visible_data_item = nice_team_bool( $visible_data_item );
				}
			}
		}

		return $visible_data;
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
	 * Update contextual properties to the current context where the team
	 * member is being called.
	 *
	 * @since 1.0
	 */
	protected function update_context_maybe() {
		if ( $this->context !== $this->get_context() ) {
			// Update context.
			$this->context = $this->get_context();
		}
	}

	/**
	 * Check if the given field can be displayed.
	 *
	 * @since  1.0
	 *
	 * @param  string $data
	 *
	 * @return bool
	 */
	public function can_display( $data ) {
		$visible_data = $this->get_visible_data();
		return isset( $visible_data[ $data ] ) && $visible_data[ $data ];
	}
}
endif;
