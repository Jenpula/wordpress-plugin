<?php


//Enqueue stylesheet
wp_enqueue_style('wpstyle');

//Global database object for interacting with the database
global $wpdb;

//initialize
$aphorism = "";

//Table name for SQL statement
$table_name = "classic_aphorism";


echo("<div class='wrap'>");

//check if target information has updated to database

if(isset($_POST["aphorism"])) {

    $aphorism = sanitize_text_field($_POST["aphorism"]);
 
    $wpdb->insert (
        $table_name, array("aphorism" => $aphorism)
    );
    echo("<div class='updated'>");
    echo("<p>Aphorism saved.</p>");
    echo("</div>");
}
?>
<!-- Form -->
<h2>Add aphorism</h2>
<form method="post" action="">
    <p></p>
    <textarea id ="aphorism" name="aphorism"></textarea>
    <p></p>
    <input type="submit" class="button button-primary" value="Save">
</form>
</div>