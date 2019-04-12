//get form element
//const form = document.getElementById('form');
const email = document.getElementById('email');
const password = document.getElementById('password');
const hidden = document.getElementById('hidden');

//event listeners
email.addEventListener('blur',validateEmail);
password.addEventListener('blur',validatePassword);

const status = document.getElementById('status');

var emailResult;
var passwordResult;

function validateEmail(e)
{
   let Email = e.target.value;

   emailResult = checkEmail(Email);
   
   if(emailResult == true)
   {
      hidden.value = 1;
   }

   if(emailResult == false)
   {
      status.innerHTML = 'Email address format is incorrect';
   }   
}

function validatePassword(e)
{
   let pword = e.target.value;

   passwordResult = checkPassword(pword);

   if(passwordResult == false)
   {
      status.innerHTML = 'Password should be @least 8 characters, @least 1 number, alphanumeric ';
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


