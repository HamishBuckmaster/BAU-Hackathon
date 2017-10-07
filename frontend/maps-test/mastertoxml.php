<?php
require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server
$connection = mysqli_connect($hostname, $username, $password);
if (!$connection) {
    die('Not connected: ' . mysqli_error($connection));
}

// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
    die ('Can\'t use db: ' . mysqli_error($connection));
}

// Select all the rows in the table
$query = "SELECT * FROM db.`2 master data`";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)) {
    // Add to XML document node
    $node = $dom->createElement("marker");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("CustomerID",$row['Customer ID']);
    $newnode->setAttribute("POCName",$row['POC Name']);
    $newnode->setAttribute("State",$row['State']);
    $newnode->setAttribute("BusinessDevelopmentExecutive",$row['Business Development Executive']);
    $newnode->setAttribute("SalesManager",$row['Sales Manager']);
    $newnode->setAttribute("Channel",$row['Channel']);
    $newnode->setAttribute("PrimarySubChannel",$row['Primary Sub Channel']);
    $newnode->setAttribute("SizeTier",$row['Size Tier']);
    $newnode->setAttribute("DotheyorderOnline",$row['Do they order Online']);
    $newnode->setAttribute("Latitude",$row['Latitude']);
    $newnode->setAttribute("Longitude",$row['Longitude']);
}

echo $dom->saveXML();

mysqli_close($connection);

?>