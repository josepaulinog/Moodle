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
	'id' => 'animnum',
	'subid' => 'animnum_item',
	'title' => get_string('animnum', 'local_mb2builder'),
	'icon' => 'fa fa-bar-chart',
	'type'=> 'general',
	'tabs' => array(
		'general' => get_string('generaltab', 'local_mb2builder'),
		'style' => get_string('styletab', 'local_mb2builder')
	),
	'attr' => array(
		'columns'=>array(
			'type'=>'range',
			'min' => 1,
			'max' => 5,
			'section' => 'general',
			'title'=> get_string('columns', 'local_mb2builder'),
			'default' => 4,
			'action' => 'class',
			'changemode' => 'input',
			'selector' => '.mb2-pb-element-inner',
			'class_remove' => 'theme-col-1 theme-col-2 theme-col-3 theme-col-4 theme-col-5',
			'class_prefix' => 'theme-col-',
		),
		'gutter'=>array(
			'type'=>'buttons',
			'section' => 'general',
			'title'=> get_string('grdwidth', 'local_mb2builder'),
			'options' => array(
				'normal' => get_string( 'normal', 'local_mb2builder' ),
				'thin' => get_string( 'thin', 'local_mb2builder' ),
				'none' => get_string( 'none', 'local_mb2builder' ),
			),
			'default' => 'normal',
			'action' => 'class',
			'selector' => '.mb2-pb-element-inner',
			'class_remove' => 'gutter-thin gutter-normal gutter-none',
			'class_prefix' => 'gutter-',
		),
		'size_number'=>array(
			'type'=>'range',
			'min' => 1,
			'max' => 10,
			'step' => 0.1,
			'section' => 'general',
			'title'=> get_string('numsize', 'local_mb2builder'),
			'default' => 3,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.pbanimnum-number',
			'style_properity' => 'font-size',
			'style_suffix' => 'rem'
		),
		'fw_number'=>array(
			'type'=>'range',
			'section' => 'general',
			'title'=> get_string('fweight', 'local_mb2builder'),
			'min'=> 100,
			'max' => 900,
			'step' => 100,
			'default'=> 400,
			'action' => 'style',
			'style_suffix' => 'none',
			'changemode' => 'input',
			'selector' => '.pbanimnum-number',
			'style_properity' => 'font-weight'
		),
		'icon'=>array(
			'type'=>'yesno',
			'section' => 'general',
			'title'=> get_string('icon', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'action' => 'none',
			'default' => 0,
			'action' => 'class',
			'selector' => '.mb2-pb-element-inner',
			'class_prefix' => 'icon',
			'class_remove' => 'icon0 icon1'
		),
		'size_icon'=>array(
			'type'=>'range',
			'min' => 1,
			'max' => 10,
			'step' => 0.1,
			'showon' => 'icon:1',
			'section' => 'general',
			'title'=> get_string('iconsize', 'local_mb2builder'),
			'default' => 3,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.pbanimnum-icon',
			'style_properity' => 'font-size',
			'style_suffix' => 'rem'
		),
		'subtitle'=>array(
			'type'=>'yesno',
			'section' => 'general',
			'title'=> get_string('subtitle', 'local_mb2builder'),
			'options' => array(
				1 => get_string('yes', 'local_mb2builder'),
				0 => get_string('no', 'local_mb2builder')
			),
			'action' => 'none',
			'default' => 0,
			'action' => 'class',
			'selector' => '.mb2-pb-element-inner',
			'class_prefix' => 'subtitle',
			'class_remove' => 'subtitle0 subtitle1'
		),
		'aspeed'=>array(
			'type'=>'number',
			'section' => 'general',
			'min' => 100,
			'max' => 1000000,
			'title'=> get_string('aspeed', 'local_mb2builder'),
			'default'=> 20000,
			'action' => 'data'
		),
		'runbutton'=>array(
			'type'=>'html',
			'section' => 'general',
			'html'=> '<a href="#" class="btn btn-sm btn-success btn-full mb2-pb-animnum-run" style="margin-top:18px;">'  . get_string( 'runanimation', 'local_mb2builder' ) . '</a>'
		),
		'color_number'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('numcolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.pbanimnum-number',
			'style_properity' => 'color',
			'globalparent' => 1
		),
		'color_icon'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('iconcolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.pbanimnum-icon',
			'style_properity' => 'color',
			'globalparent' => 1
		),
		'color_title'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('titlecolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.pbanimnum-title',
			'style_properity' => 'color',
			'globalparent' => 1
		),
		'color_subtitle'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('subtitlecolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.pbanimnum-subtitle',
			'style_properity' => 'color',
			'globalparent' => 1
		),
		'color_bg'=>array(
			'type'=>'color',
			'section' => 'style',
			'title'=> get_string('bgcolor', 'local_mb2builder'),
			'action' => 'color',
			'selector' => '.pbanimnum-item',
			'style_properity' => 'background-color',
			'globalparent' => 1
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
			'default'=> 0,
			'action' => 'style',
			'changemode' => 'input',
			'style_properity' => 'margin-bottom'
		),
		'pv'=>array(
			'type'=>'range',
			'section' => 'style',
			'title'=> get_string('pvlabel', 'local_mb2builder'),
			'min'=> 0,
			'max' => 300,
			'default'=> 30,
			'action' => 'style',
			'changemode' => 'input',
			'selector' => '.pbanimnum-item',
			'style_properity' => 'padding-top',
			'style_properity2' => 'padding-bottom'
		),
		'custom_class'=>array(
			'type'=>'text',
			'section' => 'style',
			'title'=> get_string('customclasslabel', 'local_mb2builder'),
			'desc'=> get_string('customclassdesc', 'local_mb2builder')
		)

	),
	'subelement' => array(
		'tabs' => array(
			'general' => get_string('generaltab', 'local_mb2builder'),
			'style' => get_string('styletab', 'local_mb2builder')
		),
		'attr' => array(
			'number'=>array(
				'type' => 'number',
				'section' => 'general',
				'title' => get_string('number', 'local_mb2builder'),
				'default' => 0,
				'action' => 'text',
				'selector' => '.pbanimnum-number'
			),
			'title'=>array(
				'type'=>'text',
				'section' => 'general',
				'title'=> get_string('title', 'local_mb2builder'),
				'action' => 'text',
				'selector' => '.pbanimnum-title'
			),
			'subtitle'=>array(
				'type'=>'text',
				'section' => 'general',
				'title'=> get_string('subtitle', 'local_mb2builder'),
				'action' => 'text',
				'selector' => '.pbanimnum-subtitle'
			),
			'icon'=>array(
				'type'=>'icon',
				'section' => 'general',
				'title'=> get_string('icon', 'local_mb2builder'),
				'default' => 'fa fa-graduation-cap',
				'action' => 'icon',
				'selector' => '.pbanimnum-icon i'
			),
			'color_number'=>array(
				'type'=>'color',
				'section' => 'style',
				'title'=> get_string('numcolor', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.pbanimnum-number',
				'style_properity' => 'color',
				'globalchild' => 1
			),
			'color_icon'=>array(
				'type'=>'color',
				'section' => 'style',
				'title'=> get_string('iconcolor', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.pbanimnum-icon',
				'style_properity' => 'color',
				'globalchild' => 1
			),
			'color_title'=>array(
				'type'=>'color',
				'section' => 'style',
				'title'=> get_string('titlecolor', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.pbanimnum-title',
				'style_properity' => 'color',
				'globalchild' => 1
			),
			'color_subtitle'=>array(
				'type'=>'color',
				'section' => 'style',
				'title'=> get_string('subtitlecolor', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.pbanimnum-subtitle',
				'style_properity' => 'color',
				'globalchild' => 1
			),
			'color_bg'=>array(
				'type'=>'color',
				'section' => 'style',
				'title'=> get_string('bgcolor', 'local_mb2builder'),
				'action' => 'color',
				'selector' => '.pbanimnum-item',
				'style_properity' => 'background-color',
				'globalchild' => 1
			)
		)
	)
);


define('LOCAL_MB2BUILDER_SETTINGS_ANIMNUM', base64_encode( serialize( $mb2_settings ) ));