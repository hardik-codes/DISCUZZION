<?php 
include ('database.php');
$subtitle = $_POST['topic'];
$desc = nl2br(addslashes($_POST['content']));

$insert = mysqli_query($con, "INSERT INTO headSubcat (`stitle`,`sdesc`, `pid`) VALUES ('".$subtitle."','".$desc."',".$_GET['c'].");");

if($insert) {                        // if insert query was executed successfully
  header('Location: ./index.php'); // redirects to the given file
}
 ?>