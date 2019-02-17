/*add listener for submit event*/

/*Email validation*/
var email = document.getElementById('email');
var passWord = document.getElementById('password');
var input = document.getElementById('btn');
var form = document.getElementById('form');
var forget = document.getElementById('forget');


//input.addEventListener('submit', validateInput(email, password));
input.addEventListener('submit', checkUser(email));

function checkUser(theUser)
{
   var passWord = document.getElementById('password');

   var emailResult = checkEmail(theUser);
   var passwordResult = checkPassword(passWord);

   console.log('The value of email result : '+ emailResult);
   console.log('The value of password result ' + passwordResult);

   if(emailResult ==true && passwordResult ==true)
   {
        document.getElementById('status').innerHTML = " ";
   }
   else if(emailResult == false && passwordResult ==true)
   {
         //get node to display message
      var p = document.getElementById('status');

      var message = document.createTextNode('Incorrect Email entered');
      p.append(message);

      form.insertBefore(p, document.getElementById('forgot'));
   }
   else if (emailResult ==true && passwordResult ==false)
   {
          //get node to display message
      var p = document.getElementById('status');

      var message = document.createTextNode('Incorrect Password entered');
       p.append(message);

       form.insertBefore(p, document.getElementById('forgot'));    
   }
   else
   {
         //get node to display message
         var p = document.getElementById('status');

         var message = document.createTextNode('Both email and password are incorrect');
          p.append(message);
   
          form.insertBefore(p, document.getElementById('forgot')); 
   }

}//checkUser

function checkEmail(theEmail) {

    //Regular expression generator
   var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

    //get email entered by user
    var email = theEmail.value;
    
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
   var password = thePassword.value;
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


/*load student year*/
function loadStudents(year);
