<?php
/*
Plugin Name: jQuery Accordion
Plugin URI: https://github.com/jeffikus/jquery-accordion
Description: jQuery Accordion by Jeffikus is the best WordPress plugin to display an accordion!
Version: 1.0.0
Author: Jeffikus
Author URI: http://jeffikus.com/
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
/*  Copyright 2013  Jeffikus  (email : jeffikus@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

    require_once( 'jquery-accordion-main.php' );
    $jquery_accordion_main = new jQuery_Accordion_Main( __FILE__ );
    $jquery_accordion_main->version = '1.0.0';
    $jquery_accordion_main->init();

