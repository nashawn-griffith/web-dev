<?php

require_once('./validate.php');

 if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST['add']))
 {
    
    $id = $_POST['student_id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $email = $_POST['student_email'];
    $address = $_POST['address'];
    $year = $_POST['year'];

   
    #validate form data
    $id_v = isIdValid($id);
    $fname_v = isNameValid($fname);
    $lname_v = isNameValid($lname);
    $email_v = isEmailValid($email);
    $add_v = isAddressValid($address);

    if($id_v == true && $fname_v == true && $lname_v == true && $email_v == true & $add_v == true)
    {
        //add student
        $student = array($id, $fname, $lname, $email, $address, $year);

        newStudent($student);

        //require_once('students.php');

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
 function generateId()
 {
     #open csv file & get record from the file
     $file = fopen('students.csv', 'r');
     while(!feof($file))
     {
         $record = fgetcsv($file, 'r');

         $gid[] = $record[0];
     }
     fclose($file);

   
     if($gid[0]== null)
     {
         return '400000000';
     }
     

     return $gid[count($gid) - 2] + 1;
         
 }

 
 /*handle Update & Edit links*/
 if(isset($_GET['id']) && isset($_GET['action']))
 {
     #get action. Edit /Delete
     $action = $_GET['action'];
     $record;

    #open csv file & get record from the file
     $file = fopen('students.csv', 'r');

     while(!feof($file))
     {
         $record = fgetcsv($file, 'r');
        
         if($record[0] == $_GET['id'])
         {
              break;
         }
     }

     fclose($file);

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

     #get student information
     $id = $record[0];
     $fname = $record[1];
     $lname = $record[2];
     $email = $record[3];
     $address = $record[4];
     $year = $record[5];

     require_once('./newStudent.php');
 }

 #new Student
 function newStudent(array $data)
 {
       #open csv file & get record from the file
       $file = fopen('students.csv', 'r');

       $record;

       while(!feof($file))
       {
           $record = fgetcsv($file, ',');

           $students[] = $record;
       }
   
       fclose($file);

       $students[] = $data;
   
       #sort the array
       asort($students);
   
       $file = fopen('students.csv', 'w');
   
       foreach($students as $s)
       {
           
           fputcsv($file, $s);
       }
   
       fclose($file);

        //redirect to students
 }
  
 


?>