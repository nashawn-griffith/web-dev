<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['update'])) /*update button clicked*/
    {
        //store form data in array
        $id = $_POST['student_id'];
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $email = $_POST['student_email'];
        $address = $_POST['address'];
        $year = $_POST['year'];

        $updateArray = array(
            'id' => $id, 
            'fname' => $fname, 
            'lname' => $lname, 
            'email' => $email,
            'address' => $address,
            'year' => $year
          );
          
          #update student
          updateStudent($updateArray);

         header('Location: students.php');

    }
    else if(isset($_POST['delete'])) /*delete button clicked*/
    {
        #get student id
        (int)$id = $_POST['student_id'];
      
        #delete student
        deleteStudent($id);

        header('Location: students.php');

    }
    

       
    

  
    

}

/*function definitions given below*/

function deleteStudent(int $id)
{
    $file = fopen('students.csv', 'r');

    $record;

    while(!feof($file))
    {
        $record = fgetcsv($file, ',');

        if($record[0] == $id)
        {
            continue;
        }

        $students[] = $record;
    }

    fclose($file);

    #sort the array
    asort($students);

    $file = fopen('students.csv', 'w');

    foreach($students as $s)
    {
        
        fputcsv($file, $s);
    }

    fclose($file);
}

function updateStudent(array $data)
{
    #open file
    $file = fopen('students.csv', 'r');

    #array to store selected student
    $student = array();
    
    #array to store remaining students
    $students = array();

     
    while(!feof($file))
    {
        $result = fgetcsv($file, ',');
        

         if($result[0] == $data['id']) /*student found. Add to array*/
        {
               $student[] = $result;
               continue;
        }
          
          /*else statement was here... incase program breaks*/
           $students[] = $result; /*add remaining students to array*/
        
    }

    fclose($file);

    #update student information
    $student[0] = $data['id'];
    $student[1] = $data['fname'];
    $student[2] = $data['lname'];
    $student[3] = $data['email'];
    $student[4] = $data['address'];
    $student[5] = $data['year'];

    #add updated student to the other students
    $students[] = $student;
    
    #sort array
    asort($students);

    $file = fopen('students.csv', 'w');

    foreach($students as $s)
    {
        
        fputcsv($file, $s);
    }

    fclose($file);

    
}

?>