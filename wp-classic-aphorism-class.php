<?php 
// Main class of the plugin
class Wp_classic_aphorism_class {

    //Initialization
    public function __construct() {
        // Hook function to action
        add_action('admin_menu', array($this, 'setup_admin_menu'));

        //Add shortcode and set callback function that will be called every time

        add_shortcode("classic_aphorism", array($this, "classic_aphorism_shortcode"));
    }

    // Function creates the menu
    public function setup_admin_menu() {

            //Main item of the menu
            add_menu_page(
                PLUGIN_NAME,
                'Classic Aphorism',
                'manage_options',
                PLUGIN_NAME,
                array($this, 'admin_add_aphorism'));
    
            // Subitem for adding new aphorism
            add_submenu_page(
                PLUGIN_NAME,
                'Classic aphorism',
                'Add aphorism',
                'manage_options',
                PLUGIN_NAME,
                array($this, 'admin_add_aphorism'));
    
            //Subitem for listing aphorisms
            add_submenu_page(
                PLUGIN_NAME,
                'Aphorisms',
                'Aphorisms',
                'manage_options',
                'submenu',
                array($this, 'admin_list_aphorisms'));
        }

    // Include the PHP file for adding new aphorism
    public function admin_add_aphorism() {
        include_once(plugin_dir_path(__FILE__) . 'admin/wp-add-aphorism.php');
    }

    //Include the PHP file (for listing aphorisms
    public function admin_list_aphorisms(){
        include_once(plugin_dir_path(__FILE__) . 'admin/wp-list-aphorisms.php');
    }


    public function classic_aphorism_shortcode() {

        //Global database object for interacting with database

        global $wpdb;

        // Table name for SQL statement
        $table_name = "classic_aphorism";

        //Get random aphorism from database
        $row = $wpdb->get_row("SELECT * FROM " . $table_name . " ORDER BY RAND() LIMIT 1");

        //if query returned row from database, return aphorism
        if($row != null) {
            return "<h4><i>" . "\"" . $row->aphorism . "\"" . "</i></h4>";
        }
    }
}

// Hook function to action
add_action('plugins_loaded', 'wp_classic_aphorism_init');

// Function creates new instance (object) from the class
function wp_classic_aphorism_init(){
    $wp_classic_aphorism = new Wp_classic_aphorism_class();
}
?>