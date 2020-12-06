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

require_once( $CFG->dirroot . '/local/mb2builder/lib.php' );
require_once( $CFG->dirroot . '/local/mb2builder/classes/api.php' );


if ( ! class_exists( 'mb2builderBuilder' ) )
{

	class mb2builderBuilder
	{



		/*
		 *
		 * Method to get builder layout
		 *
		 */
		public static function get_builder_layout( $data )
		{

			// TO DO: Add some condition if user hasn't installed and activated schortcode filter plugin
			$output = '';

			// Get static elements shortcodes
			self::get_static_layout_parts();

			// Get elements shortcodes
			self::get_layout_elements();

			// Get demo content in customizer
			// We always get content from 'democontent' item field
			$data = isset( $data->democontent) ? json_decode( $data->democontent ) : '';

			$output .= '<div class="mb2-pb-overlay main-overlay"></div>';
			$output .= '<div class="mb2-pb-container">';
			$output .= '<div class="mb2-pb-sortable-sections clearfix">';

			// TO DO: add some conditions and content when json code doesn't exists
			if ( ! is_array( $data ) || empty( $data ) || ( isset( $data[0]->attr ) && empty( $data[0]->attr ) ) )
			{
				$output .= '[mb2pb_section][/mb2pb_section]';
			}
			else
			{
				$output .= self::get_builder_section( $data[0]->attr );
			}

			$output .= '</div>';
			$output .= '</div>';

			return $output;

		}


		/*
		 *
		 * Method to get builder section
		 *
		 */
		public static function get_builder_section( $page )
		{

			$output = '';

			foreach ( $page as $section )
			{
				$output .= '[mb2pb_section' . self::get_el_settings( $section->settings, array( 'template' ) ) . ']';

				if ( isset( $section->attr ) )
				{
					foreach ( $section->attr as $row )
					{
						$output .= self::get_builder_row( $row );
					}
				}
				$output .= '[/mb2pb_section]';
			}

			return $output;

		}



		/*
		 *
		 * Method to get builder layout
		 *
		 */
		public static function get_builder_row( $row )
		{
			$output = '';

			$output .= '[mb2pb_row' . self::get_el_settings( $row->settings, array( 'template' ) ) . ']';

			if ( isset( $row->attr ) )
			{
				foreach ( $row->attr as $col )
				{
					$output .= '[mb2pb_column' . self::get_el_settings( $col->settings, array( 'template' ) ) . ']';

					if ( isset( $col->attr ) )
					{
						foreach ( $col->attr as $el )
						{
							// Check for old video shortcode
							// TO DO: Remove this condition after a few months
							// We believe that all users imported already old builder content
							$elid = $el->settings->id === 'video' ? 'videoweb' : $el->settings->id;

							// Don't use gap elements
							// New elements has margin top and bottom settings
							// TO DO: Remove this condition after a few months
							if ( $el->settings->id === 'gap' ||  $el->settings->id === 'code' )
							{
								continue;
							}

							$output .= '[mb2pb_' . $elid . self::get_el_settings( $el->settings, array( 'template' ) ) . ']';
							$output .= self::get_el_content( $el );
							$output .= '[/mb2pb_' . $elid . ']';
						}
					}
					$output .= '[/mb2pb_column]';
				}
			}

			$output .= '[/mb2pb_row]';

			return $output;

		}






		/*
		 *
		 * Method to get builder element settings
		 *
		 */
		public static function get_el_settings( $item, $exclude = array() )
		{
			global $CFG;
			$output = '';
			// Load shortcode filer if fuction doesn't exists
			if ( ! function_exists( 'mb2_add_shortcode' ) )
			{
			    require_once( $CFG->dirroot . '/filter/mb2shortcodes/lib/shortcodes.php' );
			}

			foreach ( $item as $k => $v )
			{
				if ( ! in_array( $k, $exclude ) )
				{
					// We have to replace shortcodes
					$v = self::replace_shortcode( $v );

					// Check for GENERICO
					$v = self::check_for_generico( $v );

					// Convert value to special html characters.
					if ( strip_tags( $v ) !== $v )
					{
						$v1 = htmlentities( $v );
					}
					else
					{
						$v1 = $v;
					}

					// Check for sample images
					$v2 = mb2builderApi::get_sample_image( $v1 );

					$output .= ' ' . $k . '="' . $v2 . '"';
				}
			}

		 	return $output;

		}




		/*
		 *
		 * Method to check for generico filter plugin
		 *
		 */
		public static function check_for_generico( $str )
		{
			global $DB;

			$sql = 'SELECT * FROM {filter_active} WHERE ' . $DB->sql_like( 'filter', '?' ) . ' AND active = ?';
			if ( ! $DB->record_exists_sql( $sql, array( 'generico', 1 ) ) )
			{
				return $str;
			}

			return str_replace( 'GENERICO', 'GENERIC0', $str );
		}






		/*
		 *
		 * Method to get builder element content
		 *
		 */
		public static function get_el_content( $element )
		{

			$output = '';

		 	foreach ( $element->settings as $id => $value )
		 	{
				if ( $id === 'text' || $id === 'content' )
				{
					// Check for generico filter plugin
					$value = self::check_for_generico( $value );

					// Javascript code prevert to do this but not hurts to do it twice
					$value = self::replace_shortcode( $value );

					$output .= $value;
				}
		 	}

		 	if ( isset( $element->attr ) )
		 	{
		 		foreach ( $element->attr as $subelement )
		 		{
					// Leave empty space at the and of shortcode ...attribute="value" ]
					// This is because 'shortcode_parse_atts' function in some shortcodes, for example carousel item.
		 			$output .= '[mb2pb_' . $element->settings->id . '_item' . self::get_el_settings( $subelement->settings, array( 'template' ) ) . ' ]';

		 			foreach ( $subelement->settings as $id => $value )
		 			{
						if ( $id === 'text' || $id === 'content' )
						{
							// Check for generico filter plugin
							$value = self::check_for_generico( $value );

							// Javascript code prevert to do this but not hurts to do it twice
							$value = self::replace_shortcode( $value );

							$output .= $value;

						}
		 			}

		 			$output .= '[/mb2pb_' . $element->settings->id . '_item]';
		 		}
		 	}

		 	return $output;

		}







		/*
		 *
		 * Method to get staic elements layout
		 *
		 */
		public static function get_static_layout_parts()
		{

			$elements = array( 'section', 'row', 'column' );

			foreach ( $elements as $e )
			{
				if ( file_exists( LOCAL_MB2BUILDER_PATH_THEME_SETTINGS . $e . '/' . $e . '.php' ) )
				{
					require_once( LOCAL_MB2BUILDER_PATH_THEME_SETTINGS . $e . '/' . $e . '.php' );
				}
			}

		}






		/*
		 *
		 * Method to get elements layout
		 *
		 */
		public static function get_layout_elements()
		{

			$elements = mb2builderApi::get_elements();

			foreach ( $elements as $e )
			{
				if ( file_exists( LOCAL_MB2BUILDER_PATH_THEME_ELEMENTS . $e . '/' . $e . '.php' ) )
				{
					require_once( LOCAL_MB2BUILDER_PATH_THEME_ELEMENTS . $e . '/' . $e . '.php' );
				}
			}

		}





		/*
		 *
		 * Method to get demo page iframe
		 *
		 */
		public static function get_demo_iframe( $params = array() )
		{
			$output = '';

			$output .= '<div id="mb2-pb-demo-iframe-wrap">';
			$output .= '<iframe id="mb2-pb-demo-iframe" src="' . new moodle_url( '/local/mb2builder/customize.php', array(
				'itemid' => $params['itemid'], 'pageid' => $params['pageid'] ) ) . '" ></iframe>';
			$output .= '</div>';

			return $output;
		}




		/*
		 *
		 * Method to get layout links
		 *
		 */
		public static function manage_layouts()
		{

			$output = '';

			$output .= '<a href="#" class="mb2-pb-importexportbtn" data-toggle="modal" data-target="#mb2-pb-modal-import-export" title="' . get_string('importexport','local_mb2builder') . '">';
			$output .= '<i class="fa fa-exchange fa-rotate-90"></i>';
			$output .= '</a>';

			return $output;

		}




		/*
		 *
		 * Method to replce shortcode
		 *
		 */
		public static function replace_shortcode( $content )
		{
			if ( ! strpos( $content, ']' ) )
			{
				return $content;
			}

			$patterg = '#\[.+\]#';
			return preg_replace( $patterg, get_string( 'shortcodereplaced', 'local_mb2builder'), $content );

		}




		/*
		 *
		 * Method to check if urltolink filter plugin is active and above shortcodes filter
		 *
		 */
		public static function check_urltolink_filter()
		{
			global $DB;

			// Chect if urltolink filter plugin is active
			$sql = 'SELECT * FROM {filter_active} WHERE ' . $DB->sql_like('filter', '?') . ' AND active = ?';

			// Make sure that urltolink filter is enabled
			// If not - return true
			if ( ! $DB->record_exists_sql( $sql, array( 'urltolink', 1 ) ) )
			{
				return true;
			}

			// Urltolink filter is enabled, so we have to check oreding of the filters
			$mb2shortcodes = $DB->get_record( 'filter_active', array( 'filter' => 'mb2shortcodes' ), 'sortorder', MUST_EXIST );
			$urltolink = $DB->get_record( 'filter_active', array( 'filter' => 'urltolink' ), 'sortorder', MUST_EXIST );

			// In this case shortcodes filter is above urltolink filter
			// This is ok, so we returns true
			if ( $mb2shortcodes->sortorder < $urltolink->sortorder )
			{
				return true;
			}

			return false;

		}





		/*
		 *
		 * Method to check if mb2shortcode filter is installed and activated
		 *
		 */
		public static function check_shortcodes_filter()
		{
			global $DB;

			$sql = 'SELECT * FROM {filter_active} WHERE ' . $DB->sql_like('filter', '?') . ' AND active = ?';
			return $DB->record_exists_sql( $sql, array( 'mb2shortcodes', 1 ) );
		}



	}


}
