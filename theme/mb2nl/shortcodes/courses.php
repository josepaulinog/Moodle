<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('courses', 'mb2_shortcode_courses');

function mb2_shortcode_courses($atts, $content= null){

	global $CFG;

	$atts2 = array(
		'limit' => 8,
		'catids' => '',
		'courseids' => '',
		'excourses' => 0,
		'mobcolumns' => 0,
		'excats' => 0,
		'carousel' => 0,
		'columns' => 3,
		'sdots' => 0,
		'sloop' => 0,
		'snav' => 1,
		'sautoplay' => 1,
		'spausetime' => 7000,
		'sanimate' => 600,
		'desclimit' => 25,
		'titlelimit' => 6,
		'gridwidth' => 'normal',
		'gutter' => 'normal',
		'linkbtn' => 0,
		'btntext' => '',
		'prestyle' => 'none',
		'custom_class' => '',
		'colors' => '',
		'mt' => 0,
		'mb' => 30,
		'courseprices' => '',
		'currency' => 'USD:24'
	);
	extract( mb2_shortcode_atts( $atts2, $atts ) );

	$output = '';
	$cls = '';
	$list_cls = '';
	$col_cls = '';
	$style = '';

	// Set column style
	$col = 0;
	$col_style = '';
	$list_style = '';

	$courseopts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$sliderdata = theme_mb2nl_shortcodes_slider_data( $courseopts );
	$courses = mb2_shortcode_courses_get_items( $courseopts );
	$itemCount = count( $courses );

	// Carousel layout
	$list_cls .= $carousel ? ' owl-carousel' : '';
	$list_cls .= ! $carousel ? ' theme-boxes theme-col-' . $columns : '';
	$list_cls .= ! $carousel ? ' gutter-' . $gutter : '';

	$cls .= ' prestyle' . $prestyle;

	if ( $mt || $mb )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '"';
	}

	$output .= '<div class="mb2-pb-content mb2-pb-courses clearfix' . $cls . '"' . $style . '>';
	$output .= '<div class="mb2-pb-content-inner clearfix">';
	$output .= '<div class="mb2-pb-content-list' . $list_cls . '"' . $sliderdata . '>';

	if ( ! $itemCount )
	{
		$output .= get_string('nothingtodisplay');

		if ( in_array( theme_mb2nl_site_access(), array( 'admin', 'manager', 'coursecreator' ) ) )
		{
			$output .= '<div>';
			$output .= '<a href="' . new moodle_url($CFG->wwwroot . '/course/edit.php',array('category'=>theme_mb2nl_get_category()->id)) . '">' .
			get_string('createnewcourse') . '</a>';
			$output .= '</div>';
		}
	}

	$output .= theme_mb2nl_shortcodes_content_template( $courses, $courseopts );

	$output .= '</div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;

}





/*
 *
 * Method to get categories list
 *
 */
