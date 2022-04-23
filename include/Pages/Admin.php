<?php

namespace Inc\Pages;

// need start with \ because we are not in the main directory we are in Parents
use \Inc\Base\BaseController;
use \Inc\API\SettingsAPI;
use \Inc\API\Callbacks\AdminCallbacks;

class Admin extends BaseController
{

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsAPI();
        $this->callbacks = new AdminCallbacks();
        $this->setPages();
        $this->setSubPages();

        $this->setSettings();
        $this->setSections();
        $this->setFields();

       $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
    public function setPages(){
        $this->pages = [
            [
                'page_title' => 'Koerperrechner Plugin',
                'menu_title' => 'Koerperrechner',
                'capability' => 'manage_options',
                'menu_slug' => 'koerperrechner_plugin', 
                'callback' => array( $this->callbacks, 'adminDashboard'),
                 'icon_url' => 'dashicons-store',
                 'position' => 110
                ]
        ];
    }
    public function setSubPages(){
        $this->subpages = [
            [
                'parent_slug' => 'koerperrechner_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'sws_cpt_plugin', 
                'callback' => array( $this->callbacks, 'adminCustomPostTypes'),
            ],
            [
                'parent_slug' => 'koerperrechner_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'sws_taxonomies_plugin', 
                'callback' => array( $this->callbacks, 'adminCustomTaxonomies'),
            ],
            [
                'parent_slug' => 'koerperrechner_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'sws_widgets_plugin', 
                'callback' => array( $this->callbacks, 'adminCustomWidgets'),
            ]
    ];
    }
    public function setSettings(){
        $args = array(
            array(
                'option_group' => 'sws_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'swsOptionsGroup')
            ),
            array(
                'option_group' => 'sws_options_group',
                'option_name' => 'first_name',
            )
            );

            $this->settings->setSettings($args);
    }
    public function setSections(){
        $args = array(
            array(
                'id' => 'sws_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'swsAdminSection'),
                'page' => 'koerperrechner_plugin'
            )
            );

            $this->settings->setSections($args);
    }
    public function setFields(){
        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => array($this->callbacks, 'swsTextExample'),
                'page' => 'koerperrechner_plugin',
                'section' => 'sws_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'

                )
                ),
                array(
                    'id' => 'first_name',
                    'title' => 'First Name',
                    'callback' => array($this->callbacks, 'swsFirstName'),
                    'page' => 'koerperrechner_plugin',
                    'section' => 'sws_admin_index',
                    'args' => array(
                        'label_for' => 'first_name',
                        'class' => 'first-name-class'
    
                    )
                )
            );

            $this->settings->setFields($args);
    }
}
