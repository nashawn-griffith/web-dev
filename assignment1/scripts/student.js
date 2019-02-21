/*validation for student.html*/

const logout = document.getElementById('logout');
const table = document.getElementById('table');

//get anchor tages
const year2016= document.getElementById('2016');
const year2017 = document.getElementById('2017');
const year2018 = document.getElementById('2018');



year2016.addEventListener('click', display);
year2017.addEventListener('click', display);
year2018.addEventListener('click', display);

logout.addEventListener('click', redirect);

function redirect()
{
   window.location.href = 'index.html';
}

function display(event)
{
   console.log(event.target);
   const year = event.target.innerHTML;

   //console.log(year);
 
   //clear console before loading other students
   while (table.firstChild) {
      table.removeChild(table.firstChild);
   }

   loadStudent(year);
}

function loadStudent(y)
{
    if(y == 2016)
    {
      //get items from local storage
      var studentStorage = JSON.parse(localStorage.getItem("student"));
      

      for( index = 0; index < studentStorage.length; index ++ )
      {
             if(studentStorage[index].year == 2016)
             {
               var id = studentStorage[index].ID;
               var fname = studentStorage[index].fname;
               var lname = studentStorage[index].lname;
               var email = studentStorage[index].email;

                        //build table with data
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
               tableData1.setAttribute('class', 'table-item');
               tableData2.appendChild(anchor2);
               tableData2.setAttribute('class', 'table-item');

               tableData3.appendChild(id);
               tableData3.setAttribute('class', 'table-item');
               tableData4.appendChild(firstName);
               tableData4.setAttribute('class', 'table-item');
               tableData5.appendChild(lastName);
               tableData5.setAttribute('class', 'table-item');
               tableData6.appendChild(email);
               tableData6.setAttribute('class', 'table-item');

               row.appendChild(tableData1);
               row.appendChild(tableData2);
               row.appendChild(tableData3);
               row.appendChild(tableData4);
               row.appendChild(tableData5);
               row.appendChild(tableData6);

               //executed last
               table.appendChild(row);

             }
      }//end for

    } //end if
    else if(y== 2017)
    {
             //get items from local storage
      var studentStorage = JSON.parse(localStorage.getItem("student"));
      for( index = 0; index < studentStorage.length; index ++ )
      {
             if(studentStorage[index].year == 2017)
             {
               var id = studentStorage[index].ID;
               var fname = studentStorage[index].fname;
               var lname = studentStorage[index].lname;
               var email = studentStorage[index].email;

                        //build table with data
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
               tableData1.setAttribute('class', 'table-item');
               tableData2.appendChild(anchor2);
               tableData2.setAttribute('class', 'table-item');

               tableData3.appendChild(id);
               tableData3.setAttribute('class', 'table-item');
               tableData4.appendChild(firstName);
               tableData4.setAttribute('class', 'table-item');
               tableData5.appendChild(lastName);
               tableData5.setAttribute('class', 'table-item');
               tableData6.appendChild(email);
               tableData6.setAttribute('class', 'table-item');

               row.appendChild(tableData1);
               row.appendChild(tableData2);
               row.appendChild(tableData3);
               row.appendChild(tableData4);
               row.appendChild(tableData5);
               row.appendChild(tableData6);

               //executed last
               table.appendChild(row);

             }
      }//end for

    }
    else if(y == 2018)
    {      //get items from local storage
      var studentStorage = JSON.parse(localStorage.getItem("student"));
      for( index = 0; index < studentStorage.length; index ++ )
      {
             if(studentStorage[index].year == 2018)
             {
               var id = studentStorage[index].ID;
               var fname = studentStorage[index].fname;
               var lname = studentStorage[index].lname;
               var email = studentStorage[index].email;

                        //build table with data
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
               tableData1.setAttribute('class', 'table-item');
               tableData2.appendChild(anchor2);
               tableData2.setAttribute('class', 'table-item');

               tableData3.appendChild(id);
               tableData3.setAttribute('class', 'table-item');
               tableData4.appendChild(firstName);
               tableData4.setAttribute('class', 'table-item');
               tableData5.appendChild(lastName);
               tableData5.setAttribute('class', 'table-item');
               tableData6.appendChild(email);
               tableData6.setAttribute('class', 'table-item');

               row.appendChild(tableData1);
               row.appendChild(tableData2);
               row.appendChild(tableData3);
               row.appendChild(tableData4);
               row.appendChild(tableData5);
               row.appendChild(tableData6);

               //executed last
               table.appendChild(row);

             }
      }//end for  
    }
   
}