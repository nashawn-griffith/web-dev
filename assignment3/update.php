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
        $id = $_POST['student_id'];
        
      
        #delete student
        deleteStudent($id);
        
        header('Location: students.php');

    }  

}

/*function definitions given below*/

function deleteStudent(string $id)
{
   
    require_once('./config.php');

    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    $sql = "DELETE FROM students WHERE id = '$id' ";

    $result = mysqli_query($connection, $sql);
   
    mysqli_close($connection);
  
   
}

function updateStudent(array $data)
{ 
    require_once('./config.php');

   $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
 
   $id = $data['id'];
   $fname = $data['fname'];
   $lname = $data['lname'];
   $email = $data['email'];
   $address = $data['address'];
   $year = $data['year'];

   $sql = "UPDATE students SET firstname = '$fname', lastname = '$lname', 
        email = '$email', address = '$address', year = '$year' WHERE id = '$id' ";

    $result = mysqli_query($connection, $sql);
  
    mysqli_close($connection);
      
}

?>