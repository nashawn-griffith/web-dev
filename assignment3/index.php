<!DOCTYPE html>

<?php
  
  require('./Database.php');
   if(!isset($message))
   {
      $message = ' ';
   }
   
?>

<html lang = "en-us">
    <head>
       <meta charset = "utf-8">
       <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
       <title>PROCOMS</title>
       <link rel = "stylesheet" href = "./index.css" type = "text/css">
       
    </head>

    <body>

    <main id = "main">
        <header class = "row">
            <div col = "col-12">
                <h3>Programme Coordinator Management System</h3>
                <h3>M.Sc Information Technology</h3>
            </div>
        </header>

        <section class = "row x">
              <div col = "col-12">
                  <form id = "form" action = "validate.php" method = "POST" autocomplete = "on">
                    <input id = "hidden" type = "hidden" name = "hidden_val">
                   <label class = "label">Email</label>
                   <input id = "email" type = "text" name = "user_email"  placeholder = "email address">
                   
                    <br><br><br>
                   <label class = "label">Password</label>
                   <input id = "password" type = "password" name = "user_password"  required>
                   <br><br><br>

                   <button id = "btn" type = "submit" name = "signIn" value = "Sign In">Sign In</button>  <br><br><br>
                    
                    <!--<p id = "status"></p>-->
                    <p id= "status"><?php print($message); ?> </p>
                  
                   <a id = "forgot" href = "#forgot"> Forgot Password</a>

                 </form>
              </div>
        </section>
    </main>
    
   <script src = "index.js" type = "text/javascript"></script>

</body>
</html>

