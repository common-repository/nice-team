<?php
/**
 * Nice Team by NiceThemes.
 *
 * This file contains functions for templating purposes.
 *
 * @package Nice_Team
 * @since   1.0
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/** ==========================================================================
 *  Contents.
 *  ======================================================================= */
if ( ! function_exists( 'nice_team' ) ) :
/**
 * Display a loop of team members.
 *
 * @since 1.0
 *
 * @param array $args {
 *      Optional. Arguments to construct the loop of members.
 *      @see Nice_Team::sanitize_args() For the full list of arguments and default values.
 *
 *      @type bool   $avoidcss              Whether to avoid the default CSS.
 *      @type int    $columns               Number of columns to show in the grid of members.
 *      @type int    $limit                 Maximum number of members to retrieve for each page of the loop.
 *      @type string $orderby               Which field to order members by. Accepts post fields.
 *      @type string $order                 Whether the order of the members should be ascendant (asc) or descendant (desc).
 *      @type string $image_width           Width of member image (in pixels).
 *      @type string $image_height          Height of member image (in pixels).
 *      @type string $category              ID or comma-separated list of team categories by ID to include in the query.
 *      @type string $exclude_category      ID or comma-separated list of team categories by ID to exclude from the query.
 *      @type bool   $include_children      Whether to include members from children categories in the query.
 *      @type bool   $position              Whether to show the team member's position.
 *      @type bool   $thumbnail             Whether to show the team member's image.
 *      @type bool   $url                   Whether to show a link to the team member's website.
 *      @type bool   $email                 Whether to show the team member's email.
 *      @type bool   $twitter               Whether to show a link to the team member's Twitter profile.
 *      @type bool   $facebook              Whether to show a link to the team member's Facebook profile.
 *      @type bool   $linkedin              Whether to show a link to the team member's LinkedIn profile.
 *      @type int    $id                    ID of a single member to show instead of a list.
 *      @type bool   $display_empty_message Whether a message should be displayed if no content is found.
 * }
 */
function nice_team( $args = array() ) {
	/**
	 * Initialize the Nice_Team object.
	 */
	$team = nice_team_obtain_instance( $args );

	// Return early if we don't have members to loop.
	if ( ! $team->have_posts() ) {
		if ( $team->args['display_empty_message'] ) {
			/**
			 * @hook  nice_team_empty
			 *
			 * All HTML corresponding to a "no content found" message should be printed at this point.
			 *
			 * @since 1.0
			 *
			 * Hooked here:
			 * @see nice_team_loop_empty() - 10 (prints contents of templates/loop/empty/empty.php)
			 */
			do_action( 'nice_team_empty' );
		}

		return;
	}

	/**
	 * @hook  nice_team_before_loop
	 *
	 * All HTML before the loop of members gets processed should be
	 * printed at this point.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_loop_main_wrapper_start() - 10
	 */
	do_action( 'nice_team_before_loop' );

	/**
	 * @hook nice_team_loop
	 *
	 * All team-related loops should be processed at this point.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_loop_projects()
	 */
	do_action( 'nice_team_loop', $team );

	/**
	 * @hook  nice_team_after_loop
	 *
	 * All HTML after the loop of members gets processed should be
	 * printed at this point.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_loop_main_wrapper_end() - 10
	 */
	do_action( 'nice_team_after_loop' );

	wp_reset_postdata();
}
endif;

if ( ! function_exists( 'nice_team_loop_members' ) ) :
/**
 * Fire the loop of members.
 *
 * @since 1.0
 *
 * @param Nice_Team $team
 */
function nice_team_loop_members( Nice_Team $team ) {
	while ( $team->have_posts() ) : $team->the_post();
		/**
		 * @hook nice_team_loop_member
		 *
		 * All actions that print HTML during the loop process should be hooked
		 * here.
		 *
		 * @since 1.0
		 *
		 * Hooked here:
		 * @see nice_team_loop_wrapper_start() - 10 (prints the opening wrapper for the current member)
		 * @see nice_team_loop_member_thumbnail() - 20 (prints the thumbnail of the current member)
		 * @see nice_team_loop_member_title() - 30 (prints the title for the current member)
		 * @see nice_team_loop_member_description() - 40 (prints the description of the current member)
		 * @see nice_team_loop_member_meta() - 50 (prints the meta data of the current member)
		 * @see nice_team_loop_wrapper_end() - 60 (prints the closing wrapper for the current member)
		 */
		do_action( 'nice_team_loop_member' );

	endwhile;
}
endif;

