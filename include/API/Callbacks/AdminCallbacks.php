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
    // add it like this allows us to validate or handle the input before returning it
    public function swsOptionsGroup($input){
        return $input;
    }
    public function swsAdminSection(){
        echo 'Check this Page';
    }
    public function swsTextExample(){
        $value = esc_attr( get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something Here!">' ;
    }
    public function swsFirstName(){
        $value = esc_attr( get_option('first_name'));
        echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write First Name">' ;
    }
 }
