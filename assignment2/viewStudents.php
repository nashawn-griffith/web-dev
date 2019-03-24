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
     #array to store students
     $students = array();
	 
     #open csv file & read data
     $file = fopen('students.csv', 'r');

    while(!feof($file))
    {
        $record = fgetcsv($file, ',');
        
        if($record[5] == $year) /*year found. Add to students array*/
        {
            $students[] = $record;
        }          
    }
  
    #convert to json format
    $json_students = json_encode($students);

    return $json_students;  
      
 } //getStudents


 function viewStudents(string $data)
 {
     
      #decode student json data
      $students = json_decode($data);

      $str ="";
      foreach($students as $index => $data)
      {
          #get student id to use in query string
          $id =$data[0];
        
          #build html string with student data
        $str .=  '<tr> 
                   <td class = "table-item"> <a href = "manageStudents.php?id='.$id .'&action=edit" > Edit </a> </td>
                    <td class = "table-item"> <a href = "manageStudents.php?id='.$id.'&action=del"> Delete </a> </td>
                    <td class = "table-item" > '. $data[0]. '</td> 
                    <td class = "table-item" > '. $data[1]. '</td>
                    <td class = "table-item" > '. $data[2]. '</td>
                    <td class = "table-item" > '. $data[3]. '</td>
                 </tr>';  
      }

  
      return $str;

 } //viewStudents

?>