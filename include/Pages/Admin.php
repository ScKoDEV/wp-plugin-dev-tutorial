<?php

namespace Inc\Pages;

// need start with \ because we are not in the main directory we are in Parents
use \Inc\Base\BaseController;
use \Inc\API\SettingsAPI;

class Admin extends BaseController
{

    public $settings;
    public $pages = array();
    public $subpages = array();

    public function __construct(){
        $this->settings = new SettingsAPI();
        $this->pages = [
            [
            'page_title' => 'Koerperrechner Plugin',
            'menu_title' => 'Koerperrechner',
            'capability' => 'manage_options',
            'menu_slug' => 'koerperrechner_plugin', 
            'callback' => function(){echo'<h1>SWS Plugin</h1>';},
             'icon_url' => 'dashicons-store',
             'position' => 110
            ]
    ];
    $this->subpages = [
        [
            'parent_slug' => 'koerperrechner_plugin',
            'page_title' => 'Custom Post Types',
            'menu_title' => 'CPT',
            'capability' => 'manage_options',
            'menu_slug' => 'sws_cpt_plugin', 
            'callback' => function(){echo'<h1>CPT Manager</h1>';}
        ],
        [
            'parent_slug' => 'koerperrechner_plugin',
            'page_title' => 'Custom Taxanomies',
            'menu_title' => 'Taxonomies',
            'capability' => 'manage_options',
            'menu_slug' => 'sws_taxonomies_plugin', 
            'callback' => function(){echo'<h1>Taxonomies Manager</h1>';}
        ],
        [
            'parent_slug' => 'koerperrechner_plugin',
            'page_title' => 'Custom Widgets',
            'menu_title' => 'Widgets',
            'capability' => 'manage_options',
            'menu_slug' => 'sws_widgets_plugin', 
            'callback' => function(){echo'<h1>Widgets Manager</h1>';}
        ]
];
    }

    public function register()
    {
       $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
}
