<?php

defined('MOODLE_INTERNAL') || die();

mb2_add_shortcode('categories', 'mb2_shortcode_categories');

function mb2_shortcode_categories($atts, $content= null){

	$atts2 = array(
		'limit' => 8,
		'catids' => 0,
		'excats' => 0,
		'carousel' => 0,
		'mobcolumns' => 0,
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
		'link' => 1,
		'linkbtn' => 0,
		'btntext' => '',
		'prestyle' => 0,
		'custom_class' => '',
		'colors' => '',
		'mt' => 0,
		'mb' => 30,
	);

	extract( mb2_shortcode_atts( $atts2 , $atts ) );

	$output = '';
	$cls = '';
	$list_cls = '';
	$col_cls = '';
	$style = '';

	if ( $mt || $mb )
	{
		$style .= ' style="';
		$style .= $mt ? 'margin-top:' . $mt . 'px;' : '';
		$style .= $mb ? 'margin-bottom:' . $mb . 'px;' : '';
		$style .= '"';
	}

	$catopts = theme_mb2nl_page_builder_2arrays( $atts, $atts2 );
	$sliderdata = theme_mb2nl_shortcodes_slider_data( $catopts );
	$categories = theme_mb2nl_shortcodes_categories_get_items( $catopts );
	$itemCount = count( $categories );

	$cls .= ' prestyle' . $prestyle;
	
	$list_cls .= $carousel ? ' owl-carousel' : '';
	$list_cls .= ! $carousel ? ' theme-boxes theme-col-' . $columns : '';
	$list_cls .= ! $carousel ? ' gutter-' . $gutter : '';

	$output .= '<div class="mb2-pb-content mb2-pb-categories clearfix' . $cls . '"' . $style . '>';
	$output .= '<div class="mb2-pb-content-inner clearfix">';
	$output .= '<div class="mb2-pb-content-list' . $list_cls . '"' . $sliderdata . '>';

	if ( ! $itemCount )
	{
		$output .= get_string('nothingtodisplay');
	}

	$output .= theme_mb2nl_shortcodes_content_template( $categories, $catopts );

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
function theme_mb2nl_shortcodes_categories_get_items ($options)
{

	global $CFG, $USER, $DB, $OUTPUT;

	require_once($CFG->dirroot . '/course/lib.php');

	if ( ! theme_mb2nl_moodle_from( 2018120300 ) )
    {
        require_once($CFG->libdir. '/coursecatlib.php');
    }

	$categories = array();

	$catids = str_replace(' ', '', $options['catids']);
	$exCats = $options['excats'] === 'exclude' ? ' NOT' : '';

	$query = 'SELECT * FROM ' . $CFG->prefix . 'course_categories';
	$query .= ($options['excats'] && $catids > 0) ? ' WHERE id' . $exCats . ' IN (' . $catids . ')' : '';
	$query .= ' ORDER BY sortorder';

	$categories = $DB->get_records_sql($query);
	$itemCount = count($categories);

	if ( ! $itemCount )
	{
		return array();
	}

	foreach ( $categories as $category )
	{

		$context = context_coursecat::instance($category->id);
		$coursecat_canmanage = has_capability('moodle/category:manage', $context);

		if ( ( ! isset($category->visible ) || ! $category->visible ) && ! $coursecat_canmanage )
		{
			unset( $categories[$category->id] );
		}

		// Get category image
		$image_options = array('context'=>$context->id,'mod'=>'coursecat','area'=>'description','itemid'=>0);
		$imgUrlAtt = theme_mb2nl_shortcodes_content_get_image($image_options, false, $category->description);
		$imgNameAtt = theme_mb2nl_shortcodes_content_get_image($image_options, true, $category->description);

		$moodle33 = 2017051500;
		$placeholder_image = $CFG->version >= $moodle33 ? $OUTPUT->image_url('course-default','theme') : $OUTPUT->pix_url('course-default','theme');
		$category->imgurl = $imgUrlAtt ? $imgUrlAtt : $placeholder_image;
		$category->imgname = $imgNameAtt;

		// Define item elements
		$category->link = new moodle_url($CFG->wwwroot . '/course/index.php', array('categoryid'=>$category->id));
		$category->link_edit = new moodle_url($CFG->wwwroot . '/course/editcategory.php', array('id'=>$category->id));
		$category->edit_text = get_string('editcategorythis', 'core');

		$category->title = $category->name;
		$category->description = file_rewrite_pluginfile_urls($category->description, 'pluginfile.php', $context->id, 'coursecat', 'description', NULL);
		$category->description = format_text( $category->description );

		if ( isset( $category->visible ) && ! $category->visible )
		{
			$category->title .= ' (' . get_string('hidden','theme_mb2nl') . ')';
		}

		// Get course count in a category
		$coursesList = array();

		if ( $category->id && $category->visible )
		{
			if ( theme_mb2nl_moodle_from( 2018120300 ) )
			{
				$coursesList = core_course_category::get($category->id)->get_courses(array('recursive' => false));
			}
			else
			{
				$coursesList = coursecat::get($category->id)->get_courses(array('recursive' => false));
			}
		}

		$courseCount = count($coursesList);
		$courseString = $courseCount > 1 ? get_string('courses') : get_string('course');
		$category->details = $courseCount > 0 ? $courseCount . ' ' . $courseString : get_string('nocourseincategory', 'theme_mb2nl');
		$category->redmoretext = '';
		$category->price = '';

	}

	// Slice categories array by categories limit
	$categories = array_slice( $categories, 0, $options['limit'] );

	return $categories;

}
