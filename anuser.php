<?php 
include ('database.php');
$newuser = $_POST['usernameinput'];
$newpwd = $_POST['passwordinput'];

$insert = mysqli_query($con, "INSERT INTO subscribers (`sname`,`secretword`) VALUES ('".$newuser."','".$newpwd."');");

if($insert) {                        // if insert query was executed successfully
  header('Location: ./index.php?status=reg_success'); // redirects to the given file
}
 ?>