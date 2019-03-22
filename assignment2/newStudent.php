<!DOCTYPE html>

<html lang = "en-us">
 <?php
require_once('./login.php');
require_once('./manageStudents.php');

if(!isset($_SESSION))
{
    session_start();
}



#determine if user is logged in
if(!isUserLoggedIn())
{
 header("Location: index.php");
}

if((!isset($idMessage)) && (!isset($fMessage)) && (!isset($lMessage)) && (!isset($eMessage)) && (!isset($aMessage)))
{
        $idMessage = '';
        $fMessage = '';
        $lMessage = ' ';
        $eMessage = ' ';
        $aMessage = ' ' ;
}


  if((!isset($fname)) && (!isset($lname)) && (!isset($email)) && (!isset($address)))
  {
      //$id = $fname = $lname = $email = $address = '';
      $fname = $lname = $email = $address = '';
  }

   $gid = generateId();

   print('gen id: '. $gid);

    if(!isset($edit) && !isset($del))
    {
        $edit = false;
        $del = false; 
    }
 ?>
    <head>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width=device-width,initial-scale = 1.0">
        <title>PROCOMS</title>
        <link rel = "stylesheet" href = "./new.css" type = "text/css">
    </head>

    <body id = "body" >
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
                <h4 id = "userHeader"> </h4>
            </div>

            <div class = "col-6">
                <h4 id = "userRole"> </h4>
            </div>
        </div>

        <div class = "row user">
            <div class = "col-12">
                <h4>New Student</h4>
            </div>
        </div>


        <section class = "row">
           <div class = "col-12">
            <!-- select form based on edit, delete, or new request -->
            <?php if($edit == false && $del == false): ?>
            <form id = "form" action = "manageStudents.php"  method = "POST" autocomplete = "off">

             <?php else: ?>
             <form id = "form" action = "update.php"  method = "POST" autocomplete = "off">
            <?php endif; ?>

              <h5>All fields required</h5>

              <label>Student ID:</label>
               
              <!--Edit link clicked -->
               <?php if($edit == true):?>
               <input id = "sid" type = "text" name = "student_id" value = "<?php print($id) ?>"  disabled > &nbsp;
               <input id = "sid" type = "hidden" name = "student_id" value = "<?php print($id) ?>"> &nbsp;

               <!-- Delete Link clicked -->
               <?php elseif($del == true):?> 
               <input id = "sid" type = "text" name = "student_id" value = "<?php print( $id) ?>" disabled > &nbsp;
               <input id = "sid" type = "hidden" name = "student_id" value = "<?php print($id) ?>" >

               <?php else: ?>
               <input id = "sid" type = "text" name = "student_id" value = "<?php print($gid)?>"> &nbsp;
               <?php endif; ?>

               <span class = "result" id = "id"> <?php print($idMessage)?></span>
               

              <br><br>

              <label>Firstname:</label>
              <!--Edit link clicked -->
              <?php if($edit == true): ?>
              <input id = "fname" type = "text" name = "firstName" value = "<?php print($fname) ?>"> &nbsp;

              <!-- Delete Link clicked -->
              <?php elseif($del == true):?>
              <input id = "fname" type = "text" name = "firstName" value = "<?php print($fname) ?>" disabled > &nbsp;

              <?php else:?>
              <input id = "fname" type = "text" name = "firstName" value = "<?php print($fname) ?>" > &nbsp;
              <?php endif; ?>
              <span class = "result" id = "firstName"><?php print($fMessage)?></span>
             
              <br><br>

              <label>Lastname:</label>
              
              <!--Edit link clicked -->
              <?php if($edit == true):?>
              <input id = "lname" type = "text" name = "lastName" value = "<?php print($lname)?>">&nbsp; 

              <!-- Delete Link clicked -->
              <?php elseif($del == true):?>
              <input id = "lname" type = "text" name = "lastName" value = "<?php print($lname)?>" disabled>&nbsp;

              <?php else: ?>
              <input id = "lname" type = "text" name = "lastName" value = "<?php print($lname)?>" > &nbsp;
               <?php endif; ?>

              <span class = "result" id = "lastName"> <?php print($lMessage)?></span>
                    
              <br><br>

              <label>Email:</label>
               
              <!--Edit link clicked -->
              <?php if($edit == true): ?>
              <input id = "eMail" type = "email" name = "student_email" value = "<?php print($email)?>"> &nbsp;

              <!-- Delete Link clicked -->
              <?php elseif($del ==true):?>
              <input id = "eMail" type = "email" name = "student_email" value = "<?php print($email)?>" disabled> &nbsp;

              <?php else:?> 
              <input id = "eMail" type = "email" name = "student_email" value = "<?php print($email)?>"> &nbsp;
              <?php endif;?>
              
              <span class = "result" id = "email"> <?php print($eMessage)?></span>
            
              <br><br>

              <label>Address:</label>
              <!--Edit link clicked -->
              <?php if($edit == true): ?>
              <input id = "Address" class = "add" type = "text" name = "address" value = "<?php print($address)?>">&nbsp;

              <!-- Delete Link clicked -->
              <?php elseif ($del == true): ?>
              <input id = "Address" class = "add" type = "text" name = "address" value = "<?php print($address)?>" disabled>&nbsp;

              <?php else: ?>
              <input id = "Address" class = "add" type = "text" name = "address" value = "<?php print($address)?>">&nbsp;
              <?php endif; ?>

              <span class = "result" id = "address"><?php print($aMessage)?></span> 
              
              <br><br>

              <label>Year:</label>
                <?php if($edit == true ):?>
                   <select id = "year" name = "year">
                   <?php if($year == 2016):?>
                   <option value = "<?php print($year)?>" ><?php print($year)?></option>
                   <option value = "2017">2017</option>
                   <option value = "2018">2018</option>
                   <?php endif; ?>

                    <?php if($year == 2017): ?>
                    <option value = "<?php print($year)?>" ><?php print($year)?></option>
                    <option value = "2016" >2016</option>
                    <option value = "2018">2018</option>
                    <?php endif; ?>

                    <?php if($year == 2018): ?>
                    <option  value = "<?php print($year)?>" ><?php print($year)?></option>
                    <option  value = "2016" >2016</option>
                   <option  value = "2017">2017</option>
                   <?php endif; ?>
                   
                   </select>

                <?php elseif($del == true):?>
                 <select id = "year" disabled = "disabled">
                  <option name = "year" value = "<?php print($year)?>" ><?php print($year)?></option>
                 </select>

                   <?php else: ?>
                   <select id = "year" name = "year">
                   <option name = "year" value = "2016" >2016</option>
                   <option name = "year" value = "2017">2017</option>
                   <option name = "year" value = "2018">2018</option>
                   </select>

                   <?php endif; ?>

                  
              <br><br>

              <p id = "status"></p>
              <!-- Edit Link clicked. Display appropriate buttons -->
              <?php if($edit == true):?>
              
              <button id = "add" class = "btn" type = "submit" name = "update" value = "Update">Update</button> &nbsp; &nbsp;
              <button class= "btn" type = "submit" name = "cancel" value = "cancel"><a style = "text-decoration: none; color:white;" href = "students.php" >Cancel</a></button>

              <!-- Delete Link clicked. Display appropriate buttons -->
              <?php elseif($del == true):?>
              <button id = "add" class = "btn" type = "submit" name = "add" value = ""> <a style = "text-decoration: none; color:white;" href = "" >Please confirm that you want to delete this record</a></button> <br>
              <button id = "add" class = "btn" type = "submit" name = "delete" value = "delete">Delete</button> &nbsp; &nbsp;
              <button class= "btn" type = "submit" name = "cancel" value = "cancel"><a style = "text-decoration: none; color:white;" href = "students.php" >Cancel</a></button>

            <!--Display regular form submission buttons -->
              <?php else: ?>
              <button id = "add" class = "btn" type = "submit" name = "add" value = "add">Add</button> &nbsp; &nbsp;
              <button class= "btn" type = "submit" name = "cancel" value = "cancel"><a style = "text-decoration: none; color:white;" href = "console.php" >Cancel</a></button>
               
             <?php endif; ?>
             
            </form>

           </div>
        </section>
        </main>
        <!--<script src = "newStudent.js" type = "text/javascript"></script>-->

    </body>
</html>