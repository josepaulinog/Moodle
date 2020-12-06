<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'boxesimg_item', 'mb2_shortcode_boxesimg_item' );
mb2_add_shortcode( 'boximg', 'mb2_shortcode_boxesimg_item' ); // This is old shortcode

function mb2_shortcode_boxesimg_item( $atts, $content = null ){
	extract( mb2_shortcode_atts( array(
		'image' =>'',
		'link' =>'',
		'type' => '',
		'link_target' => 0,
		'target' => 0,
		'color' =>'',
		'useimg' => 1
	), $atts ) );

	$output = '';
	$cls = '';
	$title_color_span = '';

	//$cls .= preg_match( '@#@', $color ) || preg_match( '@rgb\(@', $color ) ? ' opcolor' : '';
	$cls .= preg_match( '@#@', $color ) ? ' opcolor' : '';

	$link_target = $target ? $target : $link_target;
	$target =  $link_target ? ' target="_balnk"' : '';

	$style = $color !== '' ? ' style="background-color:' . $color . ';"' : '';
	$title_color_span = '<span class="theme-boximg-color"' . $style . '></span>';

	$boxCls = $useimg == 1 ? ' useimg' : '';

	$output .= '<div class="theme-box">';
	$output .= $link !== '' ? '<a href="' . $link . '"' . $target . '>' : '';
	$output .= '<div class="theme-boximg' . $cls . '">';
	$output .= '<div class="vtable-wrapp">';
	$output .= '<div class="vtable">';
	$output .= '<div class="vtable-cell">';
	$output .= '<h4 class="box-title"><span class="box-title-text">' . format_text( $content, FORMAT_HTML ) . '</span>' . $title_color_span . '</h4>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<img class="theme-boximg-img" src="' . $image . '" alt="">';
	$output .= '<div class="theme-boximg-color"' . $style . '></div>';
	$output .= '</div>';
	$output .= $link !== '' ? '</a>' : '';
	$output .= '</div>';

	return $output;

}
