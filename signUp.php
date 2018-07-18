<html>
 <head>
  <title>DISCUZZION</title>
 </head>
 <link href = "./style.css" type = "text/css" rel = "stylesheet" />
 <a href="https://github.com/hardik-codes/DISCUZZION"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a>

 <div class = "dashboard">
  <div class = "top"><h1><a href = "/forum4">DISCUZZION</a></h1></div>
  <div id = "clas">
      <form action = "anuser.php" method = "POST">
        <input type="text" placeholder="Username" id = "usernameinput" name = "usernameinput" />
        <input type="password" placeholder="Password" id = "passwordinput" name = "passwordinput"/>
        <input type = "submit" value = "Sign Up Now" /> 
      </form>
  </div>
  
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
<div class = "description">

</div>
</body>
</html>









