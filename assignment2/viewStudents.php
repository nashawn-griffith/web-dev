<?php
 
 if(isset($_GET['year']))
 {
     #get students data based on the year
     $year = $_GET['year'];
     $json= getStudents($year);

     $format = viewStudents($json);

     require('students.php');
     
 }

 /*function definitions below*/

 function getStudents(string $year)
 {
     $students = array();
     $file = fopen('students.csv', 'r');

        while(!feof($file))
        {
            $record = fgetcsv($file, ',');

            if($record[5] == $year)
            {
                $students[] = $record;
            }          
        }
        $json_students = json_encode($students);

        return $json_students;    
 }


 function viewStudents(string $data)
 {
      $students = json_decode($data);
      $str ="";
      foreach($students as $index => $data)
      {
          $id =$data[0];
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
 }

?>