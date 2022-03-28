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

defined( 'ABSPATH' ) or die( 'Hey, what are you doing here?' );

class koerperrechnerPlugin
{
    //Public
    // can be accessed everywhere | default value

    // Protected
    // can be accessed only within the class itself or a class which extends the class

    //Private
    // can be accessed only by the class not by an extension

    //static
    // allows using function without initialization of class

    function __construct(){
        $this->create_post_type();
    }

    protected function create_post_type(){
        add_action( 'init', array( $this, 'custom_post_type'));
    }

    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label' => 'Books' ] );
    }
    function enqueue() {
        wp_enqueue_style( 'mypluginstyle', plugins_url( '/assests/style.css', __FILE__ ));
        wp_enqueue_script( 'mypluginscript', plugins_url( '/assests/script.css', __FILE__ ));
    }
    //admin_enqueue_scripts für admin css and wp_enqueue_scripts für frontend
    function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue') );
    }
 
}

if ( class_exists('koerperrechnerPlugin')){
$koerperrechnerPlugin = new koerperrechnerPlugin(); 
$koerperrechnerPlugin->register();
}

require_once plugin_dir_path(__FILE__) . 'include/koerperrechner-plugin-activate.php';
register_activation_hook( __FILE__, array('koerperrechnerPluginActivate', 'activate' ) );

require_once plugin_dir_path(__FILE__) . 'include/koerperrechner-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array('koerperrechnerPluginDeactivate', 'deactivate' ) );



