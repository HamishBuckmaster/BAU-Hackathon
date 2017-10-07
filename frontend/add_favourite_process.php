<?php

require_once('../backend/includes/config.php');

// Tell the browser to expect JSON
//header('Content-type: application/json');

// store configuration data elsewhere
$conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

if($_POST)
{
	$user_id = 0; //('user_id');
	$brew_name =('brew_name');
	$bottle_chk =('bottlesbox');
	$bulk_chk =('bulk_chk');
	$can_chk =('cansbox');
	$keg_chk =('tapsbox');
	
	$query = "INSERT INTO 5_User_Fav". "(`User_ID`, `Brew_Name`, `Bottle_chk`, `Bulk_chk`, `Can_chk`, `Keg_chk`)"." VALUES ('$user_id', '$brew_name', '$bottle_chk', '$bulk_chk', '$can_chk', '$keg_chk')";
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_execute($stmt);
	
	header('Location: favourites.php');
	exit;
}
?>