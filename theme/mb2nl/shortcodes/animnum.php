<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'animnum', 'mb2_shortcode_animnum' );
mb2_add_shortcode( 'animnum_item', 'mb2_shortcode_animnum_item' );

function mb2_shortcode_animnum ( $atts, $content = null ){
	extract( mb2_shortcode_atts( array(
		'columns' => 4, // max 5
		'mt' => 0,
		'mb' => 0, // 0 because box item has margin bottom 30 pixels
		'pv' => 30,
		'icon' => 0,
		'subtitle' => 0,
		'gutter' => 'normal',
		'aspeed' => 10000,
		'size_number' => 3,
		'fw_number' => 400,
		'size_icon' => 3,
		'color_icon' => '',
		'color_number' => '',
		'color_title' => '',
		'color_subtitle' => '',
		'color_bg' => '',
		'custom_class' => ''
	), $atts));

	$output = '';
	$cls = '';
	$style = '';

	$GLOBALS['size_number'] = $size_number;
	$GLOBALS['size_icon'] = $size_icon;
	$GLOBALS['color_icon'] = $color_icon;
	$GLOBALS['color_number'] = $color_number;
	$GLOBALS['color_title'] = $color_title;
	$GLOBALS['color_subtitle'] = $color_subtitle;
	$GLOBALS['color_bg'] = $color_bg;
	$GLOBALS['animnumicon'] = $icon;
	$GLOBALS['animnumsubtitle'] = $subtitle;
	$GLOBALS['animnumpv'] = $pv;
	$GLOBALS['animnufw_number'] = $fw_number;

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

	$output .= '<div class="mb2-pb-animnum theme-boxes' . $cls . ' clearfix" data-aspeed="' . $aspeed . '"' . $style . '>';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';

	return $output;

}





function mb2_shortcode_animnum_item ($atts, $content = null){
	extract(mb2_shortcode_atts( array(
		'number' => 0,
		'icon' => 'fa fa-graduation-cap',
		'title' => '',
		'color_icon' => '',
		'color_number' => '',
		'color_title' => '',
		'color_subtitle' => '',
		'color_bg' => '',
		'subtitle' => '',
	), $atts));

	$output = '';
	$con_pref = theme_mb2nl_font_icon_prefix( $icon );
	$size_number = isset( $GLOBALS['size_number'] ) ? $GLOBALS['size_number'] : 3;
	$size_icon = isset( $GLOBALS['size_icon'] ) ? $GLOBALS['size_icon'] : 3;
	$color_icon_style = '';
	$color_number_style = '';
	$color_title_style = '';
	$color_subtitle_style = '';
	$color_bg_style = '';

	if ($color_icon || $GLOBALS['color_icon'])
	{
		$color = $color_icon ? $color_icon : $GLOBALS['color_icon'];
		$color_icon_style = 'color:' . $color . ';';
	}

	if ( $color_number || $GLOBALS['color_number'] || $GLOBALS['animnufw_number'] )
	{
		$color = $color_number ? $color_number : $GLOBALS['color_number'];
		$color_number_style = 'color:' . $color . ';font-weight:' . $GLOBALS['animnufw_number'] . ';';
	}

	if ($color_title || $GLOBALS['color_title'])
	{
		$color = $color_title ? $color_title : $GLOBALS['color_title'];
		$color_title_style = ' style="color:' . $color . ';"';
	}

	if ($color_subtitle || $GLOBALS['color_subtitle'])
	{
		$color = $color_subtitle ? $color_subtitle : $GLOBALS['color_subtitle'];
		$color_subtitle_style = ' style="color:' . $color . ';"';
	}

	if ( $color_bg || $GLOBALS['color_bg'] || $GLOBALS['animnumpv'] )
	{
		$color = $color_bg ? $color_bg : $GLOBALS['color_bg'];

		$color_bg_style .= ' style="';
		$color_bg_style .= $color ? 'background-color:' . $color . ';' : '';

		if ( $GLOBALS['animnumpv'] )
		{
			$color_bg_style .= 'padding-top:' . $GLOBALS['animnumpv'] . 'px;';
			$color_bg_style .= 'padding-bottom:' . $GLOBALS['animnumpv'] . 'px;';
		}

		$color_bg_style .= '"';
	}

	$output .= '<div class="theme-box">';
	$output .= '<div class="pbanimnum-item"' . $color_bg_style . ' data-number="' . $number . '">';

	if ( $GLOBALS['animnumicon'] )
	{
		$output .= '<div class="pbanimnum-icon" style="font-size:' . $size_icon. 'rem;' . $color_icon_style . '"><i class="' . $con_pref . $icon . '"></i></div>';
	}

	$output .= '<span class="pbanimnum-number" style="font-size:' . $size_number . 'rem;' . $color_number_style . '">0</span>';

	$output .= '<div class="pbanimnum-text">';
	$output .= $title ? '<h4 class="pbanimnum-title"' . $color_title_style . '>' . $title . '</h4>' : '';
	$output .= $GLOBALS['animnumsubtitle'] ? '<span class="pbanimnum-subtitle"' . $color_subtitle_style . '>' . $subtitle . '</span>' : '';
	$output .= '</div>';

	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
