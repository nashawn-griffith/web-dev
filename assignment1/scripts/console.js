/*validate for console.html*/

const logout = document.getElementById('logout');
logout.addEventListener('click', redirect);

function redirect(event)
{
    window.location.href = "index.html";
}