<?php
  
  #require files
  require_once('./login.php');

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signIn']))
  {
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
          $emailVerdict = isEmailValid($userInfo['email']);
          $passwordVerdict = isPasswordValid($userInfo['password']);
      }

       /*email and password formatted correctly*/
      if($emailVerdict == true && $passwordVerdict == true) 
      {   
            $valid = areCredentialsValid($userInfo);
            
            #credentials are valid. Login user
            if($valid != true)
            { 
                $message = 'Invalid User';
                require_once('index.php');
            }
            else
            {
                #user is valid. Login User
                loginUser($userInfo);
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


  /*Function definitions*/

    function areCredentialsValid(array &$user_info)
    {
        $count = 0;
        #get email & password
        $email = $user_info['email'];
        $password = $user_info['password'];

        #open csv file
        $file = fopen('users.csv', 'r');
        
        #loop through the file
        while(!feof($file))
        {
            $record = fgetcsv($file,',');

            #loop through record 
            for($i = 0; $i < count($record); $i =$i + 5)
            {
                #extract email & password from csv file
                $user_email = $record[$i];
                $user_password = $record[$i + 1];
                
                #verify email & password
                if(($password == $user_password) && ($email == $user_email)) /*match found*/
                {
                    #user found
                    $f_name = $record[$i + 2]; 
                    $l_name = $record[$i + 3]; 
                    $role = $record[$i + 4]; 

                    #add information to user array
                    $user_info[ "firstName"]=$f_name;
                    $user_info[ "lastName"] =$l_name;
                    $user_info[ "role"] =$role;

                    $count ++;
                }
            }

        }//end while

        fclose($file);
        
        #check number of times user was found
        if($count == 1)
        {
            return true;    
        }
        else
        {
            return false;
        }
    } //areCredentialsValid

    #check if emaill is valid
    function isEmailValid(string $email)
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

     #check if password is valid
    function isPasswordValid(string $password)
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

    function isIdValid(string $id)
    {
         if(strlen($id) == 0)
         {
             return false;
         }

        if(($id[0] == 4 ) && (strlen($id) == 9))
        {
            return true;
        }

       
    }//isIdValid

    function isNameValid(string $name)
    {
        //print(strlen($name));

        if(strlen($name) == 0)
        {
            return false;
        }

        for($index = 0; $index < strlen($name); $index++)
        {
            $char = ord($name[$index]);

            if(($char > 64 && $char < 91) || ($char > 96 && $char < 123))
            {   
                continue;
            }
            else
            {
                return false;
               
            }
        }

        return true;

    }//isNameValid

    function isAddressValid(string $addr)
    {
        if(strlen($addr) == 0)
        {
            return false;
        }

        for($index = 0; $index < strlen($addr); $index++)
        {
           $char = ord($addr[$index]);

          if(($char > 47 && $char < 58) || ($char > 64 && $char < 91) || ($char > 96 && $char < 123) || ($char == 32))
          {
                continue;
          }
          else
          {
              return false;
          }   
        }

        return true;
    
    }//isAddressValid


?>