/*validation for new.html*/

/*get form fields*/
var studentId = document.getElementById('sid');
var firstName = document.getElementById('fname');
var lastName = document.getElementById('lname');
var email = document.getElementById('eMail');
var address = document.getElementById('Address');
var addButton = document.getElementById('add');
var logout = document.getElementById('logout');


//add event listeners
studentId.addEventListener('blur', checkId);
firstName.addEventListener('blur', checkFirstName);
lastName.addEventListener('blur', checkLastName);
email.addEventListener('blur', checkEmail);
address.addEventListener('blur', checkAddress);
addButton.addEventListener('click', newStudent);
logout.addEventListener('click', redirect);



/*redirect */
function redirect(event)
{
    window.location.href = 'index.html';
}


/*validation functions*/

/*id*/
function checkId(event){
    
    //get element to display result
    let idResult = document.getElementById('id');
    //get id entered
    let id = event.target.value;

    //verify id
    if(id.length == 0)
    {
        idResult.innerHTML = ' ';
    }
    else if((id.length != 9) || (id.charAt(0) != '4'))
    {
         idResult.innerHTML = 'Error: invalid student id format';
    }
    else
    {
        idResult.innerHTML = ' ';
    }
    
}//checkId

/*first name*/
function checkFirstName(event){

    //get element to display result
    let fnameResult = document.getElementById('firstName');

    let name = event.target.value;
    var char;

    //validate name
    if(name.length == 0)
    {
        fnameResult.innerHTML = ' ';
        return;
    }

    for(var i = 0; i < name.length; i++)
    {
        char = name.charCodeAt(i);

        if((char > 64 && char <91) || (char  > 96 && char < 123))
        {
               fnameResult.innerHTML = ' ';
        }
        else{
            fnameResult.innerHTML = 'Error: invalid name format';
            break;
        }
    }
  
}//checkFirstName

/*last name*/
function checkLastName(event)
{
    //get element to display result
    let lnameResult = document.getElementById('lastName');

    let name = event.target.value;
    let char;

    if(name.length == 0)
    {
        lnameResult.innerHTML = ' ';
        return;
    }

    for(let i = 0; i < name.length; i++)
    {
        char = name.charCodeAt(i);

        if((char > 64 && char <91) || (char  > 96 && char < 123))
        {
               lnameResult.innerHTML = ' ';
        }
        else{
            lnameResult.innerHTML = 'Error: invalid name format';
            break;
        }
    }
}//checkLastName

/*Email*/
function checkEmail(event)
{
     //get element to display result
    let emailResult = document.getElementById('email');

   //Regular expression generator
   var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;

   //get email entered
   let email = event.target.value;

   if(email.length == 0)
   {
        emailResult.innerHTML = " ";
        return;
   }
   else if(!email.match(reEmail)) {
       
       emailResult.innerHTML = 'Error: invalid email format'  
    }
    else{
       emailResult.innerHTML = " ";
    }
}//checkEmail

/*address*/
function checkAddress(event)
{
    //get element to display result
    let addResult = document.getElementById('address');

    //get address entered
    let address = event.target.value;

    if(address.length == 0)
      {
        addResult.innerHTML = ' ';
        return;
      }

    //validate address
    var code;

    for(let i = 0; i < address.length; i++)
    {
      code = address.charCodeAt(i);
      console.log(address.length);

      if((code > 47 && code < 58 ) ||(code > 64 && code < 91) || (code > 96 && code < 123) || (code == 127))
      {
           addResult.innerHTML = ' ';
      }
      else
      {
          addResult.innerHTML = 'Error: invalid address format';
          break;
      }
    }   
}//checkAddress


//new student
function newStudent(event)
{

}//newStudent



