<?php
   
   if(!isset($_SESSION))
   {
      session_start();
       
   }

   require_once('./Authenticate.php');

   $obj = new Authenticate();

   $obj -> logOutUser();

   header('Location: index.php');

   /*logOutUser();

   

   function logOutUser()
   {
     session_unset();

     session_destroy();
   }*/

?>