/*validate for console.html*/

const logout = document.getElementById('logout');
logout.addEventListener('click', redirect);

var h = document.getElementById('userHeader');
var r = document.getElementById('userRole');

//console.log(h);

//var a = JSON.parse(sessionStorage["session"]);
var a = JSON.parse(sessionStorage.getItem("session"));
console.log(a[0].email);


h.innerHTML = "User " + a[0].email;

r.innerHTML = "Role " + a[0].password;




function redirect(event)
{
    console.log(document.getElementById('userHeader').nodeType);
    window.location.href = "index.html";
}