<?php 
  #require files
  require_once('./login.php');


  class Validate 
  {
     //are credentials valid
    public function areCredentialsValid(array &$user_info)
    {
        require_once('./config.php');

        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

        if(mysqli_connect_errno())
        {
            print('Error connection from validate.php');
        }
        else
        {
            //connection established

            #get email & password
            $email = $user_info['email'];
            $password = $user_info['password'];

           

           $sql = "SELECT * FROM procom_users WHERE email = '$email' AND password = '$password'";

           $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) 
            {
                  //record found

                  while($row = mysqli_fetch_assoc($result)) 
                  {
                    $user_info['firstName'] = $row['firstname'];
                    $user_info['lastName'] = $row['lastname'];
                    $user_info['role'] = $row['role'];
                  }

                  return true;
            } 
            else 
            {
                 //record not found
                 return false;
            }
        
        }
    } //areCredentialsValid

    public function isEmailValid(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             #email is valid
             return true;
          }
          else
          {
              return false;
          }
    }  #isEmailValid

    /*password valid*/
    public function isPasswordValid(string $password)
    {
        $numberPresent = 0;
        #verify length of password >= 8
        if(strlen($password) >=8)
        {
             #check for first number in password
             for($index = 0; $index < strlen($password); $index++)
             { 
                $code = ord($password[$index]);

                if($code > 47 && $code < 58 )
                {
                  $numberPresent ++;
                   break;   
                }
             }#end for

              #character found. check for alphanumeric
              if($numberPresent > 0)
              {
                for($i = 0; $i < strlen($password); $i++)
                {
                    $code = ord($password[$i]);
      
                     if(($code > 47 && $code < 58 ) ||($code > 64 && $code <91) || ($code > 96 && $code < 123))
                     {
                        continue;
                     }
                     else
                     {
                        return false;
                     }
                }
              }
              else if( $numberPresent == 0)
              {
                    return false;
              }
              return true;
        }
        else
        {
            return false;
        }
           
    }//isPasswordValid

  







}//validate






/*LOGIC BELOW*/

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signIn']))
{
    $obj = new Validate();

    #variables
    $emailVerdict = true;
    $passwordVerdict = true;

    #get valude from hidden field
    $val = $_POST['hidden_val'];

    #get user input from field
    $userInfo = array( "email" => $_POST["user_email"],"password" => $_POST["user_password"]);

    #check user email and password on the server
    if($val != 1)
    {
        #check email and password
        $emailVerdict = $obj -> isEmailValid($userInfo['email']);
        $passwordVerdict = $obj -> isPasswordValid($userInfo['password']);
    }


     /*email and password formatted correctly*/
     if($emailVerdict == true && $passwordVerdict == true) 
     {   
           $valid = $obj -> areCredentialsValid($userInfo);
           
           #credentials are valid. Login user
           if($valid != true)
           { 
               $message = 'Invalid User';
               require_once('index.php');
           }
           else
           {
               #user is valid. Login User
               //loginUser($userInfo);
               auth($userInfo);
               
           }
     }
     else if($emailVerdict == true && $passwordVerdict == false)
      {   
          $message = 'Password must be @least 8 characters long, contains only alphanumeric characters with at least one number.';
          require_once('index.php');
      }
      else if($emailVerdict == false && $passwordVerdict == true)
      {
          $message = 'Incorrect email format';
          require_once('index.php');
      }
      else if($emailVerdict == false && $passwordVerdict == false)
      {
          $message = 'Both email and password are in the incorrect format';
          require_once('index.php');    
      }


}

  //$test = new Validate();

  //$user = array('email' => 'a.dottin@gmail.com', 'password' => 'andrewdottin123');

  //$verdict = $test ->areCredentialsValid($user);

  

  

 


 

?>