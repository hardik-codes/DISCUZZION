
<?php
	 
     session_start();
     include ('database.php');
     
     $topic = $_POST['topic'];
     $content = nl2br($_POST['content']);
     $c = $_GET['c'];
     $s = $_GET['s'];
     
     
     $insert = mysqli_query($con, "INSERT INTO headTop (`numcat`, `numsubcat`, `writer`, `theme`, `matter`, `date`) 
                                   VALUES ('".$c."', '".$s."', '".$_SESSION['username']."', '".$topic."', '".$content."', NOW());");
                                   
     if ($insert) {
        
         header("Location: /forum4/ts.php?c=".$c."&s=".$s."");
     }
 ?>