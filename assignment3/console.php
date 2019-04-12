
<!DOCTYPE html>

<?php
    require_once('./login.php');
    require_once('./Authenticate.php');
    
    $obj = new Authenticate();

    #check if session exists
    if(!isset($_SESSION))
    {
        session_start();
    }

    #check if user logged in
    if(! $obj -> isUserLoggedIn())
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

<html>
    <head>
        <meta charset = "utf-8">
        <meta name =  "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>PROCOMS</title>
        <link rel = "stylesheet" href = "console.css" type = "text/css">
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
                    <a id = "logout" href="logout.php">Logout</a>
                </div>
            </div>     
        </div>
    
        </header>
        
        <div class = "row user">
            <div class = "col-6">
                <h4 id = "userHeader"> User: <?php print($fname." ".$lname)?> </h4>
            </div>

            <div class = "col-6">
                <h4 id = "userRole"> Role: <?php print($role) ?></h4>
            </div>
        </div>

        <section>
           <div class = "row">
               <div class = "col-12">
                   <table>
                       <tr >
                           <td id = "t" class = "table-item" > <a href = "students.php" >Students</a></td>
                           <td class = "table-item"> <a href = "courses.php" >Courses</a></td>
                           <td class = "table-item"><a href = "#" >Correspondence</a></td>
                       </tr>

                       <tr>
                           <td class = "table-item"> <a href = "#"> Lecturers</a></td>
                           <td class = "table-item"> <a href = "#" >Schedule</a></td>
                           <td class = "table-item"> <a href ="#">Documentation</a></td>
                       </tr>
                   </table>
               </div>
           </div>
            </section>
        </main>

    </body>
</html>