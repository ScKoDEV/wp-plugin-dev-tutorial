<?php 
/**
 * @package KoerperrechnerPlugin
 */
/*
Plugin Name: Koerperrechner Plugin
Plugin URI: https://plugin.schillerwebsolutions.com/plugin
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Author: Konstantin Schiller
Author URI: https://plugin.schillerwebsolutions.com
License: GPLv2 or later
Text Domain: koerperrechner-plugin
 */

 /* 
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// IF this file is called firectly, abort!!!
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );

// require once the composer autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php')){
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code which runs during plugin activation
 */

function activate_koerperrechner_plugin(){
    Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_koerperrechner_plugin' );

/**
 * The code which runs during plugin deactivation
 */
function deactivate_koerperrechner_plugin(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_koerperrechner_plugin' );

if ( class_exists('Inc\\Init')){
    Inc\Init::register_services();
}