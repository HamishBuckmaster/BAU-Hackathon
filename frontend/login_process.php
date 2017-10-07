<?php
session_start();
require_once('../backend/includes/config.php');
require_once('../backend/includes/auth.php');

if ($_POST)
{

  $email = $_POST['email'];
  $password =$_POST['password'];

  $conn = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
  //gets the data where the email is equal to what ever the user proves
  $query = "SELECT email, password FROM user WHERE email=?";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $email);

  if(mysqli_stmt_execute($stmt))
  {

    $result = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_array($result);

    if($row)
    {
      $db_password = $row['password'];

      //compare passwords
      if($db_password === $password)
      {
        login($email);
        header('Location: index.php');
        exit;
      }

    }
  }
  mysqli_stmt_close($stmt);

}

?>
