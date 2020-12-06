<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('heading', 'mb2_shortcode_heading');

function mb2_shortcode_heading ( $atts, $content = null ){

	extract(mb2_shortcode_atts( array(
		'tag'=> 'h4',
		'size' => 'default',
		'align' =>'none',
		'fweight' => 400,
		'lspacing' => 0,
		'wspacing' => 0,
		'upper' => 0,
		'mt' => 0,
		'mb' => 30,
		'color' => '',
		'custom_class'=> ''
	), $atts));

	$output = '';
	$style = '';

	$cls = $custom_class !='' ? ' ' . $custom_class : '';
	$cls .= ' heading-' . $align;
	$cls .= ' upper' . $upper;
	//$cls .= ' hsize-' . $size;
	$cls .= ' ' . theme_mb2nl_heading_cls( $size );

	if ( $mt || $mb || $color || $fweight || $size || $lspacing != 0 || $wspacing != 0 )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= $color ? 'color:' . $color . ';' : '';
		$style .= $fweight ? 'font-weight:' . $fweight . ';' : '';
		$style .= $lspacing != 0 ? 'letter-spacing:' . $lspacing . 'px;' : '';
		$style .= $wspacing != 0 ? 'word-spacing:' . $wspacing . 'px;' : '';
		$style .= $size ? 'font-size:' . $size . 'rem;' : '';
		$style .= '"';
	}

	$output .= '<' . $tag . $style . ' class="heading' . $cls . '">';
	$output .= format_text( $content, FORMAT_HTML );
	$output .= '</' . $tag . '>';

	return $output;


}
