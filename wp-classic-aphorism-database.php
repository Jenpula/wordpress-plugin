<?php 
class Wp_classic_aphorism_database {

    //Function is called when plugin is activated
    public static function activate() {
        //table name for SQL statement
        $table_name = 'classic_aphorism';

        //SQL statement for table creation having two columns
        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            id int PRIMARY KEY AUTO_INCREMENT,
            aphorism text);";
    
        //Include uprage functions
        require_once(ABSPATH . "wp-admin/includes/upgrade.php");

        //Run SQL statement
        dbDelta($sql);

        // add database option
        add_option("wp-classic-aphorism-db-version" , "0.1");
    }
        //function is called when plugin is deactivated
        public static function deactivate() {
            global $wpdb;

            $table_name = "classic-aphorism";

            $sql = "DROP TABLE IF EXISTS $table_name;";

            $wpdb->query($sql);

            delete_option("wp-classic-aphorism-db-version");
        
    
    }
}
?>