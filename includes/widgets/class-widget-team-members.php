<?php
/**
 * Nice Team by NiceThemes.
 *
 * Handle the Team widget.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! class_exists( 'Nice_Team_Members_Widget' ) ) :
/**
 * Class Nice_Team_Members_Widget
 *
 * This class creates a widget to display team members.
 *
 * @package Nice_Team
 * @since   1.0
 *
 * @property-read Nice_Team $team
 */
class Nice_Team_Members_Widget extends Nice_Team_WP_Widget {
	/**
	 * Internal handler for this widget.
	 *
	 * @since 1.0
	 * @var   string
	 */
	public $id = 'nice-team-members';

	/**
	 * Team instance containing members.
	 *
	 * @since 1.0
	 * @var   null|Nice_Team
	 */
	protected $team = null;

	/**
	 * Name of the template for the public-facing side of the widget.
	 *
	 * This template will be loaded by the parent class.
	 *
	 * @see Nice_Team_WP_Widget::widget()
	 * @see Nice_Team_WP_Widget::print_widget()
	 *
	 * @since 1.0
	 * @var   string
	 */
	public $template = 'widgets/team-members.php';

	/**
	 * Name of the template for the admin-facing side of the widget.
	 *
	 * This template will be loaded by the parent class.
	 *
	 * @see Nice_Team_WP_Widget::form()
	 *
	 * @since 1.0
	 * @var   string
	 */
	public $form_template = 'widget-team-members-form.php';

	/**
	 * Initialize widget.
	 *
	 * @since 1.0
	 */
	function __construct() {
		/**
		 * Define name of widget. Check first, to allow inheritance.
		 */
		if ( ! $this->name ) {
			$this->name = esc_html__( '(NiceThemes) Team Members', 'nice-team' );
		}

		/**
		 * Define widget options. Merge with existing, to allow inheritance.
		 */
		$this->options = array_merge( array(
			'classname'   => 'nice-team-members',
			'description' => esc_html__( 'A widget that displays your team members.', 'nice-team' ),
		), $this->options );

		/**
		 * Create widget.
		 */
		parent::__construct();
	}

	/**
	 * Obtain default values for widget instance.
	 *
	 * @since  1.0
	 *
	 * @return array
	 */
	protected function get_instance_defaults() {
		$settings = nice_team_settings();

		/**
		 * Obtain values.
		 *
		 * Format for each value: {key} => array( {value}, {sanitization_function}, {fallback_value} )
		 */
		$defaults = array(
			'title'            => array( '', 'sanitize_text_field' ),
			'limit'            => array( $settings['limit'], 'absint' ),
			'orderby'          => array( 'default', 'sanitize_key' ),
			'order'            => array( 'default', 'sanitize_key' ),
			'display_fields'   => array( 'default', 'sanitize_key' ),
			'visible_data'     => array( $settings['visible_data'], 'filter_var_array' ),
			'thumbnail_width'  => array( $settings['archive_image_size']['width'], 'absint' ),
			'thumbnail_height' => array( $settings['archive_image_size']['height'], 'absint' ),
			'category'         => array( 0, 'absint' ),
			'include_children' => array( $settings['include_children'], 'nice_team_bool', false ),
			'id'               => array( '', 'sanitize_key' ),
		);

		/**
		 * @hook nice_team_widget_members_instance_defaults
		 *
		 * Modify the default values for instances of this widget by hooking
		 * in here.
		 *
		 * @since 1.0
		 */
		return apply_filters( 'nice_team_widget_members_instance_defaults', $defaults, $this );
	}

