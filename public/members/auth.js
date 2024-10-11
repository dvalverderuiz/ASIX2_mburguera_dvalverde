// Variables con el usuario y contraseña predeterminados (simulación)
const validUsername = 'user@user.com';
const validPassword = 'pass';

// Seleccionar el formulario y añadir el evento de submit
document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();  // Evitar el envío del formulario por defecto

    // Obtener los valores ingresados por el usuario
    const username = document.getElementById('email-login').value;
    const password = document.getElementById('password-login').value;

    // Validar el nombre de usuario y la contraseña
    if (username === validUsername && password === validPassword) {
        // Si la validación es correcta, almacenar el nombre de usuario en localStorage
        localStorage.setItem('loggedInUser', username);
        
        // Redirigir al index.html
        window.location.href = '../index.html';

    } else {
        // Mostrar mensaje de error
        console.log('Invalid username or password');


    }
});
