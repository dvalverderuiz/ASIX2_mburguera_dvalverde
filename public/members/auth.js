function enviarDatos() {
    const nombre = document.getElementById("nombre-register").value;
    const apellido = document.getElementById("apellido-register").value;
    const email = document.getElementById("email-register").value;
    const contraseña = document.getElementById("contraseña-register").value;
    const nombre_usuario = document.getElementById("username-register").value;



    fetch("http://localhost/xampp/public/members/register.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `nombre=${encodeURIComponent(nombre)}&apellido=${encodeURIComponent(apellido)}&email=${encodeURIComponent(email)}&contraseña=${encodeURIComponent(contraseña)}&nombre_usuario=${encodeURIComponent(nombre_usuario)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        alert(data);
    })
    .catch(error => console.error("Error:", error));
}


function login() {
    // Función de LogIn del usuario
    const email_login = document.getElementById("email-login").value;
    const contraseña_login = document.getElementById("contraseña-login").value;
    

    fetch("http://localhost/xampp/public/members/login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `email_login=${encodeURIComponent(email_login)}&contraseña_login=${encodeURIComponent(contraseña_login)}`
    })
    .then(response => response.text())
    .then(data => {
        console.log("Respuesta del servidor:", data);
        alert(data);
    })
    .catch(error => console.error("Error:", error));
}


function receiveData(){
    // Función para recibir los datos para mostrar en el área de usuario.
}





























// Asegurar que el script se ejecute después de que toda la página haya sido cargada
/*window.onload = function() {

    // variables en local
    let activeEmail = localStorage.getItem('activeEmail');
    let activePassword = localStorage.getItem('activePassword');
    let activeUsername = localStorage.getItem('activeUsername');

    // formularios
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    // comprobacion de que los formularios existen despues de haber cargado la página por completo (daba problemas con el DOM)
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();  // Evitar el envío del formulario por defecto

            
            const email = document.getElementById('email-login').value;
            const password = document.getElementById('password-login').value;

            if (!activeEmail || !activePassword) {
                alert("No hay ningún usuario registrado. Por favor, regístrate primero.");
                return;
            }

            if (email === activeEmail && password === activePassword) {
                // Si la validación es correcta, almacenar el nombre de usuario en localStorage
                localStorage.setItem('loggedInUser', activeUsername);
                
                // Redirigir al index.html
                window.location.href = '../index.html';

            } else {
                // Mostrar mensaje de error visible en la interfaz
                alert("Usuario o contraseña incorrectos.");
            }
        });
    }

    // Formulario de registro
    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();  // Evitar el envío del formulario por defecto

            // Obtener los valores ingresados por el usuario
            const email = document.getElementById('email-register').value;
            const password = document.getElementById('password-register').value;
            const username = document.getElementById('username-register').value;

            // Validar que los campos no estén vacíos
            if (!email || !password || !username) {
                alert("Por favor, completa todos los campos.");
                return;
            }

            // Guardar los valores en localStorage
            localStorage.setItem('activeEmail', email);
            localStorage.setItem('activePassword', password);
            localStorage.setItem('activeUsername', username);

            // Actualizar variables globales
            activeEmail = email;
            activePassword = password;
            activeUsername = username;

            // Mostrar un mensaje de éxito o redirigir si es necesario
            alert("Registro exitoso, ya puedes iniciar sesión.");
        });
    }
};
*/