	/**
	 * Obtain the list of hooks to be applied to the template of the widget.
	 *
	 * @since  1.0
	 *
	 * @return mixed|void|array
	 */
	protected function get_template_hooks() {
		$hooks = array(
			/**
			 * Print widget title.
			 *
			 * @see Nice_Team_WP_Widget::widget_title()
			 * @see Nice_Team_WP_Widget::update_member()
			 * @see Nice_Team_WP_Widget::member_thumbnail()
			 * @see Nice_Team_WP_Widget::member_title()
			 * @see Nice_Team_WP_Widget::member_description()
			 * @see Nice_Team_WP_Widget::member_meta()
			 *
			 * @since 1.0
			 */
			array(
				'tag'      => 'nice_team_before_widget_content',
				'function' => array( __CLASS__, 'widget_title' ),
				'priority' => 20,
			),
			array(
				'tag'      => 'nice_team_widget_member_content',
				'function' => array( __CLASS__, 'member_thumbnail' ),
				'priority' => 10,
			),
			array(
				'tag'      => 'nice_team_widget_member_content',
				'function' => array( __CLASS__, 'member_title' ),
				'priority' => 20,
			),
			array(
				'tag'      => 'nice_team_widget_member_content',
				'function' => array( __CLASS__, 'member_description' ),
				'priority' => 30,
			),
			array(
				'tag'      => 'nice_team_widget_member_content',
				'function' => array( __CLASS__, 'member_meta' ),
				'priority' => 40,
			),
			array(
				'tag'      => 'nice_team_widget_after_member_title',
				'function' => array( __CLASS__, 'member_position' ),
				'priority' => 10,
			),
			array(
				'tag'      => 'nice_team_widget_member_meta',
				'function' => array( __CLASS__, 'member_url' ),
				'priority' => 10,
			),
			array(
				'tag'      => 'nice_team_widget_member_meta',
				'function' => array( __CLASS__, 'member_email' ),
				'priority' => 20,
			),
			array(
				'tag'      => 'nice_team_widget_member_meta',
				'function' => array( __CLASS__, 'member_twitter' ),
				'priority' => 30,
			),
			array(
				'tag'      => 'nice_team_widget_member_meta',
				'function' => array( __CLASS__, 'member_facebook' ),
				'priority' => 40,
			),
			array(
				'tag'      => 'nice_team_widget_member_meta',
				'function' => array( __CLASS__, 'member_linkedin' ),
				'priority' => 50,
			),
			array(
				'tag'      => 'nice_team_widget_member_meta',
				'function' => array( __CLASS__, 'member_posts' ),
				'priority' => 60,
			),
		);

		/**
		 * @hook nice_team_widget_members_template_hooks
		 *
		 * Add or remove hooks for the template of this widget before they get
		 * passed to the WordPress API.
		 *
		 * @since 1.0
		 */
		return apply_filters( 'nice_team_widget_members_template_hooks', $hooks, $this );
	}

	/**
	 * Create widget form.
	 *
	 * @since  1.0
	 *
	 * @param  array $instance Instance of this widget.
	 * @return void
	 */
	function form( $instance ) {
		/**
		 * Set default fields for the form if there are no values set yet.
		 */
		$instance['visible_data'] = isset( $instance['visible_data'] ) ? $instance['visible_data'] : $this->instance_defaults['visible_data'][0];

		parent::form( $instance );
	}

	/**
	 * Fire actions before widget output.
	 *
	 * @since  1.0
	 */
	public function before_output() {
		/**
		 * @hook nice_team_widget_members_instance
		 *
		 * All modifications to the instance that will be used to process the
		 * members should be hooked here.
		 *
		 * @since 1.0
		 */
		$this->args = apply_filters( 'nice_team_widget_members_instance', $this->args );

		/**
		 * Obtain team.
		 */
		$this->team = $this->get_team();

		parent::before_output();
	}

	/**
	 * Fire actions after widget output.
	 *
	 * @since  1.0
	 */
	public function after_output() {
		// Reset post data if we have an active query.
		if ( $this->team->members instanceof WP_Query ) {
			wp_reset_postdata();
		}

		parent::after_output();
	}

	/**
	 * Obtain the result of a query of members.
	 *
	 * @since  1.0
	 *
	 * @return array
	 */
	protected function get_team() {
		/**
		 * Build query for taxonomies.
		 */
		$tax_query = array();

		if ( $this->args['category'] ) {
			$tax_query[] = array(
				'taxonomy'         => nice_team_category_name(),
				'field'            => 'id',
				'terms'            => explode( ',', $this->args['category'] ),
				'include_children' => $this->args['include_children'],
			);
		}

		/**
		 * @hook nice_team_widget_members_tax_query
		 *
		 * All modifications to the tax query that will be used to process the
		 * members should be hooked here.
		 *
		 * @since 1.0
		 */
		$tax_query = apply_filters( 'nice_team_widget_members_tax_query', $tax_query, $this->args );

		$team = nice_team_obtain_instance( array_merge( $this->args, $tax_query ) );

		return $team;
	}

	/**
	 * Load thumbnail template for the team member being looped.
	 *
	 * @since 1.0
	 */
	public static function member_thumbnail() {
		if ( nice_team_member_can_display( 'thumbnail' ) ) {
			nice_team_get_template( 'widgets/team-member/featured-image.php' );
		}
	}

	/**
	 * Load title template for the team member being looped.
	 *
	 * @since 1.0
	 */
	public static function member_title() {
		nice_team_get_template( 'widgets/team-member/title.php' );
	}

	/**
	 * Load template for the looped member's position.
	 *
	 * @since 1.0
	 */
	public static function member_position() {
		if ( nice_team_member_can_display( 'position' ) ) {
			nice_team_get_template( 'widgets/team-member/position.php' );
		}
	}

	/**
	 * Load description template for the team member being looped.
	 *
	 * @since 1.0
	 */
	public static function member_description() {
		nice_team_get_template( 'widgets/team-member/description.php' );
	}

	/**
	 * Load meta template for the team member being looped.
	 *
	 * @since 1.0
	 */
	public static function member_meta() {
		$member = nice_team_obtain_member();

		$load_template = ( nice_team_member_can_display( 'url' ) && nice_team_get_member_url() )
	                 || ( nice_team_member_can_display( 'email' ) && nice_team_get_member_email() )
	                 || ( nice_team_member_can_display( 'twitter' ) && nice_team_get_member_twitter() )
	                 || ( nice_team_member_can_display( 'facebook' ) && nice_team_get_member_facebook() )
	                 || ( nice_team_member_can_display( 'linkedin' ) && nice_team_get_member_linkedin() )
	                 || isset( $member->user->ID );

		/**
		 * @hook nice_team_widget_member_meta_load_template
		 *
		 * Hook here to modify the conditions to load the template.
		 *
		 * @since 1.0
		 */
		if ( apply_filters( 'nice_team_widget_member_meta_load_template', $load_template ) ) {
			nice_team_get_template( 'widgets/team-member/meta.php' );
		}
	}

	/**
	 * Load template for the URL of the looped member.
	 *
	 * @since 1.0
	 */
	public static function member_url() {
		if ( nice_team_member_can_display( 'url' ) ) {
			nice_team_get_template( 'widgets/team-member/url.php' );
		}
	}

	/**
	 * Load template for the email of the looped member.
	 *
	 * @since 1.0
	 */
	public static function member_email() {
		if ( nice_team_member_can_display( 'email' ) ) {
			nice_team_get_template( 'widgets/team-member/email.php' );
		}
	}

	/**
	 * Load template for the Facebook profile of the looped member.
	 *
	 * @since 1.0
	 */
	public static function member_facebook() {
		if ( nice_team_member_can_display( 'facebook' ) ) {
			nice_team_get_template( 'widgets/team-member/facebook.php' );
		}
	}

	/**
	 * Load template for the Twitter username of the looped member.
	 *
	 * @since 1.0
	 */
	public static function member_twitter() {
		if ( nice_team_member_can_display( 'twitter' ) ) {
			nice_team_get_template( 'widgets/team-member/twitter.php' );
		}
	}

	/**
	 * Load template for the Linkedin profile of the looped member.
	 *
	 * @since 1.0
	 */
	public static function member_linkedin() {
		if ( nice_team_member_can_display( 'linkedin' ) ) {
			nice_team_get_template( 'widgets/team-member/linkedin.php' );
		}
	}

	/**
	 * Load template for the link to all the posts of the looped member.
	 *
	 * @since 1.0
	 */
	public static function member_posts() {
		$member = nice_team_obtain_member();

		if ( isset( $member->user->ID ) ) {
			nice_team_get_template( 'widgets/team-member/posts.php' );
		}
	}
}
endif;
