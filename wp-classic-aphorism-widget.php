<?php

class Wp_classic_aphorism_widget extends WP_Widget {


    public function __construct() {

        parent::__construct(
            'wp_classic_aphorism_widget',
            'Classic Aphorism',
            array('description' => 'Displays classic aphorism')
        );
    }

    public function widget($args, $instance) {

        $title = apply_filters('widget_title', 'Classic Aphorism');

        echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

        global $wpdb;

        $table_name = "classic_aphorism";

        $row = $wpdb->get_row("SELECT * FROM" . $table_name . " ORDER BY RAND() LIMIT 1");

        if($row != null) {
            print "<aside class='widget'>";
            print "<p><i>" . "\"" . $row->aphorism . "\"" . "</i></p>";
            print "</aside>";
        }

    }
}