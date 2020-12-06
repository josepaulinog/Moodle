<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('mb2pb_row', 'mb2_shortcode_mb2pb_row');

function mb2_shortcode_mb2pb_row ( $atts, $content = null )
{
	$atts2 = array(
		'id' => 'row',
		'bgcolor' => '',
		'bgfixed' => 0,
		'colgutter' => 's',
		'prbg' => 0,
		'scheme' => 'light',
		'bgimage' => '',
		'rowhidden' => 0,
		'rowlang' => '',
		'pt' => 70,
		'pb' => 10,
		'fw' => 0,
		'rowaccess' => 0,
		'custom_class' => '',
		'template' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$headercls = '';
	$bg_image_style = $bgimage ? ' style="background-image:url(\'' . $bgimage . '\');"' : '';
	$cls = $custom_class ? ' ' . $custom_class : '';
	$cls .= ' pre-bg' . $prbg;
	$cls .= ' ' . $scheme;
	$cls .= ' hidden' . $rowhidden;
	$cls .= ' access' . $rowaccess;
	$cls .= ' colgutter-' . $colgutter;
	$cls .= ' isfw' . $fw;
	$cls .= ' bgfixed' . $bgfixed;
	$cls .= $template ? ' mb2-pb-template-row' : '';

	$lang_arr = explode( ',', $rowlang );
	$trimmed_lang_arr = array_map( 'trim', $lang_arr );

	$isid = theme_mb2nl_get_id_from_class( $custom_class );
	$id_attr = $isid ? 'id="' . $isid . '" ' : '';

	$row_style = ' style="';
	$row_style .= 'padding-top:' . $pt . 'px;';
	$row_style .= 'padding-bottom:' . $pb . 'px;';
	$row_style .= $bgcolor ? 'background-color:' . $bgcolor . ';' : '';
	$row_style .= '"';

	$output .= '<div ' . $id_attr . 'class="mb2-pb-row mb2-pb-fprow' . $cls . '"' . $bg_image_style . theme_mb2nl_page_builder_el_datatts( $atts, $atts2 ) . '>';
	$output .= theme_mb2nl_page_builder_el_actions( 'row', 'row', array( 'lang' => $trimmed_lang_arr ) );
	$output .= '<div class="section-inner mb2-pb-row-inner "' . $row_style . '>';

	$output .= '<div class="container-fluid">';
	$output .= '<div class="row mb2-pb-sortable-columns">';
	$output .= mb2_do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';

	// $output .= '<div class="mb2-pb-row-wave">';
	// $output .= '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="' . $wavecolor . '" fill-opacity="1" d="M0,320L48,309.3C96,299,192,277,288,245.3C384,213,480,171,576,170.7C672,171,768,213,864,229.3C960,245,1056,235,1152,213.3C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>';
	// $output .= '</div>';

	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