if ( ! function_exists( 'nice_team_loop_position' ) ) :
/**
 * Print the current loop position.
 *
 * @since  1.0
 *
 * @return int
 */
function nice_team_loop_position() {
	echo nice_team_get_loop_position();
}
endif;

if ( ! function_exists( 'nice_team_get_loop_position' ) ) :
/**
 * Obtain the current loop position.
 *
 * @since  1.0
 *
 * @return int
 */
function nice_team_get_loop_position() {
	$team = nice_team_obtain_instance();

	return $team->get_loop_position();
}
endif;

if ( ! function_exists( 'nice_team_get_the_ID' ) ) :
/**
 * Print the ID of the current member in the loop.
 *
 * @since  1.0
 *
 * @return int
 */
function nice_team_the_ID() {
	echo nice_team_get_the_ID();
}
endif;

if ( ! function_exists( 'nice_team_get_the_ID' ) ) :
/**
 * Obtain the ID of the current member in the loop.
 *
 * @since  1.0
 *
 * @return int
 */
function nice_team_get_the_ID() {
	$member = nice_team_obtain_member();

	if ( $member instanceof Nice_Team_Member ) {
		return $member->get_the_ID();
	}

	return null;
}
endif;

if ( ! function_exists( 'nice_team_get_valid_ID' ) ) :
/**
 * Check if the given ID is valid and return it in case it is.
 *
 * @since  1.0
 *
 * @param  int|WP_Post $member_id
 *
 * @return null|int
 */
function nice_team_get_valid_ID( $member_id = null ) {
	// Allow a `WP_Post` object as input parameter.
	if ( $member_id instanceof WP_Post ) {
		$member_id = $member_id->ID;
	}

	// Return early if the ID doesn't match our post type.
	if ( $member_id && nice_team_post_type_name() == get_post_type( $member_id ) ) {
		return $member_id;
	}

	return nice_team_get_the_ID();
}
endif;

if ( ! function_exists( 'nice_team_member_can_display' ) ) :
/**
 * Check if the given data of a member should be displayed.
 *
 * @since  1.0
 *
 * @param  string  $data_name
 * @param  int     $member_id
 *
 * @return bool
 */
function nice_team_member_can_display( $data_name, $member_id = null ) {
	$member = nice_team_obtain_member( nice_team_get_valid_ID( $member_id ) );
	return $member->can_display( $data_name );
}
endif;

if ( ! function_exists( 'nice_team_get_member_field' ) ) :
/**
 * Obtain meta data of a member by ID and field name.
 *
 * @since  1.0
 *
 * @param  int    $member_id
 * @param  string $field
 *
 * @return mixed
 */
function nice_team_get_member_field( $member_id = null, $field = null ) {
	$member = nice_team_obtain_member( nice_team_get_valid_ID( $member_id) );
	return $member->get_custom_fields( $field );
}
endif;

if ( ! function_exists( 'nice_team_member_position' ) ) :
/**
 * Print the position of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_position( $member_id = null ) {
	echo nice_team_get_member_position( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_url' ) ) :
/**
 * Obtain the position of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 *
 * @return string
 */
function nice_team_get_member_position( $member_id = null ) {
	return apply_filters( 'nice_team_member_position', nice_team_get_member_field( $member_id, 'position' ) );
}
endif;

if ( ! function_exists( 'nice_team_member_url' ) ) :
/**
 * Print the URL of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_url( $member_id = null ) {
	echo nice_team_get_member_url( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_url' ) ) :
/**
 * Obtain the URL of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 *
 * @return string
 */
function nice_team_get_member_url( $member_id = null ) {
	return apply_filters( 'nice_team_member_url', nice_team_get_member_field( $member_id, 'url' ) );
}
endif;

if ( ! function_exists( 'nice_team_member_email' ) ) :
/**
 * Print the email of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_email( $member_id = null ) {
	echo nice_team_get_member_email( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_email' ) ) :
/**
 * Obtain the email of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 *
 * @return string
 */
