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

$string['pluginname'] = 'Mb2 Builder';

// Settings menu
$string['builder'] = 'Builder';
$string['builderfooter'] = 'Footer builder';
$string['builderarea'] = 'Builder area {$a->id}';
$string['images'] = 'Media';
$string['options'] = 'Options';
$string['layouts'] = 'Layouts';
$string['layoutscustom'] = 'Custom layouts';
$string['theme'] = 'Theme';
$string['managepages'] = 'Pages';
$string['mb2builder:view'] = "Mb2 front page builder";


// Page builder
$string['addsection'] = 'Add section';
$string['addrow'] = 'Add row';
$string['remove'] = 'Remove';
$string['resettodefault'] = 'Set default';
$string['settings'] = 'Settings';
$string['move'] = 'Move';
$string['section'] = 'Section';
$string['row'] = 'Row';
$string['column'] = 'Column';
$string['duplicate'] = 'Duplicate';
$string['columns'] = 'Columns';
$string['addelement'] = 'Add element';
$string['element'] = 'Element';
$string['subelement'] = 'Subelement';
$string['copy'] = 'Copy';
$string['item'] = 'item';
$string['close'] = 'Close';
$string['selecticon'] = 'Select icon';
$string['downloadcontent'] = 'Export page content';
$string['importexport'] = 'Import/Export';
$string['import'] = 'Import custom layout';
$string['importrows'] = 'Blocks';
$string['export'] = 'Export layout';
$string['overridelayout'] = 'Replace layout';

$string['importlabel'] = 'Insert valid JSON string';
$string['importtextempty'] = 'Import field is empty.';
$string['importtextnotvalidjson'] = 'Imported content is not a valid JSON object.';
$string['importsuccess'] = 'Import done. Click \'Save changes\' button to keep changes.';
$string['icons'] = 'Icons';
$string['carouselitems'] = 'Carousel items';
$string['cannotremove'] = 'This element can\'t be removed.';
$string['searchiconfor'] = 'Search icons for...';
$string['searchimagefor'] = 'Search image for...';
$string['cantopenmodal'] = 'You can\'t open two modal windows.';


