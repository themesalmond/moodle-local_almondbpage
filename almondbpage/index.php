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

/*
* Version information
* @package    local_almondbpage
* @copyright  Huseyin Yemen
* @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
*/
require_once('../../config.php');
require_once(__DIR__ . '/settings.php');
global $USER, $PAGE;

$pageid = optional_param('id', '', PARAM_RAW);
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagetype('site-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title("Information Pages");
$PAGE->set_url("{$CFG->wwwroot}/local/almondbpage", ['id' => $pageid]);
$templatecontext = almondbpagerender($pageid);
if (empty($templatecontext['almondbpageenabled'])) {
    redirect("$CFG->wwwroot/");
}
if (!empty($templatecontext['almondbpagetitle'])) {
    $PAGE->navbar->add($templatecontext['almondbpagetitle']);
    $PAGE->set_title($templatecontext['almondbpagetitle']);
} else {
    $PAGE->navbar->add(get_string('almondbpage', 'theme_almondb'));
}

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('local_almondbpage/main', $templatecontext);
echo $OUTPUT->footer();
die();
exit;
