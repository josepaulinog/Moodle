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

defined( 'MOODLE_INTERNAL' ) || die();

$mb2_settings = array(
	'id' => 'hero',
	'title' => get_string( 'hero', 'local_mb2builder' ),
	'items' => array(
		array(
			'name' => 'hero-1',
			'thumb' => 'hero-1',
			'tags' => 'hero video',
			'data' => '{"type":"mb2pb_row","settings":{"id":"row","bgcolor":"rgba(2, 32, 54, 0.65)","bgfixed":"0","colgutter":"s","prbg":"0","scheme":"dark","bgimage":"mb2sampledata:2020/08/typing-690856","rowhidden":"0","pt":"120","pb":"70","fw":"0","rowaccess":"0","elname":"Row"},"attr":[{"type":"mb2pb_col","settings":{"id":"column","col":"6","pt":"0","pb":"30","mobcenter":"1","moborder":"0","align":"left","height":"0","scheme":"light","elname":"Column"},"attr":[{"type":"mb2pb_el","settings":{"id":"heading","tag":"h2","size":"2.8","align":"left","fweight":"700","lspacing":"0","wspacing":"0","upper":"0","mt":"0","mb":"20","content":"Pellentesque libero tortor","elname":"Heading"},"attr":[]},{"type":"mb2pb_el","settings":{"id":"text","align":"left","size":"n","sizerem":"1.2","showtitle":"0","fweight":"300","lspacing":"0","wspacing":"0","upper":"0","title":"Title text","mt":"0","mb":"30","content":"<p>Fusce vel dui. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Nunc nulla. Duis vel nibh at velit scelerisque suscipit. Praesent turpis.</p>","elname":"Text"},"attr":[]},{"type":"mb2pb_el","settings":{"id":"button","type":"primary","size":"xlg","link":"#","target":"0","fw":"0","fweight":"400","lspacing":"0","wspacing":"0","rounded":"0","upper":"0","ml":"0","mr":"0","mt":"0","mb":"20","border":"0","center":"0","text":"Start learning now","elname":"Button"},"attr":[]}]},{"type":"mb2pb_col","settings":{"id":"column","col":"6","pt":"0","pb":"30","mobcenter":"0","moborder":"0","align":"left","height":"0","scheme":"light","elname":"Column"},"attr":[]}]}'
		),
		array(
			'name' => 'hero-2',
			'thumb' => 'hero-2',
			'tags' => 'hero',
			'data' => '{"type":"mb2pb_row","settings":{"id":"row","bgcolor":"rgba(10, 9, 8, 0.65)","bgfixed":"0","colgutter":"s","prbg":"0","scheme":"dark","bgimage":"mb2sampledata:2020/08/technology-791032","rowhidden":"0","pt":"120","pb":"60","fw":"0","rowaccess":"0","elname":"Row"},"attr":[{"type":"mb2pb_col","settings":{"id":"column","col":"12","pt":"0","pb":"30","mobcenter":"1","moborder":"0","align":"center","height":"0","scheme":"light","elname":"Column"},"attr":[{"type":"mb2pb_el","settings":{"id":"heading","tag":"h4","size":"3.5","align":"none","fweight":"700","lspacing":"0","wspacing":"0","upper":"1","mt":"0","mb":"16","content":"Suspendisse pulvinar augue ac venenatis","elname":"Heading"},"attr":[]},{"type":"mb2pb_el","settings":{"id":"text","align":"none","size":"n","sizerem":"1.6","showtitle":"0","fweight":"300","lspacing":"0","wspacing":"0","upper":"0","title":"Title text","mt":"0","mb":"30","content":"<p>Donec rutrum congue leo eget malesuada nulla quis lorem ut libero</p>","elname":"Text"},"attr":[]},{"type":"mb2pb_el","settings":{"id":"button","type":"primary","size":"xlg","link":"#","target":"0","fw":"0","fweight":"400","lspacing":"0","wspacing":"0","rounded":"0","upper":"0","ml":"0","mr":"0","mt":"0","mb":"15","border":"0","center":"0","text":"Start study now","elname":"Button"},"attr":[]}]}]}'
		),
		array(
			'name' => 'hero-3',
			'thumb' => 'hero-3',
			'tags' => 'hero search',
			'data' => '{"type":"mb2pb_row","settings":{"id":"row","bgcolor":"rgba(10, 9, 8, 0.62)","bgfixed":"0","colgutter":"normal","prbg":"0","scheme":"dark","bgimage":"mb2sampledata:2020/08/internet-3589685","rowhidden":"0","pt":"120","pb":"60","fw":"0","rowaccess":"0","elname":"Row"},"attr":[{"type":"mb2pb_col","settings":{"id":"column","col":"12","pt":"0","pb":"30","mobcenter":"1","moborder":"0","align":"center","height":"0","scheme":"light","elname":"Column"},"attr":[{"type":"mb2pb_el","settings":{"id":"heading","tag":"h4","size":"3.5","align":"none","fweight":"700","lspacing":"0","wspacing":"0","upper":"1","mt":"0","mb":"16","content":"Suspendisse pulvinar augue ac venenatis","elname":"Heading"},"attr":[]},{"type":"mb2pb_el","settings":{"id":"text","align":"none","size":"n","sizerem":"1.6","showtitle":"0","fweight":"300","lspacing":"0","wspacing":"0","upper":"0","title":"Title text","mt":"0","mb":"30","content":"<p>Donec rutrum congue leo eget malesuada nulla quis lorem ut libero</p>","elname":"Text"},"attr":[]},{"type":"mb2pb_el","settings":{"id":"search","placeholder":"Search courses","global":"0","rounded":"0","width":"750","size":"n","mt":"0","mb":"30","elname":"Search"},"attr":[]}]}]}'
			)

	)
);

define( 'LOCAL_MB2BUILDER_IMPORT_BLOCKS_HERO', base64_encode( serialize( $mb2_settings ) ) );
