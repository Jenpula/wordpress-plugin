<?php

    //Global database object for interacting with the database

    global $wpdb;

    //Table name for SQL statement
    $table_name = "classic_aphorism";

    //Run SQL statement for querying the number of aphorism in database
    $aphorism_count = $wpdb->get_var("SELECT COUNT(id) FROM " . $table_name);
    echo "<h2>Aphorisms (" . $aphorism_count . ")</h2>";
    if ($aphorism_count > 0) {

        //SQL statement for getting all aphorisms from database
        $sql = "SELECT * FROM " . $table_name;

        //Run SQL statement
        $aphorisms = $wpdb->get_results($sql);

        //If there are aphorims, iterate those and output to screen
        if ($aphorisms) {
            foreach ($aphoprisms as $aphorism) {
                echo "<p>" . $aphorism-> aphorism . "</p>";
            }
        }
    }
?>