function nice_team_get_member_email( $member_id = null ) {
	return apply_filters( 'nice_team_member_email', nice_team_get_member_field( $member_id, 'email' ) );
}
endif;

if ( ! function_exists( 'nice_team_member_twitter' ) ) :
/**
 * Print the Twitter username of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_twitter( $member_id = null ) {
	echo nice_team_get_member_twitter( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_twitter' ) ) :
/**
 * Obtain the Twitter username of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 *
 * @return string
 */
function nice_team_get_member_twitter( $member_id = null ) {
	return apply_filters( 'nice_team_member_twitter', nice_team_get_member_field( $member_id, 'twitter' ) );
}
endif;

if ( ! function_exists( 'nice_team_member_facebook' ) ) :
/**
 * Print the Facebook profile URL of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_facebook( $member_id = null ) {
	echo nice_team_get_member_facebook( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_facebook' ) ) :
/**
 * Obtain the Facebook profile URL of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 *
 * @return string
 */
function nice_team_get_member_facebook( $member_id = null ) {
	return apply_filters( 'nice_team_member_facebook', nice_team_get_member_field( $member_id, 'facebook' ) );
}
endif;

if ( ! function_exists( 'nice_team_member_linkedin' ) ) :
/**
 * Print the Linkedin profile URL of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_linkedin( $member_id = null ) {
	echo nice_team_get_member_linkedin( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_linkedin' ) ) :
/**
 * Obtain the Linkedin profile URL of a team member.
 *
 * @since 1.0
 *
 * @param int $member_id
 *
 * @return string
 */
function nice_team_get_member_linkedin( $member_id = null ) {
	return apply_filters( 'nice_team_member_linkedin', nice_team_get_member_field( $member_id, 'linkedin' ) );
}
endif;

if ( ! function_exists( 'nice_team_member_description' ) ) :
/**
 * Print the description of a member by ID.
 *
 * This function prints the content of the team member, unless a valid username
 * is matched. In that case, the function prints the username's bio.
 *
 * @since 1.0
 *
 * @param int $member_id
 */
