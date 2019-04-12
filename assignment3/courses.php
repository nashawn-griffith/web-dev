    <?php

    require_once('./login.php');
    require_once('./Authenticate.php');

    $obj = new Authenticate();

    if(!isset($_SESSION))
    {
        session_start();
    }

    #determine if user is logged in
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

    require_once('./config.php');

    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    if(mysqli_connect_errno())
    {
    print('Error connection from courses.php');
    }

    else
    {
        //connection established
        $sql = "SELECT * FROM courses";

        $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
                    //record found

                    $courses = array();
                    //$temp = array();

                    while($row = mysqli_fetch_assoc($result)) 
                    {
                        //$string = $row['courseCode']." ".$row['courseName'];
                        $temp = array (
                        "code" => $row['courseCode'],
                            "name" => $row['courseName']
                        );

                        $courses[] = $temp; 
                    }
            } 
            else 
            {
                    //record not found
                    print('Record not found');
            }
        
        }
    ?>

    <!DOCTYPE html>
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
                    <h4 id = "userHeader">User: <?php print($fname. ' '.$lname) ?></h4>
            </div>

            <div class = "col-6">
                <h4 id = "userRole">Role: <?php print($role)?></h4>
            </div>
        </div>

        <div class = "row user">
            <div class = "col-12">
                <h4>Courses</h4>
            </div>
        </div>

        <!--navigation-->
        <!--
        <nav class = "row navigation">
            <div class = "col-12">
                <ul class = "nav-list" >
                    <li class = "nav-item"><a id = "2016" href = "#">2016</a></li>
                    <li class = "nav-item"><a id = "2017" class = "year" href = "#">2017</a></li>
                    <li class = "nav-item"><a id = "2018" class =  "year" href = "#">2018</a></li>
                    <li class = "nav-item last"><a href = "new.php">New Student</a></li>
                </ul>    
            </div>
        </nav>-->
        
        <!--table to display student information-->
        <table id = "table">
            <tr>
                <td class = "table-item"> </td>
                <td class = "table-item"> </td>
                <td class = "table-header"> Course ID</td>
                <td class = "table-header"> Course Title </td>
            </tr> 
            <tr> </tr>
            <?php foreach($courses as $index => $course):?>    
            <tr>
                <td class = "table-item"> <a href ="#"> Edit </td>
                <td class = "table-item"> <a href = "#"> Delete </td>
                <td class = "table-item"> <?php print($course['code']) ?> </td>
                <td class = "table-item"> <?php print($course['name']) ?> </td>
            </tr>
            <?php endforeach ?>    
        </table>
        
            </main>

    </body>

    </html>
