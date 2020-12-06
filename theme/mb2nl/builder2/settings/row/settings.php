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
 * @package    local_mb2builder
 * @copyright  2018 - 2020 Mariusz Boloz (https://mb2themes.com/)
 * @license    Commercial https://themeforest.net/licenses
 */

defined('MOODLE_INTERNAL') || die();



$mb2_settings_row = array(
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		//'rowheader' => get_string('rowheader', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr'=>array(
		// 'rowheader' => array(
		// 	'type' => 'yesno',
		// 	'section' => 'rowheader',
		// 	'title'=> get_string('rowheader', 'local_mb2builder'),
		// 	'options' => array(
		// 		1 => get_string('yes', 'local_mb2builder'),
		// 		0 => get_string('no', 'local_mb2builder')
		// 	),
		// 	'default' => 0,
		// 	'action' => 'class',
		// 	'class_prefix' => 'isheader',
		// 	'class_remove' => 'isheader0 isheader1'
		// ),
		// 'rowheader_content' => array(
		// 	'type' => 'text',
		// 	'section' => 'rowheader',
		// 	'showon' => 'rowheader:1',
		// 	'title'=> get_string('rowheadercontent', 'local_mb2builder'),
		// 	'action' => 'text',
		// 	'selector' => '.header-text',
		// 	'default' => 'Row title here'
		// ),
		// 'rowheader_mb' => array(
		// 	'type'=>'range',
		// 	'section' => 'rowheader',
		// 	'showon' => 'rowheader:1',
		// 	'title'=> get_string('mb', 'local_mb2builder'),
		// 	'min'=> 0,
		// 	'max' => 300,
		// 	'default'=> 30,
		// 	'action' => 'style',
		// 	'changemode' => 'input',
		// 	'selector' => '.mb2-pb-row-header',
		// 	'style_properity' => 'margin-bottom'
		// ),
		// 'rowheader_textcolor' => array(
		// 	'type' => 'color',
		// 	'section' => 'rowheader',
		// 	'showon' => 'rowheader:1',
		// 	'title'=> get_string('textcolor', 'local_mb2builder'),
		// 	'action' => 'color',
		// 	'selector' => '.header-text',
		// 	'style_properity' => 'color'
		// ),
		// 'rowheader_bgcolor' => array(
		// 	'type' => 'color',
		// 	'section' => 'rowheader',
		// 	'showon' => 'rowheader:1',
		// 	'title'=> get_string('bgcolor', 'local_mb2builder'),
		// 	'action' => 'color',
		// 	'selector' => '.mb2-pb-row-header',
		// 	'style_properity' => 'background-color'
		// ),
		'rowlang' => array(
			'type'=>'text',
			'section' => 'general',
			'title'=> get_string('language', 'core'),
			'desc'=> get_string('languagedesc', 'local_mb2builder'),
			'action' => 'text',
			'selector' => '.mb2-pb-actions .languages'
		),
		'rowaccess' => array(
			'type' => 'list',
			'section' => 'general',
			'title'=> get_string('elaccess', 'local_mb2builder'),
			'options' => array(
				0 => get_string('elaccessall', 'local_mb2builder'),
				1 => get_string('elaccessusers', 'local_mb2builder'),
				2 => get_string('elaccesguests', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'class_prefix' => 'access',
			'class_remove' => 'access0 access1 access2'
		),
		'rowhidden' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('hidden', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'class_prefix' => 'hidden',
			'class_remove' => 'hidden0 hidden1'
		),
		'fw' => array(
			'type' => 'yesno',
			'section' => 'general',
			'title'=> get_string('fullwidth', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'class_prefix' => 'isfw',
			'class_remove' => 'isfw0 isfw1'
		),
		'colgutter'=>array(
			'type' => 'buttons',
			'section' => 'general',
			'title'=> get_string('colspace', 'local_mb2builder'),
			'options' => array(
				'none' => get_string('none', 'local_mb2builder'),
				's' => get_string('small', 'local_mb2builder'),
				'm' => get_string('medium', 'local_mb2builder'),
				'l' => get_string('large', 'local_mb2builder'),
				'xl' => get_string('xlarge', 'local_mb2builder')
			),
			'default' => 's',
			'action' => 'class',
			'class_remove' => 'colgutter-none colgutter-m colgutter-s colgutter-l colgutter-xl',
			'class_prefix' => 'colgutter-',
		),
		'pt' => array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('ptlabel', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 70,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.section-inner',
			'style_properity' => 'padding-top',
		),
		'pb' => array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('pblabel', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 10,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.section-inner',
			'style_properity' => 'padding-bottom'
		),
		'scheme' => array(
			'type' => 'buttons',
			'section' => 'style',
			'title'=> get_string('scheme', 'local_mb2builder'),
			'options' => array(
				'light' => get_string('light', 'local_mb2builder'),
				'dark' => get_string('dark', 'local_mb2builder')
			),
			'default' => 'light',
			'action' => 'class',
			'class_remove' => 'light dark'
		),
		'bgcolor' => array(
			'type' => 'color',
			'section' => 'style',
			'title'=> get_string('bgcolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.section-inner',
			'style_properity' => 'background-color'
		),
		'prbg' => array(
			'type' => 'list',
			'section' => 'style',
			'title'=> get_string('prestyle', 'local_mb2builder'),
			'options' => array(
				0 => get_string('none', 'local_mb2builder'),
				'gradient20' => get_string('gradient20', 'local_mb2builder'),
				'gradient40' => get_string('gradient40', 'local_mb2builder'),
				'strip1' => get_string('strip1', 'local_mb2builder'),
				'strip2' => get_string('strip2', 'local_mb2builder'),
				'strip3' => get_string('strip3', 'local_mb2builder'),
				'strip4' => get_string('strip4', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'class_prefix' => 'pre-bg',
			'class_remove' => 'pre-bggradient20 pre-bggradient40 pre-bgstrip1 pre-bgstrip2 pre-bgstrip3 pre-bgstrip4'
		),
		'bgimage' => array(
			'type' => 'image',
			'section' => 'style',
			'title'=> get_string('bgimage', 'local_mb2builder'),
			'action' => 'image',
			'style_properity' => 'background-image'
		),
		'bgfixed' => array(
			'type' => 'yesno',
			'section' => 'style',
			'title'=> get_string('bgfixed', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'class_prefix' => 'bgfixed',
			'class_remove' => 'bgfixed0 bgfixed1'
		),
		// 'wave' => array(
		// 	'type' => 'yesno',
		// 	'section' => 'style',
		// 	'title'=> get_string('wave', 'local_mb2builder'),
		// 	'options' => array(
		// 		1 => get_string('yes', 'local_mb2builder'),
		// 		0 => get_string('no', 'local_mb2builder')
		// 	),
		// 	'default' => 0,
		// 	'action' => 'class',
		// 	'class_prefix' => 'wave',
		// 	'class_remove' => 'wave0 wave1'
		// ),
		// 'wavecolor' => array(
		// 	'type' => 'color',
		// 	'section' => 'style',
		// 	'title'=> get_string('wavecolor', 'local_mb2builder'),
		// 	'action' => 'color',
		// 	'selector' => '.mb2-pb-row-wave path',
		// 	'style_properity' => 'fill'
		// ),
		'custom_class' => array(
			'type'=>'text',
			'section' => 'style',
			'title'=> get_string('customclasslabel', 'local_mb2builder'),
			'desc'=> get_string('customclassdesc', 'local_mb2builder'),
			'default'=> ''
		)

	)
);

define('LOCAL_MB2BUILDER_SETTINGS_ROW', base64_encode( serialize( $mb2_settings_row ) ) );
