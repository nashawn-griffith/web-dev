/*validation for new.html*/

/*get form fields*/
var form = document.getElementById('form');
var studentId = document.getElementById('sid');
var firstName = document.getElementById('fname');
var lastName = document.getElementById('lname');
var email = document.getElementById('eMail');
var address = document.getElementById('Address');
//var addButton = document.getElementById('add');
var logout = document.getElementById('logout');
var year = document.getElementById('year');

const header = document.getElementById("userHeader");
const role = document.getElementById("userRole");

/*get and display user session information*/
var session = JSON.parse(sessionStorage.getItem("session"));
header.innerHTML = "User: " + session.name;
role.innerHTML = "Role: " + session.role;

//console.log(year.options[year.selectedIndex].value);
//var p = document.getElementById('shot');

//add event listeners
studentId.addEventListener('blur', checkId);
firstName.addEventListener('blur', checkFirstName);
lastName.addEventListener('blur', checkLastName);
email.addEventListener('blur', checkEmail);
address.addEventListener('blur', checkAddress);
//addButton.addEventListener('click', validateStudent);
form.addEventListener('submit', validateStudent);
logout.addEventListener('click', logOut);

//variables for form input
var id, name, lname, email, address;


//variables to store truth values of fields
var id_bool = false;
var fname_bool = false;
var lname_bool = false;
var email_bool = false;
var add_bool = false;

/*logOut*/
function logOut()
{
    window.location.href = 'index.html';
}


/*validation functions*/

/*id*/
function checkId(event){
    
    //get element to display result
    let idResult = document.getElementById('id');
    
    //get id entered
     id = event.target.value;

    //verify id
    if(id.length == 0)
    {
        idResult.innerHTML = ' ';
        id_bool = false;
    }
    else if((id.length != 9) || (id.charAt(0) != '4'))
    {
         idResult.innerHTML = 'Error: invalid student id format';
         id_bool = false;
    }
    else
    {
        
        idResult.innerHTML = ' ';
        id_bool = true;
    }
    
}//checkId

/*first name*/
function checkFirstName(event){

    //get element to display result
    let fnameResult = document.getElementById('firstName');

    name = event.target.value;
    var char;

    //validate name
    if(name.length == 0)
    {
        fnameResult.innerHTML = ' ';
        fname_bool = false;
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
            fname_true = false;
            break;
        }

        fname_bool = true;
    }
  
}//checkFirstName

/*last name*/
function checkLastName(event)
{
    //get element to display result
    let lnameResult = document.getElementById('lastName');

    lname = event.target.value;
    let char;

    if(lname.length == 0)
    {
        lnameResult.innerHTML = ' ';
        lname_bool = false;
        return;
    }

    for(let i = 0; i < lname.length; i++)
    {
        char = lname.charCodeAt(i);

        if((char > 64 && char <91) || (char  > 96 && char < 123))
        {
               lnameResult.innerHTML = ' ';
        }
        else{
            lnameResult.innerHTML = 'Error: invalid name format';
            lname_bool = false;
            break;
        }

        lname_bool = true;
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
   email = event.target.value;

   if(email.length == 0)
   {
        emailResult.innerHTML = " ";
        email_bool = false;
        return;
   }
   else if(!email.match(reEmail)) {
       
       emailResult.innerHTML = 'Error: invalid email format' 
       email_bool = false; 
    }
    else{
       emailResult.innerHTML = " ";
       email_bool = true;
    }
}//checkEmail

/*address*/
function checkAddress(event)
{
    //get element to display result
    let addResult = document.getElementById('address');

    //get address entered
    address = event.target.value;

    if(address.length == 0)
      {
        addResult.innerHTML = ' ';
        add_bool = false;
        return;
      }

    //validate address
    var code;

    for(let i = 0; i < address.length; i++)
    {
      code = address.charCodeAt(i);
      if((code > 47 && code < 58 ) ||(code > 64 && code < 91) || (code > 96 && code < 123) || (code == 32))
      {
           addResult.innerHTML = ' ';
      }
      else
      {
          addResult.innerHTML = 'Error: invalid address format';
          add_bool = false;
          break;
      }

      add_bool = true;
    }//end for
}//checkAddress

function validateStudent(event)
{
    event.preventDefault();
    
    if(id_bool && fname_bool && lname_bool && email_bool &&add_bool)
    {
        var Student = {
            id:id,
            fname:name,
            lname:lname,
            email:email,
            address:address,
            year: year.options[year.selectedIndex].value
        }
    
        //add new student
        newStudent(Student);

        //redirect to students.html
        window.location.href = "students.html";
    }
    else
    {
        //console.log("one value is incorrect");
    }
}
//new student
function newStudent(student)
{
    //add student to local storage

    var studentStorage = JSON.parse(localStorage.getItem("studentsInfo"));

    if(!studentStorage) //local storage empty
    {
        studentsArray = new Array();
        studentsArray.push(student);
        localStorage.setItem("studentsInfo", JSON.stringify(studentsArray));
    }
    else
    {
         //get items in local storage
         var student_temp = studentStorage;

         //add new student to storage
         student_temp.push(student);
         localStorage.setItem("studentsInfo", JSON.stringify(student_temp));
    }

}//newStudent



