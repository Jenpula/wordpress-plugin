<?php
//Widget class of the plugin
class Wp_classic_aphorism_widget extends WP_Widget {

    //Initialization
    public function __construct() {
        parent::__construct(
            'wp_classic_aphorism_widget',
            'Classic Aphorism',
            array('description' => 'Displays classic aphorism')
        );
    }
    //Function gets random aphorism from database and places it inside widget
    public function widget($args, $instance) {

        //Set the title of the widget
        $title = apply_filters('widget_title', 'Classic Aphorism');

        //Make output for widget using arguments and place title inside
        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        //Global database object for interacting with the database
        global $wpdb;

        //Define table name for SQL statement
        $table_name = 'classic_aphorism';

        //Get random aphorism from database
        $row = $wpdb->get_row("SELECT * FROM " . $table_name . " ORDER BY RAND() LIMIT 1");

        //Ig query returned row from database, add aphorism inside the widget output
        if($row != null) {
            print "<aside class='widget'>";
            print "<p><i>" . "\"" . $row->aphorism . "\"" . "</i></p>";
            print "</aside>";
        }

    }
}