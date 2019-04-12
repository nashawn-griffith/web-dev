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

?>