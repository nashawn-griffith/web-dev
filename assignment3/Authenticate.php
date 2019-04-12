<?php

session_start();

class Authenticate
{
    public function loginUser(array $data)
    {
        #get date
        $fdate = new DateTime();
        $fdate->setTimezone(new DateTimeZone("America/New_York"));
        $date = $fdate->format('d/m/y h:m:s');

        #get user data
         $session_user = array(
        'email' => $data['email'],
        'password' => $data['password'],
        'firstName' => $data['firstName'],
        'lastName' => $data['lastName'],
        'role' => $data['role'],
        'time' => $date
        );

        #store user data in session variable
         $_SESSION['user'] = $session_user;

         if(!empty($_SESSION['user']))
         {
             return true;
         }
    }

    public function isUserLoggedIn()
    {
        if(isset($_SESSION['user']['email']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


   public function getUserInfo(string $field)
  {
    if($field == 'em')
    {
        return $_SESSION['user']['email'];
    }

    if($field == 'pass')
    {
        return $_SESSION['user']['password'];
    }

    if($field == "fname")
    {
        return $_SESSION['user']['firstName'];
    }

    if($field == 'lname')
    {
        return $_SESSION['user']['lastName'];
    }

    if($field == 'role')
    {
        return $_SESSION['user']['role'];
    }

    if($field == 'time')
    {
        return $_SESSION['user']['time'];
    }
} //getUserInfo


 public function logOutUser()
 {
   session_unset();

   session_destroy();
 }

}//Authenticate




?>