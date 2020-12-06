<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'video', 'mb2_shortcode_videoweb' );
mb2_add_shortcode( 'videoweb', 'mb2_shortcode_videoweb' );
mb2_add_shortcode( 'videolocal', 'mb2_shortcode_videolocal' );

function mb2_shortcode_videoweb( $atts, $content = null )
{
	extract( mb2_shortcode_atts( array(
		'width' => 800,
		'id' => '',
		'videoid' => '',
		'videourl' => '',
		'video_text' => '',
		'ratio' => '16:9',
		'mt' => 0,
		'mb' => 30,
		'bg_image' => '',
		'custom_class' => ''
	), $atts ) );

	$output = '';
	$style = '';
	$cls = '';

	$cls .= $custom_class ? ' ' . $custom_class : '';

	// User use old shortcode with video id
	if ( $id && ! $videourl )
	{
		$videourl = $id;
	}

	// User use updated shortcode in page builder
	if ( $videoid )
	{
		$videourl = $videoid;
	}

	$videourl = theme_mb2nl_get_video_url( $videourl );
	$isratio = str_replace(':', 'by', $ratio);

	if ( $mt || $mb || $width )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= $width ? 'max-width:' . $width .'px;' : '';
		$style .= '"';
	}

	$output .= '<div class="embed-responsive-wrap ' . $cls . '"' . $style . '>';
	$output .= '<div class="embed-responsive-wrap-inner">';
	$output .= '<div class="embed-responsive embed-responsive-'. $isratio . '">';
	$output .= '<iframe class="videowebiframe" src="' . $videourl . '?showinfo=0&rel=0" allowfullscreen></iframe>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}


function mb2_shortcode_videolocal( $atts, $content = null )
{
	extract( mb2_shortcode_atts( array(
		'width' => 800,
		'videofile' => '',
		'video_text' => '',
		'mt' => 0,
		'mb' => 30,
		'custom_class' => '',
	), $atts ) );

	$output = '';
	$style = '';
	$cls = '';

	$cls .= $custom_class ? ' ' . $custom_class : '';

	if ( $mt || $mb || $width )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= $width ? 'max-width:' . $width .'px;' : '';
		$style .= '"';
	}

	$output .= '<div class="theme-videolocal mb2-pb-element mb2pb-videolocal' . $cls . '"' . $style . '>';
	$output .= '<div class="theme-videolocal-inner">';

	if ( $videofile )
	{
		$output .= '<video controls="true">';
		$output .= '<source src="' . $videofile . '">';
		$output .= '</video>';
	}

	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