function nice_team_member_description( $member_id = null ) {
	echo nice_team_get_member_description( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_description' ) ) :
/**
 * Obtain the description of a member by ID.
 *
 * This function shows the content of the team member, unless a valid username
 * is matched. In that case, the function shows the username's bio.
 *
 * @since  1.0
 *
 * @param  int $member_id
 *
 * @return string
 */
function nice_team_get_member_description( $member_id = null ) {
	$member = nice_team_obtain_member( nice_team_get_valid_ID( $member_id ) );
	return $member->description;
}
endif;

if ( ! function_exists( 'nice_team_member_thumbnail' ) ) :
/**
 * Print the thumbnail of a member by ID.
 *
 * If no ID is given, it will be resolved from the current member inside the
 * loop.
 *
 * @since  1.0
 *
 * @param  int    $member_id
 * @param  array  $image_size
 * @param  array  $attributes
 *
 * @return string
 */
function nice_team_member_thumbnail( $member_id = null, $image_size = null, $attributes = array() ) {
	echo nice_team_get_member_thumbnail( $member_id, $image_size, $attributes );
}
endif;

if ( ! function_exists( 'nice_team_get_member_thumbnail' ) ) :
/**
 * Obtain the thumbnail of a member by ID.
 *
 * If no ID is given, it will be resolved from the current member inside the
 * loop.
 *
 * @since  1.0
 *
 * @param  int    $member_id
 * @param  array  $image_size
 * @param  array  $attributes
 *
 * @return string
 */
function nice_team_get_member_thumbnail( $member_id = null, $image_size = null, $attributes = array() ) {
	static $thumbnails = array();

	$member_id = nice_team_get_valid_ID( $member_id );
	$member    = nice_team_obtain_member( $member_id );
	$settings  = nice_team_settings();

	/**
	 * Define image size if not set yet.
	 */
	// Obtain values if called from from widget.
	if ( ! $image_size && nice_team_doing_widget() ) {
		$widget     = nice_team_current_widget();
		$image_size = array( $widget->args['thumbnail_width'], $widget->args['thumbnail_height'] );
	}

	// Obtain values if called from a shortcode. Both image_width and image_height are required.
	if ( ! $image_size && nice_team_doing_shortcode() ) {
		$shortcode    = nice_team_current_shortcode();
		$atts         = $shortcode->atts;
		$default_size = $settings['archive_image_size'];

		if (   ( $atts['image_width'] && $atts['image_width'] != $default_size['width'] )
		    || ( $atts['image_height'] && $atts['image_height'] != $default_size['height'] )
		) {
			$image_size = array(
				0 => $atts['image_width'] ? $atts['image_width'] : $atts['image_height'],
				1 => $atts['image_height'] ? $atts['image_height'] : $atts['image_width'],
			);
		}
	}

	// Obtain default/fallback values.
	if ( ! $image_size ) {
		$is_singular = is_singular( nice_team_post_type_name() );
		$image_size  = $is_singular ? 'nice-team-single' : 'nice-team-archive';
	}

	/**
	 * @hook nice_team_member_thumbnail_size
	 *
	 * Hook here to modify the size of the member thumbnail.
	 *
	 * @since 1.0
	 */
	$image_size = apply_filters( 'nice_team_member_thumbnail_size', $image_size );

	/**
	 * Define collection name.
	 */
	$collection = is_array( $image_size ) ? join( 'x', $image_size ) : $image_size;

	/**
	 * Return image, if found in the collection.
	 */
	if ( isset( $thumbnails[ $collection ][ $member_id ] ) ) {
		return $thumbnails[ $collection ][ $member_id ];
	}

	if ( ! has_post_thumbnail( $member_id ) ) {
		$gravatar_email = nice_team_get_member_field( $member_id, 'gravatar' );
		$gravatar_size = is_array( $image_size ) ? $image_size[0] : $settings['single_image_size']['width'];

		if ( $gravatar_email ) {
			$thumbnail = get_avatar( $gravatar_email, $gravatar_size );

		} elseif ( isset( $member->user ) && $user_id = $member->user->ID ) {
			$thumbnail = get_avatar( $user_id, $gravatar_size );
		}
	}

	/**
	 * Try to obtain the image using the `nice_image()` function, available in
	 * our themes.
	 */
	if ( ! isset( $thumbnail ) && function_exists( 'nice_image' ) ) {
		/**
		 * Try to get image dimensions from settings.
		 */
		switch ( $image_size ) {
			case 'nice-team-archive' :
				$width  = $settings['archive_image_size']['width'];
				$height = $settings['archive_image_size']['height'];
				break;

			case 'nice-team-single' :
				$width  = $settings['single_image_size']['width'];
				$height = $settings['single_image_size']['height'];
				break;

			default:
				$width  = is_array( $image_size ) ? intval( $image_size[0] ) : 300;
				$height = is_array( $image_size ) ? intval( $image_size[1] ) : 300;
				break;
		}

		$thumbnail = nice_image( array_merge(
				array(
					'size'   => is_string( $image_size ) ? $image_size : '',
					'width'  => $width,
					'height' => $height,
					'id'     => $member_id,
					'echo'   => false
				),
				$attributes
			)
		);
	}

	/**
	 * Use WP functionality if we couldn't get the thumbnail yet.
	 */
	if ( ! isset( $thumbnail ) ) {
		if ( isset( $attributes['attr'] ) && is_array( $attributes['attr'] ) && ! empty( $attributes['attr'] ) ) {
			$attributes = array_merge( $attributes, $attributes['attr'] );
			unset( $attributes['attr'] );
		}

		$thumbnail = get_the_post_thumbnail( $member_id, $image_size, $attributes );
	}

	if ( ! isset( $thumbnail ) ) {
		$thumbnail = null;
	}

	/**
	 * @hook nice_team_member_thumbnail
	 *
	 * Hook here to modify the output for the thumbnail.
	 *
	 * @since 1.0
	 */
	$thumbnail = apply_filters( 'nice_team_member_thumbnail', $thumbnail, $member_id );

	$thumbnails[ $collection ][ $member_id ] = $thumbnail;

	return $thumbnail;
}
endif;

if ( ! function_exists( 'nice_team_member_thumbnail_url' ) ) :
/**
 * Print the URL for the thumbnail of the member.
 *
 * @since  1.0
 *
 * @param  int $member_id
 *
 * @return string
 */
function nice_team_member_thumbnail_url( $member_id = null ) {
	echo nice_team_get_member_thumbnail_url( $member_id );
}
endif;

if ( ! function_exists( 'nice_team_get_member_thumbnail_url' ) ) :
/**
 * Obtain the URL for the thumbnail of the member.
 *
 * @since  1.0
 *
 * @param  int $member_id
 *
 * @return string
 */
function nice_team_get_member_thumbnail_url( $member_id = null ) {
	$member_id = nice_team_get_valid_ID( $member_id );
	$src       = wp_get_attachment_image_src( get_post_thumbnail_id( $member_id ), 'full' );

	/**
	 * @hook nice_team_member_thumbnail_url
	 *
	 * Hook here to modify the URL of the thumbnail.
	 *
	 * @since 1.0
	 */
	return apply_filters( 'nice_team_member_thumbnail_url', $src[0], $member_id );
}
endif;

if ( ! function_exists( 'nice_team_member_class' ) ) :
/**
 * Print HTML class(es) for the wrapper of a looped member.
 *
 * This function will only work as expected inside a loop of members.
 *
 * @see   nice_team()
 *
 * @since  1.0
 *
 * @param  string|array $class String or array containing custom classes.
 */
function nice_team_member_class( $class = '' ) {
	echo 'class="' . join( ' ', nice_team_get_member_class( nice_team_get_the_ID(), $class ) ). '"';
}
endif;

if ( ! function_exists( 'nice_team_get_member_class' ) ) :
/**
 * Print HTML class(es) for the wrapper of a looped member.
 *
 * This function will only work as expected inside a loop of members.
 *
 * @see    nice_team()
 *
 * @since  1.0
 *
 * @param  int          $member_id ID of the team member.
 * @param  string|array $class     String or array containing custom classes.
 *
 * @return array
 */
function nice_team_get_member_class( $member_id = null, $class = '' ) {
	$member_id = nice_team_get_valid_ID( $member_id );

	/**
	 * Construct class.
	 */
	$classes = array(
		'nice-team-member',
		'item',
		'team-member-' . $member_id,
	);

	/**
	 * Add the names of the terms associated to the current post.
	 */
	$terms = nice_team_get_member_categories( $member_id );
	if ( ! empty( $terms ) ) {
		foreach ( $terms as $term ) {
			$classes[] = 'term-' . $term->term_id;
		}
	}

	/**
	 * Add number of columns for grids.
	 */
	if ( ! nice_team_doing_widget() && ! nice_team_is_single() ) {
		$classes[] = 'columns-' . nice_team_get_grid_columns();
	}

	/**
	 * Add classes for single members.
	 */
	if ( nice_team_is_single() ) {
		$classes[] = 'nice-team';
		$classes[] = 'single';
		$classes[] = 'hentry';

		if ( nice_team_needs_assets() ) {
			$classes[] = 'default-styles';
		}
	}

	/**
	 * Add custom classes.
	 */
	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}

		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	/**
	 * @hook nice_team_member_class
	 *
	 * Hook here to modify the name of the class for the member wrapper.
	 *
	 * @since 1.0
	 */
	$classes = apply_filters( 'nice_team_member_class', $classes, $class, $member_id );

	return array_unique( $classes );
}
endif;

if ( ! function_exists( 'nice_team_class' ) ) :
/**
 * Print HTML class(es) for the wrapper of the list of team members.
 *
 * @see   nice_team()
 *
 * @since  1.0
 *
 * @param  string|array $class String or array containing custom classes.
 * @param  bool         $echo  Wheter to print the HTML or just return it.
 *
 * @return string
 */
function nice_team_class( $class = '', $echo = true ) {
	$html = 'class="' . esc_attr( join( ' ', nice_team_get_class( $class ) ) ) . '"';

	if ( $echo ) {
		echo $html;
	}

	return $html;
}
endif;

if ( ! function_exists( 'nice_team_get_class' ) ) :
/**
 * Print HTML class(es) for the wrapper of the list of team members.
 *
 * @see    nice_team()
 *
 * @since  1.0
 *
 * @param  string|array $class String or array containing custom classes.
 *
 * @return array
 */
function nice_team_get_class( $class = '' ) {
	/**
	 * Construct class.
	 */
	$classes = array(
		'nice-team',
	);

	/**
	 * Add classes depending on context.
	 */

	if ( ! nice_team_doing_widget() ) {
		$classes[] = 'grid';
	}

	if ( nice_team_doing_widget() ) {
		$classes[] = 'widget-team-members';
	}

	if ( nice_team_doing_shortcode() ) {
		$shortcode = nice_team_current_shortcode();

		/**
		 * Add class to avoid using the default plugin styles.
		 */
		if ( isset( $shortcode->atts['avoidcss'] ) && nice_team_bool( $shortcode->atts['avoidcss'] ) ) {
			$avoidcss = true;
		}
	}

	/**
	 * Add class to avoid using the default plugin styles, if not added yet.
	 */
	if ( empty( $avoidcss ) && nice_team_needs_assets() ) {
		$classes[] = 'default-styles';
	}

	/**
	 * Add custom classes.
	 */
	if ( ! empty( $class ) ) {
		if ( ! is_array( $class ) ) {
			$class = preg_split( '#\s+#', $class );
		}

		$classes = array_merge( $classes, $class );
	} else {
		// Ensure that we always coerce class to being an array.
		$class = array();
	}

	/**
	 * @hook nice_team_class
	 *
	 * Hook here to modify the name of the class for the team wrapper.
	 *
	 * @since 1.0
	 */
	$classes = apply_filters( 'nice_team_class', $classes, $class );

	return array_unique( $classes );
}
endif;

if ( ! function_exists( 'nice_team_grid_columns' ) ) :
/**
 * Print the number of columns for the current Team grid.
 *
 * @since  1.0
 */
function nice_team_grid_columns() {
	echo nice_team_get_grid_columns();
}
endif;

if ( ! function_exists( 'nice_team_get_grid_columns' ) ) :
/**
 * Obtain the number of columns for the current Team grid.
 *
 * @since  1.0
 *
 * @return string
 */
function nice_team_get_grid_columns() {
	$team = nice_team_obtain_instance();
	$args  = $team->args;

	if ( empty( $args['columns'] ) || $args['columns'] < 1 ) {
		$args = nice_team_settings();
	}

	return $args['columns'];
}
endif;

if ( ! function_exists( 'nice_team_get_member_categories' ) ) :
/**
 * Obtain the list of categories that a member is attached to.
 *
 * @since  1.0
 *
 * @uses  get_the_terms()
 *
 * @param  int   $member_id
 *
 * @return array
 */
function nice_team_get_member_categories( $member_id = null ) {
	$member = nice_team_obtain_member( nice_team_get_valid_ID( $member_id ) );
	return $member->categories;
}
endif;

if ( ! function_exists( 'nice_team_get_categories' ) ) :
/**
 * Obtain a list of all created team categories.
 *
 * @since  1.0
 *
 * @uses   get_categories()
 *
 * @param  array $args
 *
 * @return array
 */
function nice_team_get_categories( $args = array() ) {
	static $categories = null;

	if ( ! is_null( $categories ) ) {
		return $categories;
	}

	$categories = get_categories( array_merge( $args, array(
			'taxonomy' => nice_team_category_name()
		)
	) );

	return $categories;
}
endif;

/** ==========================================================================
 *  HTML Handlers.
 *  ======================================================================= */

if ( ! function_exists( 'nice_team_archive_title' ) ) :
/**
 * Print the title of the current archive.
 *
 * @since 1.0
 */
function nice_team_archive_title() {
	echo nice_team_get_archive_title();
}
endif;

if ( ! function_exists( 'nice_team_get_archive_title' ) ) :
/**
 * Obtain the title of an archive page.
 *
 * @since  1.0
 *
 * @return string
 */
function nice_team_get_archive_title() {
	$title = function_exists( 'get_the_archive_title' ) ? get_the_archive_title() : esc_html__( 'Members Archive', 'nice-team' );

	/**
	 * @hook nice_team_archive_title
	 *
	 * Hook here if you want to modify the archive's title.
	 *
	 * @since 1.0
	 */
	$title = apply_filters( 'nice_team_archive_title', $title );

	return $title;
}
endif;

if ( ! function_exists( 'nice_team_category_title' ) ) :
/**
 * Print the title of the current category.
 *
 * @since 1.0
 */
function nice_team_category_title() {
	echo nice_team_get_category_title();
}
endif;

if ( ! function_exists( 'nice_team_get_category_title' ) ) :
/**
 * Obtain the title of the current category.
 *
 * @since 1.0
 */
function nice_team_get_category_title() {
	$category = nice_team_category_name();
	$term     = get_term_by( 'slug', $GLOBALS[ $category ], $category );

	/**
	 * @hook nice_team_category_title
	 *
	 * Hook here if you want to modify the category's title.
	 *
	 * @since 1.0
	 */
	$title = apply_filters( 'nice_team_category_title', $term->name );

	return $title;
}
endif;

if ( ! function_exists( 'nice_team_the_title' ) ) :
/**
 * Prints out the title of the current page.
 *
 * Use this function only to display top-level page titles. It will not work for
 * titles within loops.
 *
 * @since 1.0
 *
 * @uses  nice_team_get_title()
 *
 * @param string $before HTML to display before the title.
 * @param string $after  HTML to display after the title.
 */
function nice_team_the_title( $before = '', $after = '' ) {
	echo $before . nice_team_get_title() . $after; // WPCS: XSS ok.
}
endif;

if ( ! function_exists( 'nice_team_get_title' ) ) :
/**
 * Obtain the title of the current page.
 *
 * Use this function only to obtain top-level page titles. It will not work for
 * titles within loops.
 *
 * @since 1.0
 */
function nice_team_get_title() {
	$title = get_the_title();

	/**
	 * @hook nice_team_the_title
	 *
	 * All modifications to the page title in team pages should be hooked
	 * here.
	 *
	 * @since 1.0
	 *
	 * Hooked here:
	 * @see nice_team_setup_category_page() - 10 (returns the current category title)
	 * @see nice_team_setup_tag_page() - 10 (returns the current tag title)
	 * @see nice_team_setup_archive_page() - 10 (returns the current archive title)
	 */
	$title = apply_filters( 'nice_team_the_title', $title );

	return $title;
}
endif;

/** ==========================================================================
 *  Navigation.
 *  ======================================================================= */

if ( ! function_exists( 'nice_team_page_navigation_id' ) ) :
/**
 * Print the ID for the main HTML element in page navigation.
 *
 * @since  1.0
 */
function nice_team_page_navigation_id() {
	echo esc_attr( nice_team_get_page_navigation_id() );
}
endif;

if ( ! function_exists( 'nice_team_get_page_navigation_id' ) ) :
/**
 * Obtain the ID for the main HTML element in page navigation.
 *
 * @since  1.0
 *
 * @return string
 */
function nice_team_get_page_navigation_id() {
	$html_id = 'nice-team-nav';

	$locations = array(
		'nice-team-category-nav' => nice_team_is_category(),
		'nice-team-archive-nav'  => nice_team_is_archive(),
	);

	foreach ( $locations as $id => $value ) {
		if ( $value ) {
			$html_id = $id;
			break;
		}
	}

	/**
	 * @hook nice_team_page_navigation_id
	 *
	 * Hook here if you want to modify the ID of page navigation.
	 *
	 * @since 1.0
	 */
	$html_id = apply_filters( 'nice_team_page_navigation_id', $html_id );

	return $html_id;
}
endif;

if ( ! function_exists( 'nice_team_sidebar' ) ) :
/**
 * Load a sidebar in the current page.
 *
 * @uses get_sidebar()
 * @link https://codex.wordpress.org/Function_Reference/get_sidebar
 *
 * Remove this action using:
 *
	remove_action( 'nice_team_sidebar', 'nice_team_sidebar', 10 );
 *
 * Then you can use `get_sidebar()` to display your custom sidebar anywhere you want.
 *
 * @since 1.0
 */
function nice_team_sidebar() {
	/**
	 * Load the `sidebar.php file` in the root folder of your theme.
	 *
	 * If you want to use a specific sidebar for team pages, create the file
	 * `sidebar-nice-team.php` in the root folder of your theme.
	 */
	get_sidebar( 'nice-team' );
}
endif;
