/*validate for console.html*/
const logout = document.getElementById('logout');
logout.addEventListener('click', logOut);

/*get fields to display session information*/
var header = document.getElementById('userHeader');
var role = document.getElementById('userRole');

/*get and display user session information*/
var session = JSON.parse(sessionStorage.getItem("session"));

header.innerHTML = "User: " + session.name;
role.innerHTML = "Role: " + session.role;

// logOut
function logOut()
{
    //clear session storage
    sessionStorage.setItem("session", JSON.stringify({}));
    window.location.href = "index.html";
}