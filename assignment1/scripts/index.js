//get form element
const form = document.getElementById('form');
var studentArray = new Array();
var sessionArray = new Array();
sessionStorage.setItem("session", JSON.stringify(sessionArray));

/*var h = document.getElementById('userHeader');
var r = document.getElementById('userRole');
console.log(h);
console.log(r);*/



//testing 
var x = document.getElementById('userHeader');
//var p = document.getElementById('t');
//console.log(p.nodeType);




form.addEventListener('submit', checkUser);

/*test function*/
function store()
{
   var student = {
      email:"jamal@hotmail.com",
      password:"william1235"
   }

   var temp = JSON.parse(localStorage["studentInfo"]);
   temp.push(student);
   //var tt = JSON.stringify(temp);
 // studentArray.push(student);
    localStorage.setItem("studentInfo", JSON.stringify(temp));
}
   

function checkUser(event)
{
    //prevent default action 
    event.preventDefault();

    /*call local storage function*/
    //store();
    //console.log(studentArray);
    
    //get email & password enetered
    const email = document.getElementById('email');
    const passWord = document.getElementById('password');
    var status = document.getElementById('status');

    //console.log('Email Type: ' + email.nodeType);

    //validate email & password
   var emailResult = checkEmail(email);
   var passwordResult = checkPassword(passWord);
   
   //console.log('The value of email result : '+ emailResult);
   //console.log('The value of password result ' + passwordResult);


   if(emailResult ==true && passwordResult ==true)
   {
         //check if user is valid 
         
          loadData(); //load data
         
         //get email entered
         var userEmail = email.value;
         var userPword = password.value;

         for(i = 0; i < studentArray.length; i++)
         {
             if(studentArray[i].email == userEmail && studentArray[i].password == userPword)
             {
                console.log('Hello It Works');
                var temp = JSON.parse(sessionStorage["session"]);
                
                var user = {
                   email: userEmail,
                   password: userPword
                }

                temp.push(user);
                sessionStorage.setItem('session', JSON.stringify(temp)); 

                console.log(sessionStorage.getItem('session'));

                window.location. href = 'console.html';

                break;
             }

            // var temp = JSON.parse(sessionStorage['session']);

            // console.log(temp);

             //window.location. href = 'console.html';
         
         }//end for


        /* if(studentArray.length == 0)
         {
               var student = {
                  name:"John",
                  sname: "Doe"
               }

               //console.log(student);

               studentArray.push(student);
               localStorage.setItem("studentInfo", JSON.stringify(studentArray));
         }
         else
         {
             let temp = JSON.parse(localStorage["studentInfo"]);
             var student = {
                name: "Keldon",
                sname:"William"
             }

             temp.push(student);
             localStorage.setItem("studentInfo", JSON.stringify(temp));
         } /*
      
        
        status.innerHTML = " "; 
      }
   
   else if(emailResult == false && passwordResult ==true)
   {
       status.innerHTML = 'Incorrect Email entered'
         //get node to display message
     /* var p = document.getElementById('status');

      var message = document.createTextNode('Incorrect Email entered');
      p.append(message);

      form.insertBefore(p, document.getElementById('forgot'));*/
   }
   else if (emailResult ==true && passwordResult ==false)
   {
        status.innerHTML = 'Incorrect Password entered';
          //get node to display message
      /*var p = document.getElementById('status');

      var message = document.createTextNode('Incorrect Password entered');
       p.append(message);

       form.insertBefore(p, document.getElementById('forgot'));*/
   }
   else
   {
        status.innerHTML = 'Both email and password are incorrect';
         //get node to display message
        /* var p = document.getElementById('status');

         var message = document.createTextNode('Both email and password are incorrect');
          p.append(message);
   
          form.insertBefore(p, document.getElementById('forgot')); */
   }


}//checkUser


function checkEmail(theEmail) {

   //Regular expression generator
  var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

   //get email entered by user
   var email = theEmail.value;
   console.log('Email entered: ' + email);
   
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

   console.log("Password entered is: " + password);
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
   var data = localStorage.getItem("studentInfo");
   if(data)
   {
      studentArray = JSON.parse(data);
      
   }

}//loadData