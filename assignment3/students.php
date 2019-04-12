<!DOCTYPE html>

<?php
   require_once('./viewStudents.php');
   require_once('./login.php');
   require_once('./Authenticate.php');

   $obj = new Authenticate();

  if(!isset($_SESSION))
  {
      session_start();
  }
  
  if(!isset($message))
  {
      $message = '';
  }

  if(!isset($format))
  {
      $format = '<h4>Click on a year to view students </h4>';
  }


 #determine if user is logged in
 if(! $obj ->isUserLoggedIn())
 {
   header("Location: index.php");
 }

/*user is logged in. Retrieve session variables*/
$userEmail = $obj -> getUserInfo('em');
$userPassword = $obj -> getUserInfo('pass');
$fname = $obj -> getUserInfo('fname');
$lname = $obj -> getUserInfo('lname');
$role = $obj -> getUserInfo('role');
$time = $obj -> getUserInfo('time');
?>

<html lang = "en-us">
    <head >
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>PROCOMS</title>
        <link rel = "stylesheet" href = "student.css" type = "text/css">
    </head>

    <body>
        <main id = "main">
        <header class = "row ">
            <div class = "col-10 title">
                <h3>Programme: M.Sc Information Technology</h3>   
            </div>

             <!--Hamburger Menu -->
             <div class = "col-2"> 
                <div class = "nav">
                    <label id = "label" for = "toggle">&#9776;</label>
                    <input type = "checkbox" id = "toggle">
                    <div class = "hlinks">
                        <a href="#">Account</a>
                        <a href="#">Settings</a>
                        <a id = "logout"href="logout.php">Logout</a>
                    </div>
                </div>     
                </div>

        </header>
                
        <div class = "row user">
            <div class = "col-6">
                    <h4 id = "userHeader">User: <?php print($fname.' '.$lname) ?></h4>
            </div>

            <div class = "col-6">
                <h4 id = "userRole">Role: <?php print($role)?></h4>
            </div>
        </div>

        <div class = "row user">
            <div class = "col-12">
                <h4>Students</h4>
            </div>
        </div>

        <!--navigation-->
        <nav class = "row navigation">
            <div class = "col-12">
                <ul class = "nav-list" >
                    <li class = "nav-item"><a id = "2016" href = "viewStudents.php?year=2016">2016</a></li>
                    <li class = "nav-item"><a id = "2017" class = "year" href = "viewStudents.php?year=2017">2017</a></li>
                    <li class = "nav-item"><a id = "2018" class =  "year" href = "viewStudents.php?year=2018">2018</a></li>
                    <li class = "nav-item last"><a href = "newStudent.php">New Student</a></li>
                </ul>    
            </div>
        </nav>
        
        <!--table to display student information-->
        <table id = "table"> 
         
        <!-- No students to display -->
        <?php if(strlen($format) == 0):?>
        <h4> <?php print($message) ?> </h4>
        <?php endif;?>
        
        <!-- display student -->
        <?php if(strlen($format) > 0):?>
           <?php print($format) ?>
        <?php else: ?>
           <?php print($format)?>
        <?php endif; ?>
        </table>
        
         </main>

    </body>

</html>