function mb2_shortcode_courses_get_items( $options )
{

	global $CFG,$PAGE,$USER,$DB,$OUTPUT,$COURSE;

	require_once($CFG->dirroot . '/course/lib.php');

	if ( ! theme_mb2nl_moodle_from( 2018120300 ) )
    {
        require_once( $CFG->libdir. '/coursecatlib.php' );
    }

	$i = 0;
	$context = context_course::instance( $COURSE->id );
	$coursecat_canmanage = has_capability( 'moodle/category:manage', $context );

	$catsArr = explode(',', str_replace(' ', '', $options['catids']));
	$coursesArr = explode(',', str_replace(' ', '', $options['courseids']));
	$exCats = $options['excats'];
	$exCourses = $options['excourses'];

	$coursesList = get_courses();
	$itemCount = count( $coursesList );

	if ( $itemCount <= 0 )
	{
		return array();
	}

	foreach ( $coursesList as $course )
	{

		// Get course category
		if (theme_mb2nl_moodle_from(2018120300))
		{
			$cat = core_course_category::get($course->category, IGNORE_MISSING);
		}
		else
		{
			$cat = coursecat::get($course->category, IGNORE_MISSING);
		}

		if ( $course->id == 1 )
		{
			unset( $coursesList[$course->id] );
		}

		// Check if some category are included/excluded
		if ( $catsArr[0] )
		{
			if ( $exCats === 'exclude' )
			{
				if ( in_array( $course->category, $catsArr ) )
				{
					unset( $coursesList[$course->id] );
				}
			}
			elseif ( $exCats === 'include' )
			{
				if ( ! in_array( $course->category, $catsArr ) )
				{
					unset( $coursesList[$course->id] );
				}
			}
		}

		// Check if some courses are included/excluded
		if ( $coursesArr[0] )
		{
			if ( $exCourses === 'exclude' )
			{
				if ( in_array( $course->id, $coursesArr ) )
				{
					unset( $coursesList[$course->id] );
				}
			}
			elseif ( $exCourses === 'include' )
			{
				if ( ! in_array( $course->id, $coursesArr ) )
				{
					unset( $coursesList[$course->id] );
				}
			}
		}

		if ( $course->category == 0 )
		{
			unset( $coursesList[$course->id] );
		}

		if ( ( ! isset( $cat->visible ) || ! $cat->visible ) && ! $coursecat_canmanage )
		{
			unset( $coursesList[$course->id] );
		}


		// Get image url
		// If attachment is empty get image from post
		$imgUrlAtt = theme_mb2nl_shortcodes_content_get_image( array(), false, '', $course->id );
		$imgNameAtt = theme_mb2nl_shortcodes_content_get_image( array(), true, '',  $course->id );

		$moodle33 = 2017051500;
		$placeholder_image = $CFG->version >= $moodle33 ? $OUTPUT->image_url( 'course-default', 'theme' ) : $OUTPUT->pix_url( 'course-default', 'theme' );

		$course->imgurl = $imgUrlAtt ? $imgUrlAtt : $placeholder_image;
		$course->imgname = $imgNameAtt;


		// Define item elements
		$course->link = new moodle_url( $CFG->wwwroot . '/course/view.php', array('id' => $course->id ) );
		$course->link_edit =  new moodle_url( $CFG->wwwroot . '/course/edit.php', array('id' => $course->id ) );
		$course->edit_text = get_string( 'editcoursesettings' );
		$course->title = format_text($course->fullname, FORMAT_HTML);
		$course->description = format_text($course->summary, FORMAT_HTML);
		$course->details = '&nbsp;';

		if ((isset($cat->visible) && !$cat->visible) && $coursecat_canmanage)
		{
			$course->details = $cat->get_formatted_name() . ' (' . get_string('hidden','theme_mb2nl') . ')';
		}
		elseif ((isset($cat->visible) && $cat->visible))
		{
			$course->details = $cat->get_formatted_name();
		}

		if (isset($course->visible) && !$course->visible)
		{
			$course->title .= ' (' . get_string('hidden','theme_mb2nl') . ')';
		}

		$course->redmoretext = get_string('readmore', 'theme_mb2nl');
		$price = mb2_shortcode_courses_course_price($course->id, $options);
		$course->price = '';

		if ($options['courseprices'])
		{
			$course->price = $price ? $price : '<span class="freeprice">' . get_string('noprice','theme_mb2nl') . '</span>';
		}

	}

	// Slice course array by course limit
	$coursesList = array_slice( $coursesList, 0, $options['limit'] );

	return $coursesList;
}







function mb2_shortcode_courses_course_price ($id, $options)
{

	$output = '';

	$prices = $options['courseprices'];
	$pricesArr = explode(',',str_replace(' ','',$prices));
	$currency = mb2_shortcode_courses_currency($options['currency']);

	foreach($pricesArr as $price)
	{

		$priceArr = explode(':',$price);


		if ($id == $priceArr[0])
		{
			$output .= isset($priceArr[2]) ? '<span class="oldprice"><del>' . $currency . trim($priceArr[2]) . '</del></span>' : '';
			$output .= isset($priceArr[1]) ? '<span class="price">' . $currency . trim($priceArr[1]) . '</span>' : '';
		}

	}

	return $output;

}




function mb2_shortcode_courses_currency ($currency)
{

	$output = '';
	$is_c = '';


	// Get currency symbol
	$currencyarr = explode(':', $currency);

	$output .= '<span class="currency">';

	if (preg_match('#\\,#', $currencyarr[1]))
	{

		$curr = explode(',', $currencyarr[1]);

		foreach ($curr as $c)
		{
			$output .= '&#x' . $c;
		}
	}
	else
	{
		$output .= '&#x' . $currencyarr[1];
	}

	$output .= '</span>';



	return $output;


}
