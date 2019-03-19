<?php

#start session
session_start();

function loginUser(array $data)
{
    #get date
    $date = date("d/m/y h:m:s");

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

    #store user data in session variables
    $_SESSION["email"] = $data["email"];
    $_SESSION['password'] = $data['password'];
    $_SESSION['firstName'] = $data['firstName'];
    $_SESSION['lastName'] = $data['lastName'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['time'] = $date;

    #redirect to console.php
    header("Location: console.php");

}//loginUser

function isUserLoggedIn()
{
    if(isset($_SESSION['user']['email']))
    {
        print_r($_SESSION['user']['email']);
        return true;
    }
    else
    {
        return false;
    }
}

function getUserInfo(string $field)
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
}
?>