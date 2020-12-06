<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2pb_announcements', 'mb2_shortcode_mb2pb_announcements' );

function mb2_shortcode_mb2pb_announcements( $atts, $content = null ) {

	$atts2 = array(
		'id' => 'announcements',
		'limit' => 8,
		'carousel' => 0,
		'columns' => 3,
		'sloop' => 0,
		'snav' => 1,
		'sdots' => 0,
		'autoplay' => 0,
		'pausetime' => 5000,
		'animtime' => 450,
		'desclimit' => 25,
		'titlelimit' => 6,
		'details' => 1,
		'gutter' => 'normal',
		'linkbtn' => 0,
		'btntext' => '',
		'image' => 1,
		'itemdate' => 0,
		'prestyle' => 'none',
		'custom_class' => '',
		'colors' => '',
		'mt' => 0,
		'mb' => 30,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$cls = '';
	$list_cls = '';
	$col_cls = '';
	$style = '';

	// Set column style
	$col = 0;
	$col_style = '';
	$list_style = '';

	$annoopts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$announcements = theme_mb2nl_shortcodes_announcements_get_items( $annoopts );
	$itemCount = count( $announcements );

	// Carousel layout
	$list_cls .= $carousel ? ' owl-carousel' : '';
	$list_cls .= ! $carousel ? ' theme-boxes theme-col-' . $columns : '';
	$list_cls .= ! $carousel ? ' gutter-' . $gutter : '';

	$cls .= ' prestyle' . $prestyle;
	$cls .= $template ? ' mb2-pb-template-announcements' : '';

	if ( $mt || $mb )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '"';
	}

	$output .= '<div class="mb2-pb-content mb2-pb-element mb2-pb-announcements clearfix' . $cls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'announcements' );
	$output .= '<div class="mb2-pb-content-inner mb2-pb-element-inner clearfix">';
	$output .= '<div class="mb2-pb-content-list' . $list_cls . '">';

	if ( ! $itemCount )
	{
		$output .= '<div class="theme-box">';
		$output .= get_string( 'nothingtodisplay' );
		$output .= '</div>';
	}

	$output .= theme_mb2nl_shortcodes_content_template( $announcements, $annoopts );

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
