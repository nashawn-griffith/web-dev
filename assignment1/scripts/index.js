//get form element
const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');

//event listeners
form.addEventListener('submit', verifyUser)

//object to stor user data 
var user = {
   email:"", 
  password:""
}

//session array
var sessionArray = new Array();

//load user information when window loads
window.onload = function ()
{
  var userArray = [
     {
        firstName: "Andrew",
        surname: "Dottin",
        email: "a.dottin@gmail.com",
        password:"andrewdottin123",
        role: "Administrator"
     },

     {
      firstName: "Jane",
      surname: "Doe",
      email: "j.doe@hotmail.com",
      password:"janedoe1991",
      role: "Principal"
   },

   {
      firstName: "John",
      surname: "Brown",
      email: "j.brown@brown.net",
      password:"hackerbrown1",
      role: "Lecturer"
   }
  ]

  //add to localStorage 
  if(!localStorage.getItem("userInfo"))
  {
     localStorage.setItem("userInfo", JSON.stringify(userArray));
  }

}//onload

/*verify user. function updates user object with email and password*/
function verifyUser(e)
{
     e.preventDefault();

     user.email = email.value;
     user.password = password.value;
     
     //check if user is valid
     checkUser(user);
}

function checkUser(theUser)
{  
   //get field to display the login message
   const status = document.getElementById('status');

    //validate email & password
   var emailResult = checkEmail(theUser.email);
   var passwordResult = checkPassword(theUser.password);

   if(emailResult ==true && passwordResult ==true)
   {
         //check if user is valid 

          loadData(); //load user data
         
         //get email entered
         var userEmail = theUser.email;
         var userPword = theUser.password;

         //loop through localStorage to identify the user
         for(i = 0; i < userArray.length; i++)
         {
             if(userArray[i].email == userEmail && userArray[i].password == userPword)
             {
               //add user to session storage
                  var user = {
                  name: userArray[i].firstName + " " + userArray[i].surname,
                  role: userArray[i].role 
                  }

                sessionStorage.setItem("session", JSON.stringify(user));

                window.location. href = 'console.html';

                break;
               }
         
         }//end for

         /*user not found in locale storage, clear input fields*/
         email.value = "";
         password.value= "";
         status.innerHTML = "Invalid User";

   }
   else if (emailResult ==true && passwordResult ==false)
   {
        status.innerHTML = 'Password should be @least 8 characters, @least 1 number, alphanumeric ';
   }
   else if(emailResult == false && passwordResult == true)
   {
      status.innerHTML = 'Email address format is incorrect'; 
   }
   else
   {
        status.innerHTML = 'Both email and password formats are incorrect';
   }
}

function checkEmail(theEmail) {

   //Regular expression generator
  var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

   //get email entered by user
   var email = theEmail;

   if(!email.match(reEmail)) {
     
     return false;
   }
  else{
      document.getElementById('status').innerHTML = " ";
      return true;
   }
}//check email


function checkPassword(thePassword)
{  
   var password = thePassword;
   var numberPresent = 0;
   var current;
   var code;

   //verify length of password
   if(password.length >= 8)
   {
       //check for first number in password
       for( var i = 0; i < password.length; i++)
       {  
           current = password.charAt(i);
           code = password.charCodeAt(i);
          if(code > 47 && code < 58 )
          {
               numberPresent ++;
               break;
          }
       }//end for

       //character found. check for alphanumeric
       if(numberPresent > 0)
       {
          for(var i = 0; i < password.length; i++)
          {
              current = password.charAt(i);
              code = password.charCodeAt(i);

               if((code > 47 && code < 58 ) ||(code > 64 && code <91) || (code > 96 && code < 123))
               {
                  continue;
               }
               else
               {
                  return false;
               }
          }
       
        }
        else if(numberPresent == 0)
        {
           return false;
        }
       
       return true;
       
   } //end if
   else
   {
      return false;
   }

}//checkPassword


/*getData*/
function loadData()
{
   //get information from local storage
   var data = localStorage.getItem("userInfo");
   if(data)
   {
      userArray = JSON.parse(data);
      
   }

}//loadData