// Settings
$string['generaltab'] = 'General';
$string['styletab'] = 'Style';
$string['typotab'] = 'Typography';
$string['adminlabellabel'] = 'Admin label';
$string['adminlabeldesc'] = 'Enter admin label of this element for easy identification.';
$string['customclasslabel'] = 'Custom css class';
$string['customclassdesc'] = 'Use this field to add a custom css class and then refer to it in your css style.';
$string['rowheader'] = 'Row header';
$string['rowicon'] = 'Row icon';
$string['rowtext'] = 'Row text';
$string['iconposh'] = 'Icon horizontal position';
$string['iconposv'] = 'Icon vertical position';
$string['textcolor'] = 'Text color';
$string['bgcolor'] = 'Background color';
$string['rowtextsize'] = 'Font size (rem)';
$string['yes'] = 'Yes';
$string['no'] = 'No';
$string['on'] = 'On';
$string['off'] = 'Off';
$string['rowheadercontent'] = 'Row header text';
$string['rowheaderbig'] = 'Big header';
$string['columns'] = 'Columns';
$string['marginlabel'] = 'Margin';
$string['margindesc'] = 'Margin top right bottom left, for example: 10px 15px 30px 15px';
$string['titletext'] = 'Title text';
$string['mt'] = 'Margin top (px)';
$string['mb'] = 'Margin bottom (px)';
$string['ml'] = 'Margin left (px)';
$string['mr'] = 'Margin right (px)';
$string['subtitle'] = 'Subtitle';
$string['text'] = 'Text';
$string['ptlabel'] = 'Padding top (px)';
$string['pblabel'] = 'Padding bottom (px)';
$string['phlabel'] = 'Padding left/right (px)';
$string['pvlabel'] = 'Padding top/bottom (px)';
$string['ptlabelrem'] = 'Padding top (rem)';
$string['pblabelrem'] = 'Padding bottom (rem)';
$string['link'] = 'Link';
$string['linknewwindow'] = 'Open link in a new window';
$string['linktarget'] = 'Open link';
$string['linktargetblank'] = 'In a new window';
$string['linktargetself'] = 'In the same window';
$string['icon'] = 'Icon';
$string['icon2'] = 'Icon';
$string['selecticon'] = 'Select icon';
$string['videoidlabel'] = 'Web video URL';
$string['videoiddesc'] = 'Paste URL of video which can be embeded, for example Youtube or Vimeo or Aparat (aparat.com).';
$string['customvideolabel'] = 'Custom video';
$string['videofile'] = 'Video file';
$string['widthlabel'] = 'Width (px)';
$string['bgimagelabel'] = 'Background image';
$string['bgfixed'] = 'Fixed background';
$string['elheading'] = 'Heading';
$string['heading'] = 'Heading';
$string['sizelabel'] = 'Size';
$string['line'] = 'Line';
$string['default'] = 'Default';
$string['paragraph'] = 'Paragraph';
$string['htmltag'] = 'HTML tag';
$string['normal'] = 'Normal';
$string['small'] = 'S';
$string['medium'] = 'M';
$string['alignlabel'] = 'Align';
$string['left'] = 'Left';
$string['right'] = 'Right';
$string['center'] = 'Center';
$string['color'] = 'Color';
$string['accordionparent'] = 'Close other panels when current panel is open';
$string['accordionopen'] = 'Show panel #';
$string['content'] = 'Content';
$string['itemsperpage'] = 'Items per page';
$string['catidslabel'] = 'Categories IDs';
$string['catidsdesc'] = 'Comma separated categories IDs.';
$string['cids'] = 'Courses IDs';
$string['cidsdesc'] = 'Comma separated courses IDs.';
$string['courses'] = 'Courses';
$string['none'] = 'None';
$string['exclude'] = 'Exclude';
$string['include'] = 'Include';
$string['carouseltab'] = 'Carousel';
$string['layouttab'] = 'Layout';
$string['slidercolumns'] = 'Carousel columns';
$string['pagernav'] = 'Pager navigation';
$string['loop'] = 'Animation loop';
$string['dirnav'] = 'Prev next navigation';
$string['spausetime'] = 'Pause time (ms)';
$string['sanimate'] = 'Animation time (ms)';
$string['autoplay'] = 'Auto play';
$string['desclimit'] = 'Description words limit';
$string['titlelimit'] = 'Title words limit';
$string['readmorebtn'] = 'Link button';
$string['btntext'] = 'Button text';
$string['thin'] = 'Thin';
$string['normal'] = 'Normal';
$string['wholeitemlink'] = 'Whole item link';
$string['showall'] = 'Show all';
$string['grdwidth'] = 'Grid width';
$string['prestyle'] = 'Predefined style';
$string['colors'] = 'Custom colors';
$string['colorsdesc'] = 'Set custom colors for items. Use "item_id:color_value" (hex or rgb). For more items add comma separator, for example I have four items with the following ids: 1, 2, 3, 15 and I want to set custom colors for these items:<br><pre>1:#0000cc,2:#009933,3:#993333,15:#cc9933</pre>';
$string['bgimage'] = 'Background image';
$string['strip1'] = 'Strip left white';
$string['strip2'] = 'Strip left black';
$string['strip3'] = 'Strip vertical black';
$string['strip4'] = 'Strip vertical white';
$string['gradient20'] = 'Gradient 20';
$string['gradient40'] = 'Gradient 40';
$string['scheme'] = 'Color scheme';
$string['light'] = 'Light';
$string['dark'] = 'Dark';
$string['dark_striped'] = 'Dark striped';
$string['light_striped'] = 'Light striped';
$string['pricetab'] = 'Prices';
$string['courseprices'] = 'Courses prices';
$string['coursepricesdesc'] = 'Set comma separated prices for selected courses. Use "course_id:normal_price:old_price", the "old_price" is optional.';
$string['currency'] = 'Currency';
$string['subtext'] = 'Subtext';
$string['type'] = 'Type';
$string['typen'] = 'Type {$a->type}';
$string['primary'] = 'Primary';
$string['gray'] = 'Gray';
$string['secondary'] = 'Secondary';
$string['success'] = 'Success';
$string['warning'] = 'Warning';
$string['info'] = 'Info';
$string['danger'] = 'Danger';
$string['inverse'] = 'Inverse';
$string['large'] = 'L';
$string['xlarge'] = 'XL';
$string['xxlarge'] = 'XXL';
$string['xsmall'] = 'XS';
$string['fullwidth'] = 'Full width';
$string['rounded'] = 'Rounded';
$string['border'] = 'Border';
$string['image'] = 'Image';
$string['tabpos'] = 'Tabs position';
$string['top'] = 'Top';
$string['bottom'] = 'Bottom';
$string['height'] = 'Height (px)';
$string['smallscreen'] = 'Show on small screen';
$string['spin'] = 'Spin';
$string['rotate'] = 'Rotate {$a->rotate}';
$string['flip_hor'] = 'Flip horizontal';
$string['flip_ver'] = 'Flip vertical';
$string['alttext'] = 'Alternative text';
$string['custom'] = 'Custom';
$string['solid'] = 'Solid';
$string['dotted'] = 'Dotted';
$string['dashed'] = 'Dashed';
$string['double'] = 'Double';
$string['square'] = 'Square';
$string['circle'] = 'Circle';
$string['disc'] = 'Disc';
$string['horizontal'] = 'Horizontal';
$string['number'] = 'Number';
$string['itemdate'] = 'Show item date';
$string['titleandimage'] = 'Title and image';
$string['closebtn'] = 'Close button';
$string['hidden'] = 'Hidden';
$string['onlyfortype'] = 'Only for type {$a->type}';
$string['languagedesc'] = 'Type a language code or comma-separated list of codes for displaying the section/row to users of the specified language only.';
$string['numsize'] = 'Number size (rem)';
$string['iconsize'] = 'Icon size (rem)';
$string['numcolor'] = 'Number color';
$string['iconcolor'] = 'Icon color';
$string['titlecolor'] = 'Title color';
$string['subtitlecolor'] = 'Subtitle color';
$string['elaccess'] = 'Who can see this section/row?';
$string['elaccessall'] = 'Everyone';
$string['elaccessusers'] = 'Only for logged in users';
$string['elaccesguests'] = 'Only for guests';
$string['global'] = 'Global';
$string['runanimation'] = 'Run animation';
$string['aspeed'] = 'Animation speed (ms)';
$string['coursescount'] = 'Courses in category';
$string['caption'] = 'Caption';
$string['all'] = 'All';
$string['category'] = 'Category:';
$string['wave'] = 'Wave';
$string['wavecolor'] = 'Wave color';
$string['mobcenter'] = 'Center content on small screens';
$string['fweight'] = 'Font weight';
$string['lspacing'] = 'Space between characters (px)';
$string['wspacing'] = 'Space between words (px)';
$string['uppercase'] = 'Uppercase';
$string['moborder'] = 'Order on small screens';
$string['globalsearch'] = 'Global search';
$string['placeholder'] = 'Placeholder text';
$string['colspace'] = 'Column gutter';
$string['mobcolumns'] = 'Multiple columns on small screens';
$string['imgwidth'] = 'Image width';
$string['url'] = 'Url';

