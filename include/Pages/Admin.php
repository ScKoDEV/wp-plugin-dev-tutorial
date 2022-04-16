<?php

namespace Inc\Pages;

// need start with \ because we are not in the main directory we are in Parents
use \Inc\Base\BaseController;
use \Inc\SettingsAPI;

class Admin extends BaseController
{

    public $settings;
    public function __construct(){
        $this->settings = new SettingsAPI();
    }

    public function register()
    {
       /* add_action( 'admin_menu',  array($this, 'add_admin_pages'));*/
        $pages=[[
            'page_title' => 'Koerperrechner Plugin',
            'menu_title' => 'Koerperrechner',
            'capability' => 'manage_options',
            'menu_slug' => 'koerperrechner_plugin', 
            'callback' => function(){echo'<h1>Alecadd Plugin</h1>';},
             'icon_url' => 'dashicons-store',
             'position' => 110
        ]];

       $this->settings->addPages($pages)->register();
        
    }

    /* public function add_admin_pages(){
        add_menu_page( 'Koerperrechner Plugin', 'Koerperrechner', 'manage_options', 'koerperrechner_plugin', array($this, 'admin_index'), 'dashicons-store', 110 );
    
    } 

    public function admin_index() {
        require_once $this->plugin_path . 'templates/admin.php';
    }
    */
}
