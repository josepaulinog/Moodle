<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2pb_videoweb', 'mb2_shortcode_mb2pb_videoweb' );

function mb2_shortcode_mb2pb_videoweb( $atts, $content = null )
{
	$atts2 = array(
		'id' => 'videoweb',
		'width' => 800,
		'videourl' => 'https://youtu.be/wop3FMhoLGs',
		'video_text' => '',
		'ratio'=> '16:9',
		'mt' => 0,
		'mb' => 30,
		'custom_class' => '',
		'template' => ''
	);

	$atts['id'] = $atts2['id'];

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$style = '';
	$cls = '';

	$cls .= $template ? ' mb2-pb-template-videoweb' : '';
	$cls .= $custom_class ? ' ' . $custom_class : '';

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

	$output .= '<div class="embed-responsive-wrap mb2-pb-element mb2pb-videoweb' . $cls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'videoweb' );
	$output .= '<div class="embed-responsive-wrap-inner">';
	$output .= '<div class="embed-responsive embed-responsive-'. $isratio . '">';
	$output .= '<iframe class="videowebiframe" src="' . $videourl . '?showinfo=0&rel=0" allowfullscreen></iframe>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
