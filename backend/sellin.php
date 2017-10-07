<?php
require_once('includes/config.php');

// Tell the browser to expect JSON
header('Content-type: application/json');

// store configuration data elsewhere
$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

// Create an empty array to contain results
$json_response = array();

//get id if exists
$id = @$_GET['id'];

if(isset($id))
{
    //get all data related to a specific customer ID
    $query = 'SELECT * FROM `4 Sell In` WHERE `SKU ID`=?';
    $stmt = mysqli_prepare($conn, $query);

	mysqli_stmt_bind_param($stmt, "s", $id);

	mysqli_stmt_execute($stmt);

	$results = mysqli_stmt_get_result($stmt);
}
else
{
    // Select all the items in the database
    $query = 'SELECT * FROM `4 Sell In`';
    $results = mysqli_query($conn, $query);
}

while($row = mysqli_fetch_assoc($results)) {
    // Add the raw contents of each row to the response
    // You can modify the $row here as well, or filter out certain rows
    $json_response[] = $row;
}


// Finally, send a JSON representation of the $json_response array
// to the browser as the request body
echo json_encode($json_response);

?>
