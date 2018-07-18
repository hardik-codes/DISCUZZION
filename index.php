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
  <div class = "top"><h1><a href = "/forum4">DISCUZZION.......</a></h1></div>
  <div class = "signin">
    <?php
      session_start();
       if (isset($_SESSION['username']))  {
            signout();
            include ('database.php');
		    		$select = mysqli_query($con, "SELECT * FROM headCat ORDER BY cnum DESC");
	         	if (mysqli_num_rows($select) == 0) {
            echo "<div class ='newcat'>
                    <a href ='./nc.php'>No categories yet. Add the first one</a>
                  </div>";
           } else {
            echo "<div class ='newcat'>
            <a href ='./nc.php'>Add new category</a>
          </div>";}
        } else {
            if (isset($_GET[status]))  {
                if ($_GET[status] == 'reg_success') {
                   echo"<h1 style = 'color : green;'>New user registered successfully !!<br> Login to continue</h1>";
                  } else if ($_GET[status] == 'login_fail'){ 
                    echo "<h1 style = 'color : red;'>Invalid username and/or password!</h1>";
                    
                 }

            }
           signupform();
       }
    ?>
  </div>
  <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
    echo"<div class = 'matter'>";
   
        echo "<p style='text-align:center;font-size:20px;'>Welcome to my platform DISCUZZION made with <span style='font-size:150%;color:red;'>&hearts;</span> </p>";
    
    echo"</div>";
    }
  ?>

  <div class = "matter">
   <?php 
   session_start();
   include('func.php');
   if (!isset($_SESSION['username'])) {
    
    show_cat();  
  } else {
    showcat();
  }
   
         
   
   ?> 
 </div>
</div>

     
</body>
</html>