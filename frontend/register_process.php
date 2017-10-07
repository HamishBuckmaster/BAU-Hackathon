<?php
require_once('../backend/includes/config.php');

if ($_POST)
{

  $username= $_POST['username'];
  $email = $_POST['email'];
  $password =$_POST['password'];

  $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
  // gets the data that is posted and stores it to the Database
  $query = "INSERT INTO user". "(`username`, `email`, `password`)"." VALUES ('$username', '$email', '$password')";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_execute($stmt);

}

?>
