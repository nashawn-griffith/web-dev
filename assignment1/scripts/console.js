/*validate for console.html*/

const logout = document.getElementById('logout');
logout.addEventListener('click', logOut);

var header = document.getElementById('userHeader');
var role = document.getElementById('userRole');

/*get and display user session information*/
var session = JSON.parse(sessionStorage.getItem("session"));

header.innerHTML = "User: " + session.name;
role.innerHTML = "Role: " + session.role;

// logOut
function logOut()
{
     sessionStorage.setItem("session", JSON.stringify({}));
    window.location.href = "index.html";
}