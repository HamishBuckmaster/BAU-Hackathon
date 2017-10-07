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
$query = "SELECT * FROM db.`2 master data` LIMIT 100";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Invalid query: ' . mysqli_error($connection));
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each
while ($row = @mysqli_fetch_assoc($result)) {
    // Add to XML document node
    $node = $dom->createElement("customer");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("id",$row['Customer ID']);
    $newnode->setAttribute("name",$row['POC Name']);
    $newnode->setAttribute("type",$row['Primary Sub Channel']);
    $newnode->setAttribute("Latitude",$row['Latitude']);
    $newnode->setAttribute("Longitude",$row['Longitude']);

    $brewnode =  $dom->createElement("brew");


    $id = $row['Customer ID'];
    $childQuery = 'SELECT DISTINCT `1_Sell_In`.`Brand`, `1_Sell_In`.`Pack_Format` FROM db.`1_Sell_In` WHERE `Customer_ID`=?';
    $stmt = mysqli_prepare($connection, $childQuery);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result2 = mysqli_stmt_get_result($stmt);
    while ($row2 = @mysqli_fetch_assoc($result2)) {

        $brand = str_replace('"', '', $row2['Brand']);
        $pack = str_replace('"', '', $row2['Pack_Format']);
        $brewnode =  $dom->createElement("brew");
        $childnode = $newnode->appendChild($brewnode);
        $childnode->setAttribute("brand", $brand);
        $childnode->setAttribute("pack", $pack);

    }
}

// $newnode->setAttribute("SizeTier",$row['Size Tier']);
// $newnode->setAttribute("DotheyorderOnline",$row['Do they order Online']);
// $newnode->setAttribute("State",$row['State']);
// $newnode->setAttribute("BusinessDevelopmentExecutive",$row['Business Development Executive']);
// $newnode->setAttribute("SalesManager",$row['Sales Manager']);
// $newnode->setAttribute("Channel",$row['Channel']);
echo $dom->saveXML();

mysqli_close($connection);

?>