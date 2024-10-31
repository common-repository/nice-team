=== Nice Team ===
Contributors: nicethemes
Tags: team, members, widget, shortcode, template-tag, services, responsive
Requires at least: 3.6
Tested up to: 4.8
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A great and powerful plugin to show information about your team members.

== Description ==

= The most powerful team plugin you've ever seen =

**Nice Team** displays information about your team members in a clean, responsive and beautiful way. You can show team members using a shortcode, widgets or template tags (PHP functions).

This plugin is fully integrated with WordPress. It makes use of its native architecture to show team members, and includes a huge set of hooks, so you can customize it in any way you need.

**Nice Team** works right out of the box with any theme.

= Comprehensive settings page =

Define how your members are displayed without having to code with our intuitive settings page. You can set the maximum number of members to show, the number of columns to use, which fields to display, how items should be ordered, the size of your images, and a lot more.

= Member information =

Full details such as member image, position, website, teams and extensive contact information.

= Templating system =

Though Nice Team works right out of the box with any theme, you can customize how your members look even more by using your own template files instead of the default ones. Just drop them into your theme's folder and you're done :)

= Shortcode =

You can use the `team` shortcode to show your team members anywhere you want.

= Widget =

Display lists of team members using a widget instead of having them in the content of a page or post.

= Mobile friendly =

**Nice Team** includes a responsive layout, and gives you the possibility to define the number of columns you want to show.

= Developer friendly =

**Nice Team** is developed following the [WordPress Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards). It relies on the native templating architecture of WordPress (archives and single pages), and includes a huge set of hooks and pluggable functions and classes, so you can customize it in any way you need.

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the "Add New" link in the plugins dashboard.
2. Search for "Nice Team".
3. Click "Install Now".
4. Activate the plugin on the Plugin dashboard.

= Uploading in WordPress Dashboard =

1. Navigate to the "Add New" in the plugins dashboard.
2. Navigate to the "Upload" area.
3. Select `nice-team.zip` from your computer.
4. Click "Install Now".
5. Activate the plugin in the Plugin dashboard.

= Using FTP =

1. Download `nice-team.zip`.
2. Extract the `nice-team` directory to your computer.
3. Upload the `nice-team` directory to the `/wp-content/plugins/` directory.
4. Activate the plugin in the Plugin dashboard.


== Frequently Asked Questions ==

= How to set up the plugin? =

Once you installed and activated the plugin, you can go to *Team > Settings* and tweak the options there.

Those settings will also be used as the default ones for the shortcode and template tag when you're not specifying any values for them.

= How to use the shortcode? =

The basic usage of the shortcode is just `[team]`. That will display a list of your members using the settings you entered in *Team > Settings*.

However, you can specify values for the shortcode using the following fields:

* `id`: Numeric ID of a single member (in case you want to display just one).
* `columns`: The number of columns to be displayed in a team gallery.
* `limit`: The number of members to be displayed in a team gallery. A value of zero means nothing will be displayed. Use `-1` for no limit.
* `image_size`: Size (in pixels) for the member's image.
* `orderby`: The ordering criteria that will be used to display your members. Accepted values: `ID`, `title`, `menu_order`, `date`, `random`.
* `order`: The sorting criteria that will be used to display your members. Accepted values: `asc` (ascendant), `desc` (descendant).
* `category`: Comma-separated numeric IDs of team categories (teams) that you want to display. A value of zero means that all categories will be considered.
* `exclude_category`: Comma-separated numeric IDs of team categories (teams) that you want to exclude. A value of zero means that no categories will be excluded.
* `include_children`: Choose if you want to show members of sub-categories (or sub-teams) in the list. Accepted values: `1` (show), `0` (hide).
* `member`: Show or hide the name of the member. Accepted values: `1` (show), `0` (hide).
* `thumbnail`: Show or hide the image of the member. Accepted values: `1` (show), `0` (hide).
* `url`: Show or hide the link to the member's website. Accepted values: `1` (show), `0` (hide).
* `email`: Show or hide the member's email. Accepted values: `1` (show), `0` (hide).
* `twitter`: Show or hide the link to the member's Twitter profile. Accepted values: `1` (show), `0` (hide).
* `facebook`: Show or hide the link to the member's Facebook profile. Accepted values: `1` (show), `0` (hide).
* `linkedin`: Show or hide the link to the member's LinkedIn profile. Accepted values: `1` (show), `0` (hide).
* `avoidcss`: Choose if you want to remove the default styles for the current list of members. Accepted values: `1` (avoid styles), `0` (not avoid styles).
* `display_empty_message`: Choose if you want to display a message when the current list has no members. Accepted values: `1` (show message), `0` (not show message).

