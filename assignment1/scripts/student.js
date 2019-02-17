/*validation for student.html*/

const logout = document.getElementById('logout');

logout.addEventListener('click', redirect);

function redirect()
{
   window.location.href = 'index.html';
}