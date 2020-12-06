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
 * Defines forms.
 *
 * @package    local_mb2builder
 * @copyright  2019 - 2020 Mariusz Boloz (mb2themes.com)
 * @license    Commercial https://themeforest.net/licenses
 */

defined('MOODLE_INTERNAL') || die();

require_once( $CFG->libdir . '/formslib.php' );

class media_edit_form extends moodleform {

    /**
     * Defines the standard structure of the form.
     *
     * @throws \coding_exception
     */
    protected function definition()
    {
        global $PAGE, $CFG;
        $mform = $this->_form;
        $maxbytes = $CFG->maxbytes;

        //$mform->addElement('hidden', 'action');
        //$mform->setType('action', PARAM_INT);

        // Hidden fields
        //$mform->addElement('filemanager', 'images', get_string('image','local_mb2slides'), null, array('subdirs'=>false,'maxfiles'=>1,'context' => context_system::instance()));
        $mform->addElement('filepicker', 'mediafile', '', null, array('maxbytes' => $maxbytes, 'accepted_types' => '*' ) );

        //print_r($mform->get_new_filename('userfile'));


        //$this->add_action_buttons(false);
    //    $this->add_action_buttons();

    }
}
