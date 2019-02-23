//get form element
const form = document.getElementById('form');
//var userArray = new Array(); /*change to users*/
var student = new Array();
var sessionArray = new Array();
form.addEventListener('submit', checkUser);

//sessionStorage.setItem("session", JSON.stringify(sessionArray));

/*for user local storage
  first name, surname, email, password, role
*/




//localStorage.setItem("student", JSON.stringify(student));

//populate temporary student storage 

/*info = {
   ID: "414333650",
   fname :"John",
   lname: "Doe",
   email: "d@gmail.com",
   address: "St.Phillips",
   year: "2018"
}

var s = JSON.parse(localStorage.getItem('student'));
s.push(info);
localStorage.setItem('student', JSON.stringify(s));*/




//testing 
var x = document.getElementById('userHeader');
//var p = document.getElementById('t');
//console.log(p.nodeType);



/*test function*/
function storeUser()
{
   var user = {
        firstName: "Augustine",
        surname: "John",
        email: "a.john@gmail.com",
        password:"john123",
        role: "Administrator"
   }

   var temp_user = JSON.parse(localStorage.getItem("userInfo"));

   if(temp_user)
   {
      temp_user.push(user);
      localStorage.setItem("userInfo", JSON.stringify(temp_user));
   }
   else
   {   
         var userArray = new Array();
         userArray.push(user);
         localStorage.setItem("userInfo", JSON.stringify(userArray));
   }
  
}
   

function checkUser(event)
{
    //prevent default action 
    event.preventDefault();

    /*populate user storage*/
    //storeUser();

    //get email & password enetered
    const email = document.getElementById('email');
    const passWord = document.getElementById('password');
    const status = document.getElementById('status');

    //validate email & password
   var emailResult = checkEmail(email);
   var passwordResult = checkPassword(passWord);

   if(emailResult ==true && passwordResult ==true)
   {
         //check if user is valid 

          loadData(); //load data
         
         //get email entered
         var userEmail = email.value;
         var userPword = password.value;

         //loop through localStorage to identify the user
         for(i = 0; i < userArray.length; i++)
         {
             if(userArray[i].email == userEmail && userArray[i].password == userPword)
             {
               //add user to session storage
                //var temp = JSON.parse(sessionStorage["session"]);
                // var session = JSON.parse(sessionStorage.getItem("session"));

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
        status.innerHTML = 'Incorrect Password entered';
   }
   else
   {
        status.innerHTML = 'Both email and password are incorrect';
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