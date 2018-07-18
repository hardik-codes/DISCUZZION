<?php

  include('signInOut.php');
  include('func.php');
  
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
           signupform();
       }
    ?>
  </div>
  <div class = "description">
     
  </div>
   <div class = "matter">
   <?php  session_start();
   				if (isset($_SESSION['username'])) {
					echo "<form action='./anc.php'  method='POST'>
						  <p>Title: </p>
              <input type='text' id='topic' name='topic' size='100' />
              <br><br>
						  <p>Subcategory: </p>
              <input type='text' id='topic' name='subtopic' size='100' />
              <br><br>
              <p>Content: </p>
						  <textarea id='content' name='contenti'></textarea><br />
						  <input type='submit' value='Add new category' /></form>";
				} else {
					echo "<p>Please login first or <a href='/forum4/signUp.php'>click here</a> to register.</p>";
				}
   ?> 
 </div>
</div>
</body>
</html>