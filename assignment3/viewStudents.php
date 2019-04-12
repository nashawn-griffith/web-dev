<?php

 if(isset($_GET['year']))
 {
     #get students data based on the year
     $year = $_GET['year'];

     /*get and retrieve students data*/
     processStudents($year);       
 }

 /*function definitions below*/
 function processStudents(string $year)
 {
    /*read csv file & retrun json format*/
    $json= getStudents($year);
 
    /*read json format & view students in HTML format*/
    $format = viewStudents($json);

    #default message to the user
   $message = 'No students to display for this year';

    require_once('students.php');  
 }

 function getStudents(string $year)
 {   
    require_once('./config.php');

    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
     #array to store students
     $students = array();

     $sql = "SELECT * FROM students WHERE year = '$year'";

     $result = mysqli_query($connection, $sql);

     while($row = mysqli_fetch_assoc($result)) 
        {
            $temp = array(
                'id' => $row['id'],
               'firstname' => $row['firstname'],
               'lastname' => $row['lastname'],
               'email' => $row['email'],
               'address' => $row['address'],
               'year' => $row['year']
            );

            $students[] = $temp;  
        }

    #convert to json format
    $json_students = json_encode($students);

    return $json_students;  
      
 } //getStudents


 function viewStudents(string $data)
 {
     
      #decode student json data
      $students = json_decode($data, true);

      $str ="";
      foreach($students as $index => $data)
      {
          #get student id to use in query string
          $id = $data['id'];

          #build html string with student data
        $str .=  '<tr> 
                   <td class = "table-item"> <a href = "manageStudents.php?id='.$id .'&action=edit" > Edit </a> </td>
                    <td class = "table-item"> <a href = "manageStudents.php?id='.$id.'&action=del"> Delete </a> </td>
                    <td class = "table-item" > '. $data['id']. '</td> 
                    <td class = "table-item" > '. $data['firstname']. '</td>
                    <td class = "table-item" > '. $data['lastname']. '</td>
                    <td class = "table-item" > '. $data['email']. '</td>
                 </tr>';  
      }

      return $str;

 } //viewStudents

?>