<?php

  include('signInOut.php');
?>

<html>
 <head>
  <title>DISCUZZION</title>
 </head>
 <link href = "./style.css" type = "text/css" rel = "stylesheet" />
 <a href="https://github.com/hardik-codes/DISCUZZION"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

 <div class = "dashboard">
  <div class = "top"><h1><a href = "/forum">DISCUZZION.......</a></h1></div>
  <div class = "signin">
    <?php
      session_start();
       if (isset($_SESSION[username]))  {
            signout();
           //signout function
        } else {
            if (isset($_GET[status]))  {
                if ($_GET[status] == 'reg_success') {
                   echo "<h1 style = 'color : green;'>New user registered successfully !!<br> Login to continue</h1>";
                  } else if ($_GET[status] == 'login_fail'){ 
                    echo "<h1 style = 'color : red;'>Invalid username and/or password!</h1>";
                 }

            }
           signup_form();
       }
    ?>
  </div>
  <div class = "description">
     
  </div>
  <?php
      session_start();
			if (isset($_SESSION['username'])) {
        include ('database.php');
		    $select = mysqli_query($con, "SELECT tnum, writer, theme, date, visits, replies FROM headCat, headSubcat, headTop 
									                    WHERE ('".$_GET['c']."' = headTop.numcat) AND ('".$_GET['s']."' = headTop.numsubcat) AND ('".$_GET['c']."' = headCat.cnum)
									                    AND ('".$_GET['s']."' = headSubcat.snum) ORDER BY tnum DESC;"); //done to show the latest topic first
		    if (mysqli_num_rows($select) === 0) {
          echo "<div class='matter'><p><a href='/forum4/nt.php?c=".$_GET['c']."&s=".$_GET['s']."'>
                 This subcategory has no topics yet. Begin the discussion with your own first topic!</a></p></div>";
			  } else {
          echo "<div class='matter'><p><a href='/forum4/nt.php?c=".$_GET['c']."&s=".$_GET['s']."'>
					       Add new topic</a></p></div>"; 
          
        }
      }
		?>
  <div class = "matter">
   <?php 

   include('func.php');
   session_start();
			if (isset($_SESSION['username'])) {
   showtopics($_GET['c'],$_GET['s']); 
      } else {
        echo "<p>Please login first or <a href='/forum4/signUp.php'>click here</a> to register.</p>";
      }
   
   ?> 
 </div>
</div>
</body>
</html>