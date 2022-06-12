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
 * Version information
 *
 * @package    local_almondbpage
 * @copyright  Huseyin Yemen
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
function almondbpagerender($id) {
    $theme = theme_config::load('almondb');
    $templatecontext['almondbpageenabled'] = true;
    // Advanced page.
    if (substr($id, 0, 1) == "a") {
        $templatecontext['almondbpageenabled'] = $theme->settings->almondbpageenabled;
        if (empty($templatecontext['almondbpageenabled'])) {
            return $templatecontext;
        }
        $id = substr($id, 1, 2);
        $almondbpagecount = get_config('theme_almondb', 'almondbpagecount');
        if ( $id > $almondbpagecount ) {
            $templatecontext['almondbpageenabled'] = false;
            return $templatecontext;
        }
        if ($id > 0 && $id <= $almondbpagecount) {
            $almondbpagetitle = "almondbpagetitle{$id}";
            $almondbpagecss = "almondbpagecss{$id}";
            $almondbpagecsslink = "almondbpagecsslink{$id}";
            $almondbpagecap = "almondbpagecap{$id}";
            $almondbpagenavbar = "almondbpagenavbar{$id}";
            $almondbpageheader = "almondbpageheader{$id}";
            $almondbpagefooter = "almondbpagefooter{$id}";
            $almondbpageimglink = "almondbpageimglink{$id}";
            if (!empty($theme->settings->$almondbpagetitle)) {
                $templatecontext['almondbpagetitle'] = $theme->settings->$almondbpagetitle;
            }
            if (!empty($theme->settings->$almondbpagecap)) {
                $templatecontext['almondbpagecap'] = $theme->settings->$almondbpagecap;
            } else {
                $templatecontext['almondbpagecap'] = "<h1>".get_string('almondbpagenotfound', 'theme_almondb')."</h1>";
            }
            if (!empty($theme->settings->$almondbpagecss)) {
                $templatecontext['almondbpagecss'] = $theme->settings->$almondbpagecss;
            }
            if (!empty($theme->settings->$almondbpagecsslink)) {
                $templatecontext['almondbpagecsslink'] = "<link rel='stylesheet' href='".$theme->settings->$almondbpagecsslink."'>";
            }
            $templatecontext['almondbpageimglink'] = $theme->settings->$almondbpageimglink;
            $templatecontext['almondbpagenavbar'] = $theme->settings->$almondbpagenavbar;
            $templatecontext['almondbpageheader'] = $theme->settings->$almondbpageheader;
            $templatecontext['almondbpagefooter'] = $theme->settings->$almondbpagefooter;
            $templatecontext['almondbpageadvanced'] = true;
        } else {
            $templatecontext['almondbpagecap'] = "<h1>".get_string('almondbpagenotfound', 'theme_almondb')."</h1>";
        }
    } else if (substr($id, 0, 1) == "s") {
        $templatecontext['almondbpageenabledsimple'] = $theme->settings->almondbpageenabledsimple;
        $almondbpagecount = get_config('theme_almondb', 'almondbpagecountsimple');
        $id = substr($id, 1, 2);
        if ( $id > $almondbpagecount ) {
            $templatecontext['almondbpageenabled'] = false;
            return $templatecontext;
        }
        if (empty($templatecontext['almondbpageenabledsimple'])) {
            return $templatecontext;
        }
        if ($id > 0 && $id <= $almondbpagecount) {
            $almondbpagetitle = "almondbpagetitlesimple{$id}";
            $almondbpagecap = "almondbpagecapsimple{$id}";
            $almondbpageheader = "almondbpageheadersimple{$id}";
            $almondbpagefooter = "almondbpagefootersimple{$id}";
            $almondbpageimage = "sliderimagealmondbpagesimple{$id}";
            $almondbpageimgposition = "almondbpageimgpositionsimple{$id}";
            if (!empty($theme->settings->$almondbpagetitle)) {
                $templatecontext['almondbpagetitle'] = $theme->settings->$almondbpagetitle;
            }
            if (!empty($theme->settings->$almondbpagecap)) {
                $templatecontext['almondbpagecap'] = $theme->settings->$almondbpagecap;
            } else {
                $templatecontext['almondbpagecap'] = "<h1>".get_string('almondbpagenotfound', 'theme_almondb')."</h1>";
            }
            $image = $theme->setting_file_url($almondbpageimage, $almondbpageimage);
            $templatecontext['almondbpageimg'] = $image;
            $templatecontext['almondbpagenavbar'] = true;
            $templatecontext['almondbpageheader'] = $theme->settings->$almondbpageheader;
            $templatecontext['almondbpagefooter'] = $theme->settings->$almondbpagefooter;
            $templatecontext['almondbpagesimple'] = true;
            $templatecontext['backgroundsimple'] = false;
            $templatecontext['topsimple'] = false;
            $templatecontext['leftsimple'] = false;
            $templatecontext['rightsimple'] = false;
            $templatecontext['fulltopsimple'] = false;
            if ($theme->settings->$almondbpageimgposition == "1") {
                $templatecontext['backgroundsimple'] = true;
            } else if ($theme->settings->$almondbpageimgposition == "2") {
                $templatecontext['topsimple'] = true;
            } else if ($theme->settings->$almondbpageimgposition == "21") {
                $templatecontext['fulltopsimple'] = true;
            } else if ($theme->settings->$almondbpageimgposition == "3") {
                $templatecontext['leftsimple'] = true;
            } else if ($theme->settings->$almondbpageimgposition == "4") {
                $templatecontext['rightsimple'] = true;
            }
        } else {
            $templatecontext['almondbpagecap'] = "<h1>".get_string('almondbpagenotfound', 'theme_almondb')."</h1>";
        }

    } else {
        $templatecontext['almondbpageenabled'] = false;
        return $templatecontext;
    }
    return $templatecontext;
}
