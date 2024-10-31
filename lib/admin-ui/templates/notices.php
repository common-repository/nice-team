<?php
/**
 * NiceThemes Admin UI.
 *
 * Default template for admin notices in the admin UI.
 *
 * You can use the following helper variables here:
 *
	$ui                = (Nice_Team_Portfolio_Admin_UI)              $ui;
	$name              = (string)                     $ui->name;
	$title             = (string)                     $ui->title;
	$logo              = (string)                     $ui->logo;
	$sidebar_boxes     = (array)                      $ui->sidebar_boxes;
	$footer_links      = (array)                      $ui->footer_links;
	$sections          = (array)                      $ui->sections;
	$current_section   = (string)                     $ui->current_section;
	$current_tab       = (string)                     $ui->current_tab;
	$current_tab_group = (array)                      $ui->current_tab_group;
	$section           = (array)                      $ui->sections[ $current_section ];
	$html              = (Nice_Team_Portfolio_Admin_UI_HTML_Handler) $ui->html_handler;
 *
 * @package Nice_Team_Portfolio_Admin_UI
 * @since   1.0
 */
?>
	<?php if ( $ui instanceof Nice_Team_Admin_UI ) : ?>
		<?php $html->wp_notices(); ?>
	<?php endif; ?>
