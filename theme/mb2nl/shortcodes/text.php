<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'text', 'mb2_shortcode_text' );

function mb2_shortcode_text ( $atts, $content = null ){

	extract(mb2_shortcode_atts( array(
		'align' => 'none',
		'size' => 'n',
		'sizerem' => 1,
		'fweight' => 300,
		'lspacing' => 0,
		'wspacing' => 0,
		'color' => 'nocolor',
		'showtitle' => 0,
		'upper' => 0,
		'title' => '',
		'mt' => 0,
		'mb' => 30,
		'custom_class'=> ''
	), $atts));

	$output = '';
	$style = '';
	$cls = '';

	$cls .= $custom_class ? ' ' . $custom_class : '';
	$cls .= ' align-' . $align;
	//$cls .= ' text-' . $size;
	$cls .= ' ' . theme_mb2nl_heading_cls( $sizerem );
	$cls .= ' upper' . $upper;
	$cls .= ' text-' . $color;

	// Text container style
	if ( $mt || $mb || $color || $sizerem || $fweight || $lspacing != 0 || $wspacing != 0 )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= $color ? 'color:' . $color . ';' : '';
		$style .= $fweight ? 'font-weight:' . $fweight . ';' : '';
		$style .= $lspacing != 0 ? 'letter-spacing:' . $lspacing . 'px;' : '';
		$style .= $wspacing != 0 ? 'word-spacing:' . $wspacing . 'px;' : '';
		$style .= $sizerem ? 'font-size:' . $sizerem . 'rem;' : '';
		$style .= '"';
	}

	$output .= '<div class="theme-text' . $cls . '"' . $style . '>';
	$output .= ( $showtitle && $title ) ? '<h4 class="theme-text-title">' . format_text( $title, FORMAT_HTML ) . '</h4>' : '';
	$output .= '<div class="theme-text-text">';
	$output .= format_text( $content, FORMAT_HTML );
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
