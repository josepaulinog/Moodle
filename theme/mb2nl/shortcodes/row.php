<?php

defined('MOODLE_INTERNAL') || die();


mb2_add_shortcode('row', 'mb2_shortcode_row');


function mb2_shortcode_row ($atts, $content= null)
{
	extract(mb2_shortcode_atts( array(
		'rowheader' => 0,
		'rowheader_content' => '',
		'rowheader_textcolor' => '',
		'rowheader_bgcolor' => '',
		'rowheader_mb' => 30,
		'colgutter' => 's',
		'bgcolor' => '',
		'prbg' => 0,
		'scheme' => 'light',
		'bgimage' => '',
		'bgfixed' => 0,
		'rowhidden' => 0,
		'rowlang' => '',
		'pt' => 70,
		'pb' => 10,
		'fw' => 0,
		'rowaccess' => 0,
		'custom_class' => ''
	), $atts));

	$output = '';
	$row_style = '';
	$bg_image_style = $bgimage ? ' style="background-image:url(\'' . $bgimage . '\');"' : '';
	$cls = $custom_class ? ' ' . $custom_class : '';
	$cls .= ' pre-bg' . $prbg;
	$cls .= ' ' . $scheme;
	$cls .= ' bgfixed' . $bgfixed;
	$cls .= ' colgutter-' . $colgutter;
	$cls .= ' isfw' . $fw;
	
	$lang_arr = explode( ',', $rowlang );
	$trimmed_lang_arr = array_map( 'trim', $lang_arr );

	if ( $rowlang && ! in_array( current_language(), $trimmed_lang_arr ) )
	{
		return ;
	}

	if ( $rowhidden && ! is_siteadmin() )
	{
		return ;
	}

	if ( $rowhidden && is_siteadmin() )
	{
		$cls .= ' hiddenel';
	}

	if ( $rowaccess == 1 )
	{
		if ( ! isloggedin() || isguestuser() )
		{
			return ;
		}
	}
	elseif ( $rowaccess == 2 )
	{
		if ( isloggedin() && ! isguestuser() )
		{
			return ;
		}
	}

	$isid = theme_mb2nl_get_id_from_class( $custom_class );
	$id_attr = $isid ? 'id="' . $isid . '" ' : '';

	$row_style .= ' style="';
	$row_style .= 'padding-top:' . $pt . 'px;';
	$row_style .= 'padding-bottom:' . $pb . 'px;';
	$row_style .= $bgcolor ? 'background-color:' . $bgcolor . ';' : '';
	$row_style .= '"';

	$output .= '<div ' . $id_attr . 'class="mb2-pb-row' . $cls . '"' . $bg_image_style . '>';
	$output .= '<div class="section-inner mb2-pb-row-inner "' . $row_style . '>';
	$output .= '<div class="container-fluid">';
	$output .= '<div class="row">';
	$output .= mb2_do_shortcode( $content );
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}
