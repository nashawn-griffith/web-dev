<?php
   
   if(!isset($_SESSION))
   {
      session_start();
       
   }

   logOutUser();

   header('Location: index.php');

   function logOutUser()
   {
     session_unset();

     session_destroy();
   }

?>