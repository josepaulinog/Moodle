<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('mb2pb_section', 'mb2_shortcode_mb2pb_section');

function mb2_shortcode_mb2pb_section ( $atts, $content = null )
{

	$atts2 = array(
		'id' => 'section',
		'size'=> '4',
		'margin' => '',
		'bgcolor' => '',
		'prbg' => 0,
		'scheme' => 'light',
		'bgimage' => '',
		'pt' =>0,
		'sectionhidden' => 0,
		'sectionlang' => '',
		'pb' => 0,
		'sectionaccess' => 0,
		'custom_class' => '',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts));

	$output = '';
	$bg_image_style = $bgimage ? ' style="background-image:url(\'' . $bgimage . '\');"' : '';
	$cls = $custom_class ? ' ' . $custom_class : '';
	$cls .= ' pre-bg' . $prbg;
	$cls .= ' hidden' . $sectionhidden;
	$cls .= ' access' . $sectionaccess;
	$cls .= ' ' . $scheme;
	$cls .= $template ? ' mb2-pb-template-row' : '';

	$lang_arr = explode( ',', $sectionlang );
	$trimmed_lang_arr = array_map( 'trim', $lang_arr );

	$section_style = ' style="';
	$section_style .= 'padding-top:' . $pt . 'px;';
	$section_style .= 'padding-bottom:' . $pb . 'px;';
	$section_style .= $bgcolor ? 'background-color:' . $bgcolor . ';' : '';
	$section_style .= '"';

	$output .= '<div class="mb2-pb-section mb2-pb-fpsection' . $cls . '"' . $bg_image_style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= theme_mb2nl_page_builder_el_actions( 'section', 'section', array( 'lang' => $trimmed_lang_arr ) );
	$output .= '<div class="section-inner mb2-pb-section-inner"' . $section_style . '>';
	$output .= '<div class="mb2-pb-sortable-rows">';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<div class="mb2-pb-addrow">';
	$output .= '<a href="#" class="mb2-pb-row-toggle" data-toggle="modal" data-target="#mb2-pb-modal-row-layout">&plus; ' . get_string('addrow','local_mb2builder') . '</a>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
