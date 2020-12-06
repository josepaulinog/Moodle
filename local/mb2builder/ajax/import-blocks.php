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
 * @copyright  2019 - 2020 Mariusz Boloz (mb2themes.com)
 * @license    Commercial https://themeforest.net/licenses
 */

define('AJAX_SCRIPT', true);

require_once( __DIR__ . '/../../../config.php' );
require_once( $CFG->libdir . '/adminlib.php' );

// Get builder files
require_once( __DIR__ . '/../lib.php' );
require_once( __DIR__ . '/../classes/api.php' );
require_once( __DIR__ . '/../classes/builder.php' );

// Load shortcode filer if nuction doesn't exists
if ( ! function_exists( 'mb2_add_shortcode' ) )
{
    require_once( $CFG->dirroot . '/filter/mb2shortcodes/lib/shortcodes.php' );
}

// Include layout shortcodes
mb2builderBuilder::get_static_layout_parts();

// Include elements shortcodes
mb2builderBuilder::get_layout_elements();

// Include blocks settings
mb2builderApi::include_import_blocks();

// Get url params from ajax call
$urlparts = parse_url( $PAGE->url );
$opts = array();

if ( isset( $urlparts['query'] ) )
{
    parse_str( str_replace( '&amp;', '&', $urlparts['query'] ), $opts );
}

$context = context_system::instance();
$PAGE->set_url( '/local/mb2builder/ajax/import-blocks.php' );
$PAGE->set_context( $context );

require_login();
require_sesskey();

$category = $opts['category'];
$partid = $opts['itemid'];
$part = $opts['part'];

if ( $part === 'layouts' )
{
    $partsettings = mb2builderApi::get_import_block_settings( $category, true );
}
else
{
    $partsettings = mb2builderApi::get_import_block_settings( $category );
}

$partdata = $partsettings['items'][$partid]['data'];

if ( $part === 'layouts' )
{
    $pagedata = json_decode( $partdata );
    $partdata = mb2builderBuilder::get_builder_section( $pagedata[0]->attr );
}
else
{
    $partdata = mb2builderBuilder::get_builder_row( json_decode( $partdata ) );
}

echo format_text( $partdata, FORMAT_HTML );
