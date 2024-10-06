function validarFormulario() {
    const nombre = document.getElementById("nombre").value;
    const email = document.getElementById("email").value;
    const telefono = document.getElementById("telefono").value;

    // Validar nombre (solo letras y espacios)
    const nombreRegex = /^[A-Za-z\s]+$/;
    if (!nombreRegex.test(nombre)) {
        alert("El nombre solo debe contener letras y espacios.");
        return false;
    }

    // Validar email (estructura correcta)
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
        alert("Ingresa un correo electrónico válido.");
        return false;
    }

    // Validar teléfono (solo números, 9-10 dígitos)
    const telefonoRegex = /^\d{8,10}$/;
    if (!telefonoRegex.test(telefono)) {
        alert("El número de teléfono debe contener entre 9 y 10 dígitos.");
        return false;
    }

    return true;  // Si todo es válido, permitir el envío del formulario
}

document.getElementById('edit-form').addEventListener('submit', function (event) {
    // Validación de campos vacíos
    const nombre = document.getElementById('nombre').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefono = document.getElementById('telefono').value.trim();
    const direccion = document.getElementById('direccion').value.trim();

    if (!nombre || !email || !telefono || !direccion) {
        alert('Todos los campos son requeridos.');
        event.preventDefault();
        return;
    }

    // Validación de nombre solo con letras
    const nombreRegex = /^[a-zA-Z\s]+$/;
    if (!nombreRegex.test(nombre)) {
        alert('El campo de nombre solo debe contener letras.');
        event.preventDefault();
        return;
    }

    // Validación de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('El correo electrónico no tiene un formato válido.');
        event.preventDefault();
        return;
    }

    // Validación de teléfono (formato numérico)
    const telefonoRegex = /^\d{8,10}$/;
    if (!telefonoRegex.test(telefono)) {
        alert('El número de teléfono debe contener 10 dígitos.');
        event.preventDefault();
        return;
    }
});


document.getElementById('resgistrarse-form').addEventListener('submit', function (event) {
    // Validación de campos vacíos
    const nombre = document.getElementById('usuario').value.trim();
    const email = document.getElementById('email').value.trim();
    const contraseña = document.getElementById('contraseña').value.trim();

    if (!nombre || !email || !contraseña) {
        alert('Todos los campos son requeridos.');
        event.preventDefault();
        return;
    }

    // Validación de nombre solo con letras
    const nombreRegex = /^[a-zA-Z\s]+$/;
    if (!nombreRegex.test(nombre)) {
        alert('El campo de nombre solo debe contener letras.');
        event.preventDefault();
        return;
    }

    // Validación de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('El correo electrónico no tiene un formato válido.');
        event.preventDefault();
        return;
    }

    const passwordRegex = /^.{6,}$/;  // Expresión regular para al menos 6 caracteres
    if (!passwordRegex.test(contraseña)) {
        alert('La contraseña debe contener al menos 6 caracteres.');
        event.preventDefault();
        return;
    }
});


document.getElementById('sesion-form').addEventListener('submit', function (event) {
    // Validación de campos vacíos
    const nombre = document.getElementById('usuario').value.trim();
    const contraseña = document.getElementById('contraseña').value.trim();

    if (!nombre || !contraseña) {
        alert('Todos los campos son requeridos.');
        event.preventDefault();
        return;
    }

    // Validación de nombre solo con letras
    const nombreRegex = /^[a-zA-Z\s]+$/;
    if (!nombreRegex.test(nombre)) {
        alert('El campo de nombre solo debe contener letras.');
        event.preventDefault();
        return;
    }

    const passwordRegex = /^.{6,}$/;  // Expresión regular para al menos 6 caracteres
    if (!passwordRegex.test(contraseña)) {
        alert('La contraseña debe contener al menos 6 caracteres.');
        event.preventDefault();
        return;
    }
});