<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('slider', 'mb2_shortcode_slider');
mb2_add_shortcode('carousel', 'mb2_shortcode_slider');
mb2_add_shortcode('slider_item', 'mb2_shortcode_slider_item');
mb2_add_shortcode('carousel_item', 'mb2_shortcode_slider_item');


function mb2_shortcode_slider($atts, $content= null){

	$atts2 = array(
		'mt' => 0,
		'mb' => 30,
		'width' => '',
		'custom_class' => '',
		'prestyle' => '',
		'columns' => 4,
		'imgwidth' => 800,
		'sdots' => 0,
		'sloop' => 0,
		'snav' => 1,
		'sautoplay' => 1,
		'spausetime' => 7000,
		'sanimate' => 600,
		'gridwidth' => 'normal',
		'mobcolumns' => 0,
		'gutter' => 'normal',
		'title' => 1,
		'desc' => 1,
		'linkbtn' => 0,
		'link_target' => '',
		'readmoretext' => ''
	);

	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$sData = '';
	$style = '';
	$cls = '';
	$GLOBALS['carreadmoretext'] = $readmoretext;
	$GLOBALS['cartitle'] = $title;
	$GLOBALS['cardesc'] = $desc;
	$GLOBALS['carimgwidth'] = $imgwidth;

	$cls .= ' prestyle' . $prestyle;
	$cls .= ' linkbtn' . $linkbtn;
	$cls .= $custom_class ? ' ' . $custom_class : '';

	if ( $mt || $mb )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '"';
	}

	$opts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$sliderdata = theme_mb2nl_shortcodes_slider_data( $opts );

	$cls .= $sdots == 1 ? ' isdots' : '';
	$cls .= $columns > 1 ? ' carousel-mode' : ' slider-mode';

	$output .= '<div class="theme-slider-wrap mb2-pb-carousel' . $cls . '"' . $style . '>';
	$output .= '<div class="theme-slider owl-carousel"' . $sliderdata  . '>';
	$output .= mb2_do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';

	unset( $GLOBALS['carreadmoretext'] );
	unset( $GLOBALS['cartitle'] );
	unset( $GLOBALS['cardesc'] );
	unset( $GLOBALS['carimgwidth'] );

	return $output;

}



function mb2_shortcode_slider_item($atts, $content = null){
	extract(mb2_shortcode_atts( array(
		'title' => '',
		'desc' => '',
		'image' => '',
		'color' => '',
		'link' => '',
		'target' => '',
		'link_target' => 0
		), $atts)
	);

	$output = '';
	$isTarget = '';
	$colorcls = $color ? ' color1' : '';
	$imgstyle = ' style="max-width:' . $GLOBALS['carimgwidth'] . 'px;"';

	$target = $target ? $target : $link_target;
	$isTarget = $target ? ' target="_blank"' : '';

	$color_style = $color ? ' style="background-color:' . $color . ';"' : '';

	$output .= '<div class="theme-slider-item">';
	$output .= '<div class="theme-slider-item-inner">';
	//$output .= '<div class="theme-slider-item-a">';
	//$output .= ($link && $link_type == 2) ? '<a href="' . $link . '"' . $isTarget . '>' : '';

	$output .= '<div class="theme-slider-img">';
	$output .= $link ? '<a href="' . $link . '"' . $isTarget . '>' : '';
	$output .= '<img src="' . $image . '" alt="' . $title . '"' . $imgstyle . '>';
	$output .= $link ? '</a>' : '';
	$output .= '</div>';

	if ( $content || ( $desc && $GLOBALS['cardesc'] ) || ( $title && $GLOBALS['cartitle'] ) )
	{

		$output .= '<div class="theme-slide-content1' . $colorcls . '"' . $color_style . '>';
		$output .= '<div class="theme-slide-content2">';
		$output .= '<div class="theme-slide-content3">';
		$output .= '<div class="theme-slide-content4">';

		if ( $title && $GLOBALS['cartitle'] )
		{
			$output .= '<h4 class="theme-slide-title">';
			$output .= $link ? '<a href="' . $link . '"' . $isTarget . '>' : '';
			$output .= format_text($title, FORMAT_HTML);
			$output .= $link ? '</a>' : '';
			$output .= '</h4>';
		}


		if ( ( $desc && $GLOBALS['cardesc'] ) || ( $content && $GLOBALS['cardesc'] ) )
		{
			$output .= '<div class="theme-slider-item-details">';

			$desc = $content ? $content : $desc;

			if ( $desc )
			{
				$output .= '<div class="theme-slider-desc">';
				$output .= format_text($desc, FORMAT_HTML);
				$output .= '</div>';
			}

			if ( $link )
			{
				$readmoretext = $GLOBALS['carreadmoretext'] ? $GLOBALS['carreadmoretext'] : get_string('readmore','theme_mb2nl');

				$output .= '<div class="theme-slider-readmore">';
				$output .= '<a class="btn btn-primary" href="' . $link . '"' . $isTarget . '>' . $readmoretext . '</a>';
				$output .= '</div>';
			}

			$output .= '</div>';
		}

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

	}



	//$output .= ($link && $link_type == 2) ? '</a>' : '';

	$output .= '</div>';
	$output .= '</div>';


	return $output;


}