// Settings editor
$string['center'] = 'Center';
$string['imgdescription'] = 'Image description';
$string['selectimage'] = 'Select media';
$string['uploadimages'] = 'Upload media';
$string['removeformat'] = 'Remove formatting';
$string['accordion'] = 'Accordion';
$string['accordion_item'] = 'Accordion item';

// Elements
$string['elcode'] = 'Code';
$string['animnum'] = 'Animated number';
$string['animnum_item'] = 'Animated number item';
$string['list'] = 'List';
$string['list_item'] = 'List item';
$string['listicon'] = 'List icon';
$string['listicon_item'] = 'List icon item';
$string['eltext'] = 'Text';
$string['elboxesicon'] = 'Boxes - icon';
$string['boxesicon'] = 'Boxes - icon';
$string['boxesicon_item'] = 'Box icon';
$string['elboxesimg'] = 'Boxes - image';
$string['boxesimg'] = 'Boxes - image';
$string['boxesimg_item'] = 'Box image';
$string['videoweb'] = 'Video - web';
$string['videolocal'] = 'Video - local';
$string['video'] = 'Video';
$string['categories'] = 'Categories';
$string['title'] = 'Title';
$string['name'] = 'Name';
$string['button'] = 'Button';
$string['tabs'] = 'Tabs';
$string['tabs_item'] = 'Tabs item';
$string['carousel'] = 'Carousel';
$string['carousel_item'] = 'Carousel item';
$string['elboxescontent'] = 'Boxes content';
$string['gap'] = 'Gap';
$string['header'] = 'Header';
$string['announcements'] = 'Site announcements';
$string['alert'] = 'Alert';
$string['iframe'] = 'Embed content';

