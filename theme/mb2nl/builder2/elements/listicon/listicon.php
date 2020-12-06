<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode( 'mb2pb_listicon', 'mb2pb_shortcode_mb2pb_listicon' );
mb2_add_shortcode( 'mb2pb_listicon_item', 'mb2pb_shortcode_mb2pb_listicon_item' );

function mb2pb_shortcode_mb2pb_listicon( $atts, $content = null ){

	$atts2 = array(
		'id' => 'listicon',
		'style' => 'disc',
		'icon' => 'fa fa-check-square-o',
		'bgcolor' => '',
		'iconcolor' => '',
		'horizontal' => 0,
		'custom_class' => '',
		'mt' => 0,
		'mb' => 30,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$GLOBALS['mb2pblisticon'] = $icon ? $icon : 'fa fa-check-square-o';
	$GLOBALS['mb2pblistbgcolor'] = $bgcolor;
	$GLOBALS['mb2pblisticoncolor'] = $iconcolor;
	$styleattr = '';
	$output = '';
	$cls = '';

	$cls .= $custom_class ? ' ' . $custom_class : '';

	$templatecls = $template ? ' mb2-pb-template-listicon' : '';

	if ( $mt || $mb )
	{
		$styleattr .= ' style="';
		$styleattr .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$styleattr .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$styleattr .= '"';
	}

	$content = $content;

	if ( ! $content )
	{
		for (  $i = 1; $i <= 3; $i++ )
		{
			$content .= '[mb2pb_listicon_item]List content here.[/mb2pb_listicon_item]';
		}
	}

	$output .= '<div class="mb2-pb-element mb2-pb-listicon' . $templatecls . '"' . $styleattr . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= '<div class="element-helper"></div>';
	$output .= theme_mb2nl_page_builder_el_actions( 'element', 'listicon' );
	$output .= '<ul class="theme-listicon mb2-pb-sortable-subelements' . $cls . '">';
	$output .= mb2_do_shortcode( $content );
	$output .= '</ul>';
	$output .= '</div>';

	return $output;

}




function mb2pb_shortcode_mb2pb_listicon_item( $atts, $content = null ){

	$atts2 = array(
		'id' => 'listicon_item',
		'icon' => '',
		'bgcolor' => '',
		'iconcolor' => '',
		'link' => '',
		'link_target'=> 0,
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$iconstyle = '';
	$icon = $icon ? $icon : $GLOBALS['mb2pblisticon'];
	$bgcolor =  $bgcolor ? $bgcolor : $GLOBALS['mb2pblistbgcolor'];
	$iconcolor = $iconcolor ? $iconcolor : $GLOBALS['mb2pblisticoncolor'];

	if ( $bgcolor || $iconcolor )
	{
		$iconstyle .= ' style="';
		$iconstyle .= $bgcolor ? 'background-color:' . $bgcolor . ';' : '';
		$iconstyle .= $iconcolor ? 'color:' . $iconcolor . ';' : '';
		$iconstyle .= '"';
	}

	$content = ! $content ? 'List content here.' : $content;
	$atts2['text'] = $content;

	$output .= '<li class="mb2-pb-subelement mb2-pb-listicon_item"' . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= theme_mb2nl_page_builder_el_actions( 'subelement' );
	$output .= '<div class="subelement-helper"></div>';
	$output .= '<span class="iconel"' . $iconstyle . '><i class="' . $icon . '"></i></span>';
	$output .= '<span class="list-text">' . mb2_do_shortcode( $content ) . '</span>';
	$output .= '</li>';

	return $output;

}
