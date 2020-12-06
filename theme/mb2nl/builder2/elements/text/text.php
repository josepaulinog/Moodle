<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2pb_text', 'mb2_shortcode_mb2pb_text' );

function mb2_shortcode_mb2pb_text( $atts, $content = null ){

	$atts2 = array(
		'id' => 'text',
		'align' => 'none',
		'size' => 'n',
		'sizerem' => 1,
		'color' => '',
		'showtitle' => 0,
		'fweight' => 300,
		'lspacing' => 0,
		'wspacing' => 0,
		'upper' => 0,
		'title' => 'Title text',
		'mt' => 0,
		'mb' => 30,
		'custom_class'=> '',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$style = '';

	$cls = $custom_class ? ' ' . $custom_class : '';
	$cls .= ' align-' . $align;
	//$cls .= ' text-' . $size;
	$cls .= ' ' . theme_mb2nl_heading_cls( $sizerem );
	$cls .= ' upper' . $upper;
	$cls .= ' text-' . $color;
	$cls .= ' title' . $showtitle;
	$cls .= $template ? ' mb2-pb-template-text' : '';

	// Make content default text
	$content = ! $content ? '<p>Element content here.</p>' : $content;
	$atts2['content'] = $content;

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

	$output .= '<div class="theme-text mb2-pb-element mb2pb-text' . $cls . '"' . $style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'text' );
	$output .= '<h4 class="theme-text-title">' . $title . '</h4>';
	$output .= '<div class="theme-text-text">';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';

	return $output;


}
