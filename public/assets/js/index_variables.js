// Recuperar el nombre de usuario almacenado en localStorage
const loggedInUser = localStorage.getItem('loggedInUser');

// Comprobar si el usuario está logueado
if (loggedInUser) {
    // Si hay un usuario logueado, mostrar su nombre en el campo con id "username-display"
    document.getElementById('username-display').textContent = loggedInUser;
} else {
    // Si no hay usuario logueado, redirigir de vuelta al login
    // window.location.href = '../public/members/login.html';
}



function LogOut() {
    localStorage.clear();
    location.reload();
}
