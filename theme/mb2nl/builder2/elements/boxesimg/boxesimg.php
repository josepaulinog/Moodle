<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('mb2pb_boxesimg', 'mb2_shortcode_mb2pb_boxesimg');
mb2_add_shortcode('mb2pb_boxesimg_item', 'mb2_shortcode_mb2pb_boxesimg_item');

function mb2_shortcode_mb2pb_boxesimg ($atts, $content= null){

	$atts2 = array(
		'id' => 'boxesimg',
		'columns' => 2, // max 5
		'type' => 1,
		'mt' => 0,
		'mb' => 0, // 0 because box item has margin bottom 30 pixels
		'custom_class' => '',
		'gutter' => 'normal',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$style = '';
	$cls = '';

	$cls .= ' type-' . $type;
	$cls .= ' gutter-' . $gutter;
	$cls .= ' theme-col-' . $columns;
	$cls .= $custom_class ? ' ' . $custom_class : '';
	$templatecls = $template ? ' mb2-pb-template-boxesimg' : '';

	if ( $mt || $mb )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '"';
	}

	$content = $content;

	if ( ! $content )
	{
		$demoimage = theme_mb2nl_page_builder_demo_image( '600x354' );

		for (  $i = 1; $i <= 2; $i++ )
		{
			$content .= '[mb2pb_boxesimg_item image="' . $demoimage . '" ]Box title here[/mb2pb_boxesimg_item]';
		}
	}

	$output .= '<div class="mb2-pb-element mb2-pb-boxesimg' . $templatecls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'boxesimg' );
	$output .= '<div class="mb2-pb-element-inner theme-boxes' . $cls . '">';
	$output .= '<div class="mb2-pb-sortable-subelements">';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}


function mb2_shortcode_mb2pb_boxesimg_item ($atts, $content = null){

	$atts2 = array(
		'id' => 'boxesimg_item',
		'image' => theme_mb2nl_page_builder_demo_image( '600x354' ),
		'link' =>'',
		'link_target' => 0,
		'color' =>'',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$title_color_span = '';

	$style = $color !== '' ? ' style="background-color:' . $color . ';"' : '';
	$title_color_span = '<span class="theme-boximg-color"' . $style . '></span>';

	$content = ! $content ? 'Box title here' : $content;
	$atts2['text'] = $content;

	$output .= '<div class="mb2-pb-subelement mb2-pb-boxesimg_item theme-box"' . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= theme_mb2nl_page_builder_el_actions( 'subelement' );
	$output .= '<div class="subelement-helper"></div>';
	$output .= '<div class="mb2-pb-subelement-inner">';
	$output .= '<div class="theme-boximg">';
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
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
