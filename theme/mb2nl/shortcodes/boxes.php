<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'boxes', 'mb2_shortcode_boxes' );
mb2_add_shortcode( 'boxesimg', 'mb2_shortcode_boxes' );
mb2_add_shortcode( 'boxesicon', 'mb2_shortcode_boxes' );
mb2_add_shortcode( 'boxescontent', 'mb2_shortcode_boxes' );

function mb2_shortcode_boxes ( $atts, $content = null ){
	extract( mb2_shortcode_atts( array(
		'columns' => 1, // max 5
		'type' => 1,
		'mt' => 0,
		'mb' => 0, // 0 because box item has margin bottom 30 pixels
		'gutter' => 'normal',
		'linkbtn' => 0,
		'desc' => 1,
		'btntext' => '',
		'color' => 'primary',
		'custom_class' => ''
	), $atts ) );

	$output = '';
	$style = '';
	$cls = '';

	// Global values
	$GLOBALS['boxlinkbtn'] = $linkbtn;
	$GLOBALS['boxbtntext'] = $btntext;
	$GLOBALS['boxtype'] = $type;
	$GLOBALS['boxcolor'] = $color;
	$GLOBALS['boxdesc'] = $desc;

	$cls .= ' type-' . $type;
	$cls .= ' gutter-' . $gutter;
	$cls .= ' theme-col-' . $columns;
	$cls .= $custom_class ? ' ' . $custom_class : '';

	if ( $mt || $mb )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '"';
	}

	$output .= '<div class="theme-boxes' . $cls . ' clearfix"' . $style . '>';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';

	// Unset global values
	unset( $GLOBALS['boxlinkbtn'] );
	unset( $GLOBALS['boxbtntext'] );
	unset( $GLOBALS['boxtype'] );
	unset( $GLOBALS['boxcolor'] );
	unset( $GLOBALS['boxdesc'] );

	return $output;

}




mb2_add_shortcode('boxcontent', 'mb2_shortcode_boxcontent');

function mb2_shortcode_boxcontent ($atts, $content = null){
	extract(mb2_shortcode_atts( array(
		'icon' =>'',
		'type' => '',
		'title'=> '',
		'link' =>'',
		'linktext' =>'Read more',
		'color' => 'primary',
		'link_target' =>'',
		'target' =>''
	), $atts));

	$output = '';
	$istarget = $target ? $target : $link_target;

	if ($type === '' && isset( $GLOBALS['boxtype'] ) )
	{
		$type = $GLOBALS['boxtype'];
	}

	$pref = theme_mb2nl_font_icon_prefix($icon);
	$boxCls = $icon !='' ? ' isicon' : ' noicon';
	$boxCls .= $link !='' ? ' islink' : '';

	$output .= '<div class="theme-box">';

	$output .= '<div class="theme-boxcontent type-' . $type . ' color-' . $color . $boxCls . '">';
	$output .= '<div class="theme-boxcontent-content">';
	$output .=  $icon !='' ?'<div class="theme-boxcontent-icon">' : '';
	$output .=  $icon !='' ? '<i class="' . $pref . $icon . '"></i>' : '';
	$output .=  $icon !='' ?'</div>' : '';
	$output .= $title !='' ? '<h4>' . format_text($title, FORMAT_HTML) . '</h4>' : '';
	$output .= mb2_do_shortcode(format_text($content, FORMAT_HTML));
	$output .= $link !='' ? '<div class="theme-boxcontent-readmore"><a class="btn btn-sm" href="' . $link . '" target="' . $istarget . '">' . $linktext . '</a></div>' : '';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
