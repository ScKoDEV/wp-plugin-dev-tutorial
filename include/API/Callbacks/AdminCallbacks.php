<?php
/**
 * @package KoerperrechnerPlugin
 */

 namespace Inc\API\Callbacks;

 use \Inc\Base\BaseController;

 class AdminCallbacks extends BaseController {


    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function adminCustomPostTypes()
    {
        return require_once("$this->plugin_path/templates/custom-post-types.php");
    }

    public function adminCustomTaxonomies()
    {
        return require_once("$this->plugin_path/templates/custom-taxonomies.php");
    }

    public function adminCustomWidgets()
    {
        return require_once("$this->plugin_path/templates/custom-widgets.php");
    }

 }
