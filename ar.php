<?php
	session_start();
	
	include ('database.php');
	
	$comment = nl2br(addslashes($_POST['comment']));
	$c = $_GET['c'];
	$s = $_GET['s'];
	$t = $_GET['t'];
	
	$insert = mysqli_query($con, "INSERT INTO headRep (`numcat`, `numsubcat`, `tnum`, `writer`, `reply`, `date`)
								  VALUES ('".$c."', '".$s."', '".$t."', '".$_SESSION['username']."', '".$comment."', NOW());");
								  
	if ($insert) {
		header("Location: /forum4/rt.php?c=".$c."&s=".$s."&t=".$t."");
	}
?>