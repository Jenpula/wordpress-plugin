<?php
//Global database object for interacting with the database
global $wpdb;

//initialize
$aphorism = "";

//Table name for SQL statement
$table_name = "classic-aphorism";

//check if target information has updated to database

if(isset($_POST["aphorism"])) {
    $aphorism = sanitize_text_field($_POST["aphorism"]);
 
    $wpdb->insert (
        $table_name, array("aphorism" => $aphorism)
    );
    echo("<p>Aphorism saved.</p>");
}
?>
<!-- Form -->
<h2>Add aphorism</h2>
<form method="post" action="">
    <p></p>
    <textarea id ="aphorism" name="aphorism"></textarea>
    <p></p>
    <input type="submit" class="button button primary" value="Save">
</form>