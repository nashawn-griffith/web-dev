<?php

#set default time zone
//date_default_timezone_set("America/New_York");

function auth(array $arr)
{
    require_once('./Authenticate.php');

    $obj = new Authenticate();

    $obj -> loginUser($arr);

    if($obj == true)
    {
       header('Location: console.php');
    }  
}









/*function loginUser(array $data)
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

    #redirect to console.php
    header("Location: console.php");

}//loginUser*/

/*function isUserLoggedIn()
{
    if(isset($_SESSION['user']['email']))
    {
        return true;
    }
    else
    {
        return false;
    }
}//isUserLoggedIn*/

/*function getUserInfo(string $field)
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

} //getUserInfo */


?>