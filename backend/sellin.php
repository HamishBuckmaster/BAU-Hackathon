<?php
require_once('includes/config.php');

// Tell the browser to expect JSON
header('Content-type: application/json');

// store configuration data elsewhere
$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

// Create an empty array to contain results
$json_response = array();

// Select all the items in the database
$results = mysqli_query($conn, 'SELECT * FROM `1 Sell In`');

while($row = mysqli_fetch_assoc($results)) {
    // Add the raw contents of each row to the response
    // You can modify the $row here as well, or filter out certain rows
    $json_response[] = $row;
}


// Finally, send a JSON representation of the $json_response array
// to the browser as the request body
echo json_encode($json_response);

?>
