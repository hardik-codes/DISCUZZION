
<?php
   function signupform() {
    echo "
    <div id = 'clas'>
    <form action =' /forum4/verifyuser.php' method = 'POST'>
      <input type='text' placeholder='Username' id = 'usernameinput' name = 'usernameinput' />
      <input type='password' placeholder='Password' id = 'passwordinput' name = 'passwordinput'/>
      <input type = 'submit' value = 'Login' /> 
      <button type = 'button' onclick = 'location.href = \"/forum4/signUp.php\";'>New User? Sign Up</button>
    </form>
    </div>" ;
   }

    function signout() {
           echo nl2br("<p class='welcome'>Welcome ".$_SESSION['username']." :D</p>
               <form action = '/forum4/signOut.php' method = 'GET'>
               <input type = 'submit' value = 'Logout' /></form>");
   }  

   function signup_form() {
    echo "
    <div id = 'clas'>
    <form action =' /forum4/verify_user.php' method = 'POST'>
      <input type='text' placeholder='Username' id = 'usernameinput' name = 'usernameinput' />
      <input type='password' placeholder='Password' id = 'passwordinput' name = 'passwordinput'/>
      <input type = 'submit' value = 'Login' /> 
      <button type = 'button' onclick = 'location.href = \"/forum4/signUp.php\";'>New User? Sign Up</button>
    </form>
    </div>" ;
   }
?>