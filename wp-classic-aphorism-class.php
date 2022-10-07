<?php

    //Main class of the plugin
    class Wp_classic_aphorism_class {

        //Initialization
        public function _construct() {
            //Hook function to action
            add_action("admin_menu", array($this, "setup_admin_menu"));
        }
        
        //Function creates the menu
        public function setup_admin_menu() {
            //Main item of the menu
            add_menu_page(
                PLUGIN_NAME,
                "Classic Aphorism",
                "manage_options",
                PLUGIN_NAME,
                array($this, "admin_add_aphorism"));

            //Subitem for adding new aphorism
            add_submenu_page (
                PLUGIN_NAME,
                "Add aphorism",
                "Add aphorism",
                "manage_options",
                PLUGIN_NAME,
                array($this, "admin_add_aphorism"));

                //Subitem for listing aphorisms
                add_submenu_page (
                    PLUGIN_NAME,
                    "Aphorisms",
                    "Aphorisms",
                    "manage_options",
                    "submenu",
                    array($this, "admin_list_aphorisms"));
        }

        //Include the PHP file for adding new aphorism
        public function admin_add_aphorism() {
            include_once(plugin_dir_path(__FILE__) . "admin/wp-add-aphorism.php");
        }
        // Include PHP file for listing aphorisms
        public function admin_list_aphorisms() {
            include_once(plugin_dir_path(__FILE__) . "admin/wp-list-aphorisms.php");
        }


    }

    //Hook function to action
    add_action("plugins_loaded" , "wp_classic_aphorims_init");

    //Function creates new istance (object) from the class
    function wp_classic_aphorims_init() {
        $wp_classic_aphprism = new Wp_classic_aphorism_class();
    }

?>