<?php

defined('MOODLE_INTERNAL') || die();


mb2_add_shortcode('button', 'mb2_shortcode_button');

function mb2_shortcode_button($atts, $content= null){

	extract(mb2_shortcode_atts( array(
		'type' => 'primary',
		'size' => '',
		'link' => '#',
		'target' => 0,
		'icon'=> '',
		'icon_size'=> '18',
		'icon_pos'=> 'before',
		'ttpos'=>'top',
		'upper' => 0,
		'tttext'=> '',
		'fw' => 0,
		'fweight' => 400,
		'lspacing' => 0,
		'wspacing' => 0,
		'rounded'=>0,
		'custom_class'=>'',
		'ml' => 0,
		'mr' => 0,
		'mt' => 0,
		'mb' => 15,
		'border'=>0,
		'attribute'=>'',
		'center' => 0
	), $atts));

	$output = '';
	$style = '';

	$iconpref = theme_mb2nl_font_icon_prefix($icon);
	$istarget = $target ? ' target="_blank"' : '';

	// Define some button parameters
	$iconname = $icon;

	// Button icon
	$btnicon = '';

	if ($icon !='')
	{
		$btnicon = ' <i class="' . $iconpref . $iconname . '"></i> ';
	}


	$btntitle = $tttext ? ' title="' . $tttext . '"' : '';


	$btntext = '<span class="btn-intext">' . $content . '</span>';


	// Define button css class
	$btncls = $type;
	$btncls .= $size ? ' btn-' . $size : '';
	$btncls .= $tttext !='' ? ' tmpl-tooltip' : '';
	$btncls .= $icon_pos === 'before' ? ' btn-icon-before' : ' btn-icon-after';
	$btncls .= ' rounded' . $rounded;
	$btncls .= ' btnborder' . $border;
	$btncls .= ' upper' . $upper;
	$btncls .= $fw == 1 ? ' btn-full' : '';
	$btncls .= $custom_class ? ' ' . $custom_class : '';


	// Additional button attribute
	$isattribute = $attribute !='' ? ' ' . $attribute : '';


	// Button style
	if ( $ml || $mr || $mt || $mb || $fweight || $lspacing != 0 || $wspacing != 0 )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= $ml ? 'margin-left:' . $ml . 'px;' : '';
		$style .= $mr ? 'margin-right:' . $mr . 'px;' : '';
		$style .= $fweight ? 'font-weight:' . $fweight . ';' : '';
		$style .= $lspacing != 0 ? 'letter-spacing:' . $lspacing . 'px;' : '';
		$style .= $wspacing != 0 ? 'word-spacing:' . $wspacing . 'px;' : '';
		$style .= '"';
	}



	// Define button data attribute
	$btndata = $tttext !='' ? ' data-placement="' . $ttpos . '"' : '';

	$output .= ( $center && ! $fw ) ? '<div style="text-align:center;" class="clearfix">' : '';
	$output .= '<a href="' . $link . '"' . $istarget . ' class="btn btn-' . $btncls . '"' . $style . $btntitle . $btndata . $isattribute . '>';
	$output .= $icon_pos == 'before' ? $btnicon . $btntext : $btntext . $btnicon;
	$output .= '</a>';
	$output .= ( $center && ! $fw ) ? '</div>' : '';

	return $output;

}
