/*validation for student.html*/

const logout = document.getElementById('logout');
const table = document.getElementById('table');
const header = document.getElementById("userHeader");
const role = document.getElementById("userRole");

/*get and display user session information*/
var session = JSON.parse(sessionStorage.getItem("session"));
header.innerHTML = "User: " + session.name;
role.innerHTML = "Role: " + session.role;

//get anchor tags
const year2016= document.getElementById('2016');
const year2017 = document.getElementById('2017');
const year2018 = document.getElementById('2018');


year2016.addEventListener('click', display);
year2017.addEventListener('click', display);
year2018.addEventListener('click', display);
logout.addEventListener('click', logOut);

window.onload = function ()
{
   const currentYear = 2018;
   loadStudent(currentYear);
}

function logOut()
{
  //clear session storage
  sessionStorage.setItem("session", JSON.stringify({}));
  window.location.href = "index.html";
}

function display(e)
{
   const year = e.target.innerHTML;

   //clear console before loading other students
   while(table.hasChildNodes())
   {
     table.removeChild(table.firstChild);
   }

   loadStudent(year);
}

function loadStudent(year)
{
    if(year == 2016)
    {
      //get items from local storage
      var studentStorage = JSON.parse(localStorage.getItem("studentsInfo"));

      for( index = 0; index < studentStorage.length; index ++ )
      {
             if(studentStorage[index].year == 2016)
             {
               var id = studentStorage[index].id;
               var fname = studentStorage[index].fname;
               var lname = studentStorage[index].lname;
               var email = studentStorage[index].email;

               //build table with data
               buildTable(id, fname, lname, email);    
             }
      }//end for

    }
    else if(year== 2017)
    {
             //get items from local storage
      var studentStorage = JSON.parse(localStorage.getItem("studentsInfo"));
      for( index = 0; index < studentStorage.length; index ++ )
      {
             if(studentStorage[index].year == 2017)
             {
               var id = studentStorage[index].id;
               var fname = studentStorage[index].fname;
               var lname = studentStorage[index].lname;
               var email = studentStorage[index].email;
               
               //build table with data
               buildTable(id, fname, lname, email);              

             }
      }//end for

    }
    else if(year == 2018)
    {      //get items from local storage
      var studentStorage = JSON.parse(localStorage.getItem("studentsInfo"));
      for( index = 0; index < studentStorage.length; index ++ )
      {
             if(studentStorage[index].year == 2018)
             {
               var id = studentStorage[index].id;
               var fname = studentStorage[index].fname;
               var lname = studentStorage[index].lname;
               var email = studentStorage[index].email;
               
               //build table with data
               buildTable(id,fname,lname,email);

             }
      }//end for  
    }
   
}//load student


//build table with data
function buildTable(id, fname, lname, email)
{
  /*create tags and assign attributes*/
  var row = document.createElement('tr');
  var tableData1 = document.createElement('td');
  var tableData2 = document.createElement('td');
  var tableData3 = document.createElement('td');
  var tableData4 = document.createElement('td');
  var tableData5 = document.createElement('td');
  var tableData6 = document.createElement('td');
  var anchor1 = document.createElement('a');
  var anchor2 = document.createElement('a');

  var editLink = document.createTextNode('Edit');
  var deleteLink = document.createTextNode('Delete');
  var id = document.createTextNode(id);
  var firstName = document.createTextNode(fname);
  var lastName = document.createTextNode(lname);
  var email = document.createTextNode(email);

  anchor1.appendChild(editLink);
  anchor1.setAttribute("href", "#");

  anchor2.appendChild(deleteLink);
  anchor2.setAttribute("href", "#");

  tableData1.appendChild(anchor1);
  tableData1.setAttribute('className', 'table-item');
  tableData2.appendChild(anchor2);
  tableData2.setAttribute('className', 'table-item');

  tableData3.appendChild(id);
  tableData3.setAttribute('className', 'table-item');
  tableData4.appendChild(firstName);
  tableData4.setAttribute('className', 'table-item');
  tableData5.appendChild(lastName);
  tableData5.setAttribute('className', 'table-item');
  tableData6.appendChild(email);
  tableData6.setAttribute('className', 'table-item');

  row.appendChild(tableData1);
  row.appendChild(tableData2);
  row.appendChild(tableData3);
  row.appendChild(tableData4);
  row.appendChild(tableData5);
  row.appendChild(tableData6);

  //executed last
  table.appendChild(row);

}