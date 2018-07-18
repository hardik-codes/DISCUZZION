<?php 
include ('database.php');
$topic = $_POST['topic'];
$subtopic = $_POST['subtopic'];
$subdesc = nl2br(addslashes($_POST['contenti']));;

$insert1 = mysqli_query($con, "INSERT INTO headCat(`ctitle`) VALUES ('".$topic."');");
$select = mysqli_query($con, "SELECT * FROM headCat ORDER BY cnum DESC");
$row = mysqli_fetch_assoc($select);
$insert2 = mysqli_query($con, "INSERT INTO headSubcat(`stitle`,`sdesc`,`pid`) VALUES ('".$subtopic."', '".$subdesc."', ".$row['cnum'].");");

if($insert1 && $insert2) {       
                
     header('Location: ./index.php');
  
}
 ?>