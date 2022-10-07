<?php 
/*
Plugin Name: Classic Aphrosim
Plugin URI: http://www.foo.com
Description: Example WordPress plugin. Shows classic random aphorism using Version 0.1
Author: Jenni Annala
Author URI: http://ww.foo.com
License: GPL2
*/
?>

<?php

//Plugin name is the unique name of the plugin
define('PLUGIN_NAME' , 'wp-classic-aphorism');

// include PHP file including functions of database table creation and drop
include_once('wp-classic-aphorism-database.php');

//Include main class of the plugin
include_once("wp-classic-aphorism-class.php");

//Add hooks for activation and deactivation
register_activation_hook(__FILE__,array('Wp_classic_aphorism_database' , 'activate'));
register_deactivation_hook(__FILE__,array('Wp_classic_aphorism_database' , 'deactivate'));

?>