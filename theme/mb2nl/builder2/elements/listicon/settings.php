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


$mb2_settings = array(
	'id' => 'listicon',
	'subid' => 'listicon_item',
	'title' => get_string('listicon', 'local_mb2builder'),
	'icon' => 'fa fa-list',
	'type'=> 'general',
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder')
		//'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(
		// 'columns'=>array(
		// 	'type'=>'list',
		// 	'section' => 'general',
		// 	'title'=> get_string('columns', 'local_mb2builder'),
		// 	'options' => array(
		// 		1 => '1',
		// 		2 => '2',
		// 		3 => '3',
		// 		4 => '4',
		// 		5 => '5'
		// 	)
		// ),
		'icon'=>array(
			'type'=>'icon',
			'section' => 'general',
			'title'=> get_string('icon', 'local_mb2builder'),
			'action' => 'icon',
			'default' => 'fa fa-check-square-o',
			'selector' => '.iconel i',
			'globalparent' => 1
		),
		'iconcolor'=>array(
			'type'=>'color',
			'section' => 'general',
			'title'=> get_string('color', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.iconel',
			'style_properity' => 'color',
			'globalparent' => 1
		),
		'bgcolor'=>array(
			'type'=>'color',
			'section' => 'general',
			'title'=> get_string('bgcolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.iconel',
			'style_properity' => 'background-color',
			'globalparent' => 1
		),


		// 'horizontal' => array(
		// 	'type' => 'yesno',
		// 	'section' => 'general',
		// 	'title'=> get_string('horizontal', 'local_mb2builder'),
		// 	'showon' => 'style:none|icon',
		// 	'options' => array(
		// 		1 => get_string('yes', 'local_mb2builder'),
		// 		0 => get_string('no', 'local_mb2builder')
		// 	),
		// 	'default' => 0,
		// 	'action' => 'class',
		// 	'selector' => '.theme-list',
		// 	'class_remove' => 'horizontal0 horizontal1',
		// 	'class_prefix' => 'horizontal'
		// ),
		// 'align'=>array(
		// 	'type'=>'buttons',
		// 	'section' => 'general',
		// 	'showon' => 'style:none|icon',
		// 	'title'=> get_string('alignlabel', 'local_mb2builder'),
		// 	'options' => array(
		// 		'left' => get_string('left', 'local_mb2builder'),
		// 		'center' => get_string('center', 'local_mb2builder'),
		// 		'right' => get_string('right', 'local_mb2builder')
		// 	),
		// 	'default' => 'left',
		// 	'action' => 'class',
		// 	'selector' => '.theme-list',
		// 	'class_remove' => 'list-left list-right list-center',
		// 	'class_prefix' => 'list-'
		// ),
		'mt'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('mt', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 0,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => 'margin-top'
		),
		'mb'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('mb', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 30,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => 'margin-bottom'
		),
		'custom_class'=>array(
			'type'=>'text',
			'section' => 'general',
			'title'=> get_string('customclasslabel', 'local_mb2builder'),
			'desc'=> get_string('customclassdesc', 'local_mb2builder'),
			'default'=> ''
		)
	),
	'subelement' => array(
		'tabs' => array(
			'general' => get_string('generaltab', 'local_mb2builder')
		),
		'attr' => array(
			'text'=>array(
				'type'=>'textarea',
				'section' => 'general',
				'title'=> get_string('text', 'local_mb2builder'),
				'action' => 'text',
				'default' => 'List content here.',
				'selector' => '.list-text'
			),
			'icon'=>array(
				'type'=>'icon',
				'section' => 'general',
				'title'=> get_string('icon', 'local_mb2builder'),
				'action' => 'icon',
				'default' => '',
				'selector' => '.iconel i',
				'globalchild' => 1
			),
			'iconcolor'=>array(
				'type'=>'color',
				'section' => 'general',
				'title'=> get_string('color', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.iconel',
				'style_properity' => 'color',
				'globalchild' => 1
			),
			'bgcolor'=>array(
				'type'=>'color',
				'section' => 'general',
				'title'=> get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.iconel',
				'style_properity' => 'background-color',
				'globalchild' => 1
			),
			'link'=>array(
				'type'=>'text',
				'section' => 'general',
				'title'=> get_string('link', 'local_mb2builder')
			),
			'link_target'=>array(
				'type'=>'yesno',
				'section' => 'general',
				'title'=> get_string('linknewwindow', 'local_mb2builder'),
				'options' => array(
					1 => get_string('yes', 'local_mb2builder'),
					0 => get_string('no', 'local_mb2builder')
				),
				'action' => 'none',
				'default' => 0
			)
		)
	)
);


define( 'LOCAL_MB2BUILDER_SETTINGS_LISTICON', base64_encode( serialize( $mb2_settings ) ) );
