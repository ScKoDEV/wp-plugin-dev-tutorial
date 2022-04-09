<?php

/**
 * @package KoerperrechnerPlugin 
 */

 namespace Inc;

 //final - php can not extend this class

 final class Init {


    /** 
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_services() {
        return [
            Pages\Admin::class
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     */
    public static function register_services(){
        foreach (self:: get_services() as $class){
            $service = self::instantiate($class);
            if (method_exists( $service, 'register')){
                $service->register();
            }
        }
    }
    /**
     * initialize the class
     * @param class $class class from the services array
     * @return  class instance new instance of the class
     */
    private static function instantiate ($class) {
        $service = new $class();
        return $service;
    }
 }





/** 

use Inc\Activate;
use Inc\Deactivate;
use Inc\Admin\AdminPages;

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

    //admin_enqueue_scripts für admin css and wp_enqueue_scripts für frontend
    public $plugin;
    
    function __construct(){
        $this->plugin = plugin_basename( __FILE__ );
    }
    function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue') );
        
        add_filter( "plugin_action_links_$this->plugin", array($this, 'settings_link'));
    }

    public function settings_link($links){
       $settings_link = '<a href="admin.php?page=koerperrechner_plugin">Settings</a>';
       array_push($links, $settings_link);
       return $links;
    }

    public function add_admin_pages(){
        AdminPages::add_admin_pages();
    }

    

    protected function create_post_type(){
        add_action( 'init', array( $this, 'custom_post_type'));
    }

    function custom_post_type() {
        register_post_type( 'book', ['public' => true, 'label' => 'Books' ] );
    }
    
    
    function enqueue() {
        wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/style.css', __FILE__ ));
        wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/script.css', __FILE__ ));
    }

    function activate() {
        Activate::activate();
    }
 
}


if ( class_exists('koerperrechnerPlugin')){
$koerperrechnerPlugin = new koerperrechnerPlugin(); 
$koerperrechnerPlugin->register();
}

register_deactivation_hook( __FILE__, array('Deactivate', 'deactivate' ) );


*/
