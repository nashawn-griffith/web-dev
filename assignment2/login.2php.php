<?php
session_start();

$session_user = array();
$var = 5;



function x()
{
    global $session_user;
    print_r($session_user);
}
function loginUser(array $data)
{
    global $session_user;
    test($data, $session_user);

    //print_r($session_user);
    
    #store data in session variable

    //$date = date("d/m/y h:m:s");

    /*$session_user = array(
      "email" => $data["email"],
      "password" => $data["password"],
      "firstName" => $data["firstName"],
      "lastName" => $data["lastName"],
      "role" => $data["role"],
      "time" => $date
    );*/

    //$GLOBALS['user'] = $session_user;

    $_SESSION['email'] = $session_user['email'];
    $_SESSION['password'] = $session_user['password'];
    $_SESSION['firstName'] = $session_user['firstName'];
    $_SESSION['lastName'] = $session_user['lastName'];
    $_SESSION['role'] = $session_user['role'];
    $_SESSION['time'] = $session_user['time'];


  

    $x = isUserLoggedIn();
    print($x);
    #redirect user to console.php
    header('Location: console.php');
    exit();
  

  
  
}//loginUser


function test(array $d, array &$s)
{
    $date = date("d/m/y h:m:s");
    $s['email'] = $d['email'];
    $s['password'] = $d['password'];
    $s['firstName'] = $d['firstName'];
    $s['lastName'] = $d['lastName'];
    $s['role'] = $d['role'];
    $s['time'] = $date;
}


function isUserLoggedIn()
{
    global $session_user;

    print("Logged in: " . $session_user['email']);
    print("session: " . $_SESSION['email']);

   if(isset($session_user["email"]))
   {
       return true;
   }
   else
   {
       return false;
   }
      
}

?>