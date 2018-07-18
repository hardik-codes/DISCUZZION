<?php
session_start();

include('database.php');

$username = $_POST['usernameinput'];
$password = $_POST['passwordinput'];



$result = mysqli_query($con, "SELECT sname,secretword FROM subscribers WHERE sname = '".$username."'AND  secretword = '".$password."';");

if (mysqli_num_rows($result) !=0) {
  $_SESSION['username'] = $username;
  header("Location: ".$_SERVER['HTTP_REFERER']); //.(dot) here is used to append
} else {
  header("Location: ".$_SERVER['HTTP_REFERER']."?status=login_fail"); //.(dot) here is used to append
}  
   
?>