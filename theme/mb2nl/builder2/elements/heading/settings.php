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
	'id' => 'heading',
	'subid' => '',
	'title' => get_string('elheading', 'local_mb2builder'),
	'icon' => 'fa fa-text-height',
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		'typo' => get_string('typotab', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(
		'content'=>array(
			'type'=>'text',
			'section' => 'general',
			'title'=> get_string('text', 'local_mb2builder'),
			'action' => 'text',
			'selector' => '.heading',
			'default' => 'Heading text here'
		),
		'tag'=>array(
			'type'=>'list',
			'section' => 'general',
			'title'=> get_string('htmltag', 'local_mb2builder'),
			'options' => array(
				'h1' => 'h1',
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
				'h5' => 'h5',
				'h6' => 'h6'
			),
			'default' => 'h4',
			'action' => 'class',
			'selector' => '.heading',
			'class_remove' => 'h1 h2 h3 h4 h5 h6'
		),
		'size'=>array(
			'type' => 'range',
			'section' => 'typo',
			'title'=> get_string('sizelabel', 'local_mb2builder'),
			'min'=> 1,
			'max' => 10,
			'step' => 0.1,
			'default'=> 1.4,
			'action' => 'style',
			'style_suffix' => 'none',
			'changemode' => 'input',
			'selector' => '.heading',
			'style_properity' => 'font-size',
			'style_suffix' => 'rem',
			'numclass' => 1,
			'sizepref' => 'hsize'
		),
		'fweight'=>array(
			'type'=>'range',
			'section' => 'typo',
			'title'=> get_string('fweight', 'local_mb2builder'),
			'min'=> 100,
			'max' => 900,
			'step' => 100,
			'default'=> 400,
			'action' => 'style',
			'style_suffix' => 'none',
			'changemode' => 'input',
			'selector' => '.heading',
			'style_properity' => 'font-weight'
		),
		'lspacing'=>array(
			'type'=>'range',
			'section' => 'typo',
			'title'=> get_string('lspacing', 'local_mb2builder'),
			'min'=> -10,
			'max' => 30,
			'step' => 1,
			'default'=> 0,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.heading',
			'style_properity' => 'letter-spacing'
		),
		'wspacing'=>array(
			'type'=>'range',
			'section' => 'typo',
			'title'=> get_string('wspacing', 'local_mb2builder'),
			'min'=> -10,
			'max' => 30,
			'step' => 1,
			'default'=> 0,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.heading',
			'style_properity' => 'word-spacing'
		),
		'align'=>array(
			'type' => 'buttons',
			'section' => 'typo',
			'title'=> get_string('alignlabel', 'local_mb2builder'),
			'options' => array(
				'none' => get_string('none', 'local_mb2builder'),
				'left' => get_string('left', 'local_mb2builder'),
				'center' => get_string('center', 'local_mb2builder'),
				'right' => get_string('right', 'local_mb2builder')
			),
			'default' => 'none',
			'action' => 'class',
			'selector' => '.heading',
			'class_remove' => 'heading-none heading-left heading-right heading-center',
			'class_prefix' => 'heading-'
		),
		'upper' => array(
			'type' => 'yesno',
			'section' => 'typo',
			'title'=> get_string('uppercase', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'default' => 0,
			'action' => 'class',
			'selector' => '.heading',
			'class_remove' => 'upper0 upper1',
			'class_prefix' => 'upper',
		),
		'color' => array(
			'type' => 'color',
			'section' => 'style',
			'title'=> get_string('color', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.heading',
			'style_properity' => 'color'
		),
		'mt'=>array(
			'type'=>'range',
			'section' => 'style',
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
			'section' => 'style',
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
			'section' => 'style',
			'title'=> get_string('customclasslabel', 'local_mb2builder'),
			'desc'=> get_string('customclassdesc', 'local_mb2builder')
		)
	)
);


define( 'LOCAL_MB2BUILDER_SETTINGS_HEADING', base64_encode( serialize( $mb2_settings ) ) );
