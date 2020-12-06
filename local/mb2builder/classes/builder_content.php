<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package   theme_mb2cg2
 * @copyright 2017 Mariusz Boloz (http://marbol2.com)
 * @license   Commercial https://themeforest.net/licenses
 *
 */

defined('MOODLE_INTERNAL') || die();


if ( ! class_exists( 'mb2builderBuilderContent' ) )
{

	class mb2builderBuilderContent
	{


		/*
		 *
		 * Method to get courses
		 *
		 */
		public static function get_content( $items, $options )
		{

			$output = '';
			$i = 0;
			$x = 0;

			if ( ! count( $items ) )
			{
				return '<div class="theme-box">' . get_string( 'nothingtodisplay' ) . '</div>';
			}

			foreach ( $items as $item )
			{

				$i++;
				$x++;
				$item_cls = $i%2 ? ' item-odd' : ' item-even';

				// Color class
				$c_color = self::get_custom_color( $item->id, $options );
				$item_cls .= $c_color ? ' color' : '';

				// Show item b
				$showtext = ( $options['desclimit'] > 0 || $options['linkbtn'] || $item->price );

				// Item id for admin users
				$item_ID  = '';
				$item_edit_link  = '';

				if ( is_siteadmin() )
				{
					$item_ID = ' <span class="helper-itemid" style="background-color:green;color:#fff;padding:0 3px;">ID: ' . $item->id . '</span>';
				}

				$output .= '<div class="mb2-pb-content-item theme-box item-' . $item->id . $item_cls .'">';
				$output .= $item_ID . $item_edit_link;
				$output .= '<div class="mb2-pb-content-item-inner">';
				$output .= '<div class="mb2-pb-content-item-a">';

				$output .= self::get_image_notice( $item->description );

				if ( $item->imgurl )
				{
					$output .= '<div class="mb2-pb-content-img">';
					$output .= '<a href="' . $item->link . '">';
					$output .= '<img src="' . $item->imgurl . '" alt="' . $item->imgname . '" />';
					$output .= '</a>';
					$output .= '</div>';
				}

				$output .= '<div class="mb2-pb-content1">';
				$output .= '<div class="mb2-pb-content2">';
				$output .= '<div class="mb2-pb-content3">';
				$output .= '<div class="mb2-pb-content4">';

				$output .= '<h4 class="mb2-pb-content-title">';
				$output .= '<a href="' . $item->link . '">';
				$output .= self::set_wordlimit( $item->title, $options['titlelimit'] );
				$output .= '</a>';
				$output .= '</h4>';
				$output .= ( $item->details && $options['details'] ) ? '<div class="mb2-pb-content-details">' . $item->details . '</div>' : '';
				$output .= $c_color ? '<span class="color-el" style="background-color:' . $c_color . ';"></span>' : '';
				$output .= '</div>';

				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';

				if ( $showtext )
				{
					$output .= '<div class="mb2-pb-content-item-b">';

					if ( $options['desclimit'] > 0 )
					{
						$output .= '<div class="mb2-pb-content-desc">';
						$output .= self::set_wordlimit( $item->description, $options['desclimit'] );
						$output .= '</div>';
					}

					if ( $options['linkbtn'] )
					{
						$btntext = $options['btntext'] ? $options['btntext'] : get_string('btntext','theme_mb2nl');

						$output .= '<div class="mb2-pb-content-readmore">';
						$output .= '<a class="btn btn-primary" href="' . $item->link . '">' . $btntext . '</a>';
						$output .= '</div>';
					}

					if ( $item->price )
					{
						$output .= '<div class="mb2-pb-content-price">';
						$output .=  $item->price;
						$output .= '</div>';
					}

					$output .= '</div>';
				}

				$output .= '</div>';
				$output .= '</div>';

			}

			return $output;

		}




		/*
		 *
		 * Method to set custom color for item
		 *
		 */
		public static function get_custom_color( $id, $atts )
		{

			$colors = self::get_color_arr( $atts );

			foreach ( $colors as $color )
			{
				if ( $color['id'] == $id )
				{
					return $color['color'];
				}
			}

			return false;

		}




		/*
		 *
		 * Method to get colors array
		 *
		 */
		public static function get_color_arr( $atts )
		{

			$colors = array();
			$defColors = $atts['colors'];
			$colorArr1 = explode( ',', str_replace( ' ', '', $defColors ) );
			$i=-1;

			foreach ( $colorArr1 as $color )
			{
				if ( $color )
				{
					$i++;
					$colorEl = explode( ':', $color );
					$colors[$i]['id']= $colorEl[0];
					$colors[$i]['color'] = $colorEl[1];
				}
			}

			return $colors;

		}




		/*
		 *
		 * Method to get colors array
		 *
		 */
		public static function get_image_notice ($desc)
		{
			$urlfromdesc = self::get_image_from_text( s( $desc ), true );
			$namefromdesc = basename( $urlfromdesc );

			if ( preg_match( '@%20@', $namefromdesc ) )
			{
				return '<span style="color:red;"><strong>' . get_string( 'imgnoticespace', 'local_mb2pages', array( 'img'=> urldecode( $namefromdesc ) ) ) . '</strong></span>';
			}

			return;
		}




		/*
		 *
		 * Method to set string word limit
		 *
		 */
		public static function set_wordlimit( $string, $limit = 999, $end = '...' )
		{

			// $output = $string;

			if ( $limit >= 999 )
			{
				return $string;
			}

			if ( $limit == 0 )
			{
				return;
			}

			$content_limit = strip_tags( $string );
			$words = explode( ' ', $content_limit );
			$words_count = count( $words );
			$new_string = implode( ' ', array_splice( $words, 0, $limit ) );
			$end_char = ( $end !== '' && $words_count > $limit ) ? $end : '';
			$output = $new_string . $end_char;

			return $output;

		}





		/*
		 *
		 * Method to get courses
		 *
		 */
		public static function get_courses( $options )
		{
			global $CFG, $PAGE, $USER, $DB, $OUTPUT, $COURSE;

			require_once($CFG->dirroot . '/course/lib.php');

			if ( ! self::moodle_from( 2018120300 ) )
		    {
		        require_once( $CFG->libdir. '/coursecatlib.php' );
		    }

			$i = 0;

			$context = context_course::instance( $COURSE->id );
			$coursecat_canmanage = has_capability( 'moodle/category:manage', $context );

			$catsArr = explode( ',', str_replace(' ', '', $options['catids'] ) );
			$coursesArr = explode( ',', str_replace(' ', '', $options['courseids'] ) );
			$exCats = $options['excats'];
			$exCourses = $options['excourses'];

			$coursesList = get_courses( 'all' );
			$itemCount = count( $coursesList );

			if ( ! $itemCount )
			{
				return array();
			}

			foreach ( $coursesList as $course )
			{
				// Get course category
				if ( self::moodle_from( 2018120300 ) )
				{
					$cat = core_course_category::get( $course->category, IGNORE_MISSING );
				}
				else
				{
					$cat = coursecat::get( $course->category, IGNORE_MISSING );
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
				$imgUrlAtt = self::get_image( array(), false, '', $course->id );
				$imgNameAtt = self::get_image( array(), true, '',  $course->id );

				$moodle33 = 2017051500;
				$placeholder_image = $CFG->version >= $moodle33 ? $OUTPUT->image_url( 'course-default','theme' ) : $OUTPUT->pix_url( 'course-default','theme' );

				$course->imgurl = $imgUrlAtt ? $imgUrlAtt : $placeholder_image;
				$course->imgname = $imgNameAtt;

				// Define item elements
				$course->link = new moodle_url( $CFG->wwwroot . '/course/view.php', array( 'id' => $course->id ) );
				$course->link_edit =  new moodle_url( $CFG->wwwroot . '/course/edit-page.php', array( 'id' => $course->id ) );
				$course->edit_text = get_string( 'editcoursesettings', 'core' );
				$course->title = format_text( $course->fullname, FORMAT_HTML );
				$course->description = format_text( $course->summary );
				$course->details = '&nbsp;';

				if ( ( isset( $cat->visible ) && ! $cat->visible ) && $coursecat_canmanage )
				{
					$course->details = $cat->get_formatted_name() . ' (' . get_string('hidden','local_mb2builder') . ')';
				}
				elseif ( ( isset( $cat->visible ) && $cat->visible ) )
				{
					$course->details = $cat->get_formatted_name();
				}

				if ( isset( $course->visible ) && ! $course->visible )
				{
					$course->title .= ' (' . get_string('hidden','local_mb2builder') . ')';
				}

				$course->redmoretext = get_string('readmorefp', 'local_mb2builder');
				$price = self::get_course_price($course->id, $options);
				$course->price = '';

				if ( $options['courseprices'] )
				{
					$course->price = $price ? $price : '<span class="freeprice">' . get_string('noprice','theme_mb2nl') . '</span>';
				}

			}

			// Slice course array by course limit
			$coursesList = array_slice( $coursesList, 0, $options['limit'] );

			return $coursesList;

		}







		/*
		 *
		 * Method to get categories
		 *
		 */
		public static function get_categories( $options )
		{

			global $CFG, $USER, $DB, $OUTPUT;

			require_once( $CFG->dirroot . '/course/lib.php' );

			if ( ! self::moodle_from( 2018120300 ) )
		    {
		        require_once( $CFG->libdir . '/coursecatlib.php' );
		    }

			$categories = array();

			$catids = str_replace( ' ', '', $options['catids'] );
			$exCats = $options['excats'] === 'exclude' ? ' NOT' : '';

			$query = 'SELECT * FROM ' . $CFG->prefix . 'course_categories';
			$query .= ( $options['excats'] && $catids > 0 ) ? ' WHERE id' . $exCats . ' IN (' . $catids . ')' : '';
			$query .= ' ORDER BY sortorder';

			$categories = $DB->get_records_sql( $query );
			$itemCount = count( $categories );

			if ( ! $itemCount )
			{
				return array();
			}

			foreach ( $categories as $category )
			{

				$context = context_coursecat::instance( $category->id );
				$coursecat_canmanage = has_capability( 'moodle/category:manage', $context );

				if ( ( ! isset($category->visible ) || ! $category->visible ) && ! $coursecat_canmanage )
				{
					unset( $categories[$category->id] );
				}

				// Get category image
				$image_options = array( 'context' => $context->id, 'mod' => 'coursecat', 'area' => 'description', 'itemid' => 0 );
				$imgUrlAtt = self::get_image( $image_options, false, $category->description );
				$imgNameAtt = self::get_image( $image_options, true, $category->description );

				$moodle33 = 2017051500;
				$placeholder_image = $CFG->version >= $moodle33 ?
				$OUTPUT->image_url( 'course-default', 'theme' ) : $OUTPUT->pix_url( 'course-default', 'theme' );
				$category->imgurl = $imgUrlAtt ? $imgUrlAtt : $placeholder_image;
				$category->imgname = $imgNameAtt;

				// Define item elements
				$category->link = new moodle_url( $CFG->wwwroot . '/course/index.php', array( 'categoryid' => $category->id ) );
				$category->link_edit = new moodle_url( $CFG->wwwroot . '/course/editcategory.php', array( 'id' => $category->id ) );
				$category->edit_text = get_string( 'editcategorythis', 'core' );

				$category->title = $category->name;
				$category->description = file_rewrite_pluginfile_urls( $category->description, 'pluginfile.php', $context->id, 'coursecat', 'description', NULL );
				$category->description = format_text( $category->description );

				if ( isset( $category->visible ) && ! $category->visible )
				{
					$category->title .= ' (' . get_string('hidden','theme_mb2nl') . ')';
				}

				// Get course count in a category
				$coursesList = array();

				if ( $category->id && $category->visible )
				{
					if ( self::moodle_from( 2018120300 ) )
					{
						$coursesList = core_course_category::get( $category->id )->get_courses( array( 'recursive' => false ) );
					}
					else
					{
						$coursesList = coursecat::get( $category->id )->get_courses( array( 'recursive' => false ) );
					}
				}

				$courseCount = count( $coursesList );
				$courseString = $courseCount > 1 ? get_string( 'courses' ) : get_string( 'course' );
				$category->details = $courseCount > 0 ? $courseCount . ' ' . $courseString : get_string( 'nocourseincategory', 'theme_mb2nl' );
				$category->redmoretext = '';
				$category->price = '';

			}

			// Slice categories array by categories limit
			$categories = array_slice( $categories, 0, $options['limit'] );

			return $categories;

		}





		/*
		 *
		 * Method to get announcements
		 *
		 */
		public static function get_announcements( $options )
		{

			global $CFG, $OUTPUT;

			// We'll need this
			require_once( $CFG->dirroot . '/mod/forum/lib.php' );

			$cid = 1; // '1' = site anouncements

			if ( ! $forum = forum_get_course_forum( $cid, 'news' ) )
			{
				return array();
			}

			$modinfo = get_fast_modinfo( get_course( $cid) );

			if ( empty( $modinfo->instances['forum'][$forum->id] ) )
			{
				return array();
			}

			$cm = $modinfo->instances['forum'][$forum->id];

			if ( ! $cm->uservisible )
			{
				return array();
			}

			$context = context_module::instance( $cm->id );

			// User must have perms to view discussions in that forum
			if ( ! has_capability( 'mod/forum:viewdiscussion', $context ) )
			{
				return array();
			}

			// First work out whether we can post to this group and if so, include a link
			// $groupmode = groups_get_activity_groupmode( $cm );
			// $currentgroup = groups_get_activity_group( $cm, true );
			//
			// if ( forum_user_can_post_discussion( $forum, $currentgroup, $groupmode, $cm, $context ) )
			// {
			// 	//$output .= '<div class="mb2content-newlink"><a href="' . $CFG->wwwroot . '/mod/forum/post.php?forum=' . $forum->id . '">' . get_string('addanewtopic', 'forum').'</a></div>';
			// }

			// Get all the recent discussions we're allowed to see
			// This block displays the most recent posts in a forum in
			// descending order. The call to default sort order here will use
			// that unless the discussion that post is in has a timestart set
			// in the future.
			// This sort will ignore pinned posts as we want the most recent.
			! defined( 'FORUM_POSTS_ALL_USER_GROUPS' ) ? define( 'FORUM_POSTS_ALL_USER_GROUPS', '' ) : '';
			$sort = 'p.modified DESC';

			if ( ! $discussions = forum_get_discussions( $cm, $sort, true, -1, $options['limit'], false, -1, 0, FORUM_POSTS_ALL_USER_GROUPS ) )
			{
				return array();
			}

			if ( ! count( $discussions ) )
			{
				return array();
			}

			$showDetails = $options['itemdate'];

			foreach ( $discussions as $discussion )
			{
				$discussion->subject = $discussion->name;
				$discussion->subject = format_string( $discussion->subject, true, $forum->course );

				// Get image url
				// If attachment is empty get image from post
				$imgUrlAtt = self::get_image( array( 'context'=>$context->id, 'mod' => 'mod_forum', 'area' => 'attachment', 'itemid' => $discussion->id ) );
				$imgNameAtt = self::get_image( array( 'context'=>$context->id, 'mod' => 'mod_forum', 'area' => 'attachment', 'itemid' => $discussion->id ), true );

				$imgUrlPost = self::get_image( array( 'context'=>$context->id, 'mod' =>'mod_forum', 'area' => 'post', 'itemid' => $discussion->id ) );
				$imgNamePost = self::get_image( array( 'context'=>$context->id, 'mod' => 'mod_forum', 'area' => 'post', 'itemid' => $discussion->id ), true );

				$discussion->imgurl = $imgUrlAtt ? $imgUrlAtt : $imgUrlPost;
				$discussion->imgname = $imgNameAtt ? $imgNameAtt : $imgNamePost;

				if ( ! $options['image'] )
				{
					$discussion->imgurl = '';
				}

				if ( $options['image'] && ! $discussion->imgurl )
				{
					$moodle33 = 2017051500;
					$discussion->imgurl = $CFG->version >= $moodle33 ? $OUTPUT->image_url( 'course-default','theme' ) : $OUTPUT->pix_url( 'course-default','theme' );
				}

				// Define item elements
				$discussion->link_edit = new moodle_url( $CFG->wwwroot . '/mod/forum/post.php', array( 'edit'=>$discussion->id ) );
				$discussion->id = $discussion->discussion;
				$discussion->link = new moodle_url( $CFG->wwwroot . '/mod/forum/discuss.php', array( 'd'=>$discussion->discussion ) );
				$discussion->edit_text = get_string( 'edit', 'core' );

				$discussion->title = $discussion->subject;
				$discussion->description = format_text( $discussion->message );
				$strftimerecent = get_string( 'strftimerecent' );
				$discussion->details = $showDetails == 1 ? userdate( $discussion->modified, $strftimerecent ) : '';
				$discussion->redmoretext = get_string( 'btntext', 'theme_mb2nl' );

				$discussion->price = '';

			}

			// Slice categories array by categories limit
			$discussions = array_slice( $discussions, 0, $options['limit'] );

			return  $discussions;

		}





		/*
		 *
		 * Method to check Moodle version
		 *
		 */
		public static function moodle_from( $version )
		{
			global $CFG;

			if ( $CFG->version >= $version )
			{
				return true;
			}

			return false;

		}


		/*
		 *
		 * Method to get image
		 *
		 */
		public static function get_image( $attribs = array(), $name = false, $desc = '', $cid = 0 )
		{

			global $CFG;
			require_once( $CFG->libdir . '/filelib.php' );

			$output = '';
			$desc_img = true;

			if ( ! empty( $attribs ) )
			{
				$files = get_file_storage()->get_area_files( $attribs['context'], $attribs['mod'], $attribs['area'], $attribs['itemid'] );
			}

			// Get image from course summary files
			if ( $cid )
			{
				if ( self::moodle_from( 2018120300 ) )
			    {
					$courseObj = new core_course_list_element( get_course( $cid ) );
			    }
			    else
			    {
			        $courseObj = new course_in_list( get_course( $cid ) );
			    }

				$files = $courseObj->get_course_overviewfiles();
			}

			if ( $desc )
			{
				$urlfromdesc = self::get_image_from_text( s( $desc ),true );
				$namefromdesc = basename( $urlfromdesc );
			}

			foreach ( $files as $file )
			{

				if ( $desc )
				{
					$desc_img = ( $namefromdesc === $file->get_filename() );
				}

				$isimage = ( $file->is_valid_image() && $desc_img );

				if ( $isimage )
				{
					if ( $name )
					{
						return $file->get_filename();
					}

					$item_id = NULL;

					if ( isset( $attribs['itemid'] ) && $attribs['itemid'] )
					{
						$item_id = $file->get_itemid();
					}

					return moodle_url::make_pluginfile_url( $file->get_contextid(), $file->get_component(), $file->get_filearea(),
					$item_id, $file->get_filepath(), $file->get_filename() );
				}
			}

		}




		/*
		 *
		 * Method to get image from text
		 *
		 */
		public static function get_image_from_text( $text )
		{

			$output = '';

			$matches = array();
			$str = '@@PLUGINFILE@@/';

			$isplug = preg_match( '|' . $str . '|', $text );

			if ($isplug)
			{
				preg_match_all( '!@@PLUGINFILE@@/[^?#]+\.(?:jpe?g|png|gif)!Ui', $text, $matches );
			}
			else
			{
				preg_match_all( '!http://[^?#]+\.(?:jpe?g|png|gif)!Ui', $text, $matches );
			}

			foreach ( $matches as $el )
			{
				$output = isset( $el[0] ) ? $isplug ? str_replace( $str, '', $el[0] ) : $el[0] : '';
			}

			return $output;

		}




		/*
		 *
		 * Method to get course price
		 *
		 */
		public static function get_course_price ( $id, $options )
		{

			$output = '';

			$prices = $options['courseprices'];
			$pricesArr = explode( ',', str_replace(' ','',$prices) );
			$currency = self::get_currency( $options['currency'] );

			foreach( $pricesArr as $price )
			{
				$priceArr = explode(':',$price);

				if ( $id == $priceArr[0] )
				{
					$output .= isset( $priceArr[2] ) ? '<span class="oldprice"><del>' . $currency . trim( $priceArr[2] ) . '</del></span>' : '';
					$output .= isset( $priceArr[1] ) ? '<span class="price">' . $currency . trim( $priceArr[1] ) . '</span>' : '';
				}
			}

			return $output;

		}




		/*
		 *
		 * Method to get image from text
		 *
		 */
		public static function get_currency ( $currency )
		{

			$output = '';
			$is_c = '';

			// Get currency symbol
			$currencyarr = explode( ':', $currency );

			$output .= '<span class="currency">';

			if (preg_match( '#\\,#', $currencyarr[1] ) )
			{

				$curr = explode( ',', $currencyarr[1] );

				foreach ( $curr as $c )
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





		/*
		 *
		 * Method to get content options
		 *
		 */
		public static function get_options( $options, $urloptions )
		{
			$opts = array();

			foreach( $options as $k => $v )
			{
				$v = $v;

				if ( isset( $urloptions[$k] ) )
				{
					$v = $urloptions[$k];
				}

				$opts[$k] = $v;
			}

			return $opts;

		}





		/*
		 *
		 * Method to get video embed url
		 *
		 */
		public static function get_videoweb_url( $url = '', $default = '' )
		{

			if ( ! $url )
			{
				$url = $default;
			}

			$videoid = self::get_video_id( $url );
			$urlaparat = '//aparat.com/video/video/embed/videohash/' . $videoid . '/vt/frame';
			$urlvimeo = '//player.vimeo.com/video/' . $videoid;
			$urlyoutube = '//youtube.com/embed/' . $videoid;

			// Support old shortcode feature
			// this means that user inser video ID instead video url
			if ( ! filter_var( $url, FILTER_VALIDATE_URL ) )
			{
				if( preg_match( '/^[0-9]+$/', $url ) )
				{
					return $urlvimeo;
				}
				else
				{
					return $urlyoutube;
				}
			}

			// User use video url
			if ( preg_match( '@aparat.com@', $url ) )
			{
				return '//aparat.com/video/video/embed/videohash/' . $videoid . '/vt/frame';
			}
			elseif ( preg_match( '@vimeo.com@', $url ) )
			{
				return '//player.vimeo.com/video/' . $videoid;
			}
			elseif ( preg_match( '@youtube.com@', $url ) || preg_match( '@youtu.be@', $url ) )
			{
				return '//youtube.com/embed/' . $videoid;
			}

			return null;

		}







		/*
		 *
		 * Method to get video id from video url
		 *
		 */
		public static function get_video_id( $url, $list = false )
		{

		    $parts = parse_url($url);

			if ( isset( $parts['query'] ) )
			{

			    parse_str($parts['query'], $qs);

				if ( $list && isset( $qs['list'] ) )
				{
					return $qs['list'];
				}

			    if ( isset( $qs['v'] ) )
				{
					return $qs['v'];
		        }
				elseif ( isset( $qs['vi'] ) )
				{
		            return $qs['vi'];
		        }

		    }

			if ( ! $list && isset( $parts['path'] ) )
			{
				$path = explode('/', trim( $parts['path'], '/') );
		        return $path[count($path)-1];
		    }

		    return false;

		}

	}


}
