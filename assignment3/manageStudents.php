<?php

require_once('./validate.php');

$vobj = new Validate();

 if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['add']))
 {
    
    $id = $_POST['student_id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['student_email'];
    $address = $_POST['address'];
    $year = $_POST['year'];

    #validate form data
    $id_v = $vobj -> isIdValid($id);
    $fname_v = $vobj -> isNameValid($fname);
    $lname_v = $vobj -> isNameValid($lname);
    $email_v = $vobj -> isEmailValid($email);
    $add_v = $vobj -> isAddressValid($address);

    if($id_v == true && $fname_v == true && $lname_v == true && $email_v == true & $add_v == true)
    {
        //add student
        $student = array($id, $fname, $lname, $email, $address, $year);

        newStudent($student);

        header('Location: students.php');   
    }
    else
    {
        /*Errors with form input. Display appropriate messages*/
        if($id_v == false)
        {
            $idMessage = 'Error: invalid student id format';
        }
        else
        {
            $idMessage = '';
        }
    
        if($fname_v == false)
        {
            $fMessage = 'Error: invalid name format';
        }
        else
        {
            $fMessage = '';
        }
    
        if($lname_v == false)
        {
            $lMessage = 'Error: invalid name format';
        }
        else
        {
            $lMessage = '';   
        }
    
        if($email_v == false)
        {
            $eMessage = 'Error: invalid name format';
        }
        else
        {
            $eMessage = '';
        }
    
        if($add_v == false)
        {
            $aMessage = 'Error: invalid address format';
        }
        else
        {
            $aMessage = '';
        }
    
        require_once('./newStudent.php');  

    }//end else
  
 }

 #generate new student ID
 function generateId($y)
 {
     $gid = array();
     $year = $y;

     require_once('./config.php');

     $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

     $sql = "SELECT * FROM students WHERE year = '$year'";

     $result = mysqli_query($connection, $sql);

     if (mysqli_num_rows($result) > 0)
     {
        while($row = mysqli_fetch_assoc($result)) 
        {
            $id = $row['id'];
            
            $temp = array('id' => $id);
            $gid[] = $temp;
        }

        //get last item
        $last = $gid[count($gid) -1]['id'];

        $id = $last + 1;
        return $id;  
     }
     else 
        {
                //generate new id
                $sub = substr($year, 2, 2);

                $id = '4'.$sub.'000000';
                return $id;
        }    
 }

 
 /*handle Update & Edit links*/
 if(isset($_GET['id']) && isset($_GET['action']))
 {
     #get action. Edit /Delete
     $action = $_GET['action'];

     require_once('./config.php');

     $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

     $id = $_GET['id'];

     $sql = "SELECT * FROM students WHERE id = '$id'";

     $result = mysqli_query($connection, $sql);

      while($row = mysqli_fetch_assoc($result)) 
        {
            $id = $row['id'];
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $email = $row['email'];
            $address = $row['address'];
            $year = $row['year'];
        }

     #action = edit
     if($action == "edit")
     {
         $edit = true;
         $del = false;
     }
     
     #action = delete
     if($action == 'del')
     {
         $del = true;
         $edit = false;
     }

     require_once('./newStudent.php');
 }

 #new Student
 function newStudent(array $data)
 {
       #generate student ID
       $year = $data[5];
       $id = generateId($year);
    
       $data[0]= $id;

    require_once('./config.php');

     $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

     $id = $data[0];
     $firstname = $data[1];
     $lastname = $data[2];
     $email = $data[3];
     $address = $data[4];
     $year = $data[5];

   
     $sql = "INSERT INTO students VALUES
      ('$id', '$firstname', '$lastname', '$email', '$address', '$year' )";


     $result = mysqli_query($connection, $sql);
 }
  
 


?>