// Manage pages and layout
$string['addpage'] = 'Add page';
$string['createdby'] = 'Created by';
$string['modifiedby'] = 'Modified by';
$string['editpage'] = 'Edit page';
$string['editlayout'] = 'Edit layout';
$string['pagecreated'] = 'Page created';
$string['pageupdated'] = 'Page updated: <strong>{$a->title}</strong>';
$string['layoutcreated'] = 'Layout saved';
$string['layoutupdated'] = 'Layout updated: <strong>{$a->title}</strong>';
$string['strftimedatemonthabbr'] = '%d %b %Y';
$string['shortcode'] = 'Shortcode';
$string['search:content'] = 'Mb2 pages';
$string['moodlepage'] = 'Moodle page';
$string['nopage'] = 'No page contains this shortcode';
$string['customize'] = 'Customize page';
$string['deletepage'] = 'Delete page';
$string['pagedeleted'] = 'Page deleted.';
$string['deletelayout'] = 'Delete layout';
$string['layoutdeleted'] = 'Layout deleted.';
$string['confirmdeletelayout'] = 'Do you really want to delete layout: <strong>{$a->title}</strong>?';
$string['confirmdeletepage'] = 'Do you really want to delete page: <strong>{$a->title}</strong>?';
$string['savelayoutbtn'] = 'Save layout';
$string['savelayoutplh'] = 'Layout name...';
$string['selectlayout'] = 'Select layout';
$string['chooselayout'] = 'Chose custom layout';
$string['requirefield'] = 'This field is required';
$string['processing'] = 'Processing...';
$string['importlayoutbtn'] = 'Import layout';
$string['importkeep'] = 'Keep current content';
$string['layoutimported'] = 'Layout imported';
$string['search'] = 'Search';
$string['login'] = 'Login';

// Import elements
$string['iconboxes'] = 'Icon boxes';
$string['imageboxes'] = 'Image boxes';
$string['university'] = 'University';
$string['school'] = 'School';
$string['hero'] = 'Hero';
$string['action'] = 'Action';

// Front end
$string['imgnoticespace'] = 'Image name \'{$a->img}\' contains space.';
$string['readmorefp'] = 'Read more';
$string['noprice'] = 'Free';
$string['pagenoexists'] = 'Page (mb2page) with ID: {$a->id} doesn\'t exist.';
$string['emptydata'] = 'No data found';
$string['buildepage'] = 'Build this page';
$string['buildepagemoodle'] = 'Edit this page in Moodle';
$string['shortcodereplaced'] = '--- You can\'t use shortcodes inside element ---';
$string['nofilter'] = '<div class="filter-message"><p>Everything works great, but one little thing have to be done.</p><p><strong>Mb2 Shortcodes FILTER</strong> plugin must be:</p><ol><li>Installed (<em>Site administration &rarr; Plugins &rarr; Install plugins</em>)</li><li>Activated (<em>Site administration &rarr; Plugins &rarr; Filters &rarr; Manage filters</em>)</li></ol></div>';
$string['urltolink'] = '<div class="filter-message urltolink"><p>One more thing have to be done:</p><ol><li>Go to: <em>Site administration &rarr;  Plugins &rarr; Filters &rarr; Manage filters</em></li><li>Move <strong>Mb2 Shortcodes</strong> filter above <strong>Convert URLs into links and images</strong> filter.</li></ol></div>';

// Deprecated
$string['downloadcontent1'] = 'Deprecated';
$string['downloadcontent2'] = 'Deprecated';
$string['builderfp'] = 'Deprecated';