If any of these values is not declared explicitly, the default value will be the one set in *Team > Settings*.

A typical usage of the shortcode with these fields would be the following:

`[team columns="2" limit="5" orderby="date" order="asc" category="20,34"]`

= How to use the template tag (PHP function)? =

You can include members in your own templates by using our `nice_team()` function. This is a very basic usage example:

```
<?php
if ( function_exists( 'nice_team' ) ) :
	nice_team();
endif;
?>
```

As it happens with the shortcode, that code snippet will display a list of your members using the settings you entered in *Team > Settings*. However, you can give the function an array of options with specific values on how to show the list of members:

* `id`: Numeric ID of a single member (in case you want to display just one).
* `columns`: The number of columns to be displayed in a team gallery.
* `limit`: The number of members to be displayed in a team gallery. A value of zero means nothing will be displayed. Use `-1` for no limit.
* `image_size`: Size (in pixels) for the member's image.
* `orderby`: The ordering criteria that will be used to display your members. Accepted values: `ID`, `title`, `menu_order`, `date`, `random`.
* `order`: The sorting criteria that will be used to display your members. Accepted values: `asc` (ascendant), `desc` (descendant).
* `category`: Comma-separated numeric IDs of team categories (teams) that you want to display. A value of zero means that all categories will be considered.
* `exclude_category`: Comma-separated numeric IDs of team categories (teams) that you want to exclude. A value of zero means that no categories will be excluded.
* `include_children`: Choose if you want to show members of sub-categories (or sub-teams) in the list. Accepted values: `1` (show), `0` (hide).
* `member`: Show or hide the name of the member. Accepted values: `1` (show), `0` (hide).
* `thumbnail`: Show or hide the image of the member. Accepted values: `1` (show), `0` (hide).
* `url`: Show or hide the link to the member's website. Accepted values: `1` (show), `0` (hide).
* `email`: Show or hide the member's email. Accepted values: `1` (show), `0` (hide).
* `twitter`: Show or hide the link to the member's Twitter profile. Accepted values: `1` (show), `0` (hide).
* `facebook`: Show or hide the link to the member's Facebook profile. Accepted values: `1` (show), `0` (hide).
* `linkedin`: Show or hide the link to the member's LinkedIn profile. Accepted values: `1` (show), `0` (hide).
* `avoidcss`: Choose if you want to remove the default styles for the current list of members. Accepted values: `1` (avoid styles), `0` (not avoid styles).
* `display_empty_message`: Choose if you want to display a message when the current list has no members. Accepted values: `1` (show message), `0` (not show message).

If any of these values is not declared explicitly, the default value will be the one set in *Team > Settings*.

Using these options, you can have something like this in your code:

```
<?php
if ( function_exists( 'nice_team' ) ) :
	nice_team( array(
		'columns'  => 2,
		'limit'    => 5,
		'orderby'  => 'date',
		'order'    => 'asc',
		'category' => '20,32',
	) );
endif;
?>
```

= How can I change the slug of my members? =

By default, the links to your members will look something like `http://my-site.me/team/member-name`. If you want to change that `team` base to something more fit to your needs, you can do so going to *Team > Settings > Advanced*, and modifying the "Member Slug" option.

= How can I use my own CSS? =

You can load a custom stylesheet by using [wp_enqueue_script()](http://codex.wordpress.org/Function_Reference/wp_enqueue_script) and adding your custom CSS to your own file. However, if you *really* want to get rid of the default CSS of Nice Team, so you can avoid overriding our styles, you can check the "Avoid Plugin CSS" option in *Team > Settings*.

= How can I use my custom templates? =

Inside `wp-content/plugins/nice-team/templates` you will find the following default templates:

* `team-member`: The default template for all single team members.
* `team-category`: The default template for a team's index.
* `team-archive`: The default template for the index of the `team_member` custom post type.

All you need to do is copy these files to `wp-content/themes/my-theme/team`, and modify them to your own needs.

If you want more specific templates, you can take a look at the [Template Hierarchy](http://codex.wordpress.org/Template_Hierarchy) article in the Codex.

== Screenshots ==

1. Team Settings page.
2. Team member details.
3. How team members look.

== Changelog ==

= 1.0.2 =
* Fix: Obtain admin path using `ABSPATH` constant.

= 1.0.1 =
* Specify thumbnail size when obtaining team member images using `nice_image()`.
* Make `nice_team_class()` returnable.
* Make text domains load on `plugins_loaded`.
* Fix potential edge case concerning current select values not being correctly pre-selected inside meta boxes.

= 1.0 =
* First public release.
