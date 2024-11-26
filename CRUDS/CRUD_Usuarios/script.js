// Selecciona el botón y el formulario
const btnMostrarFormulario = document.getElementById('btnAgregar');
const formAgregar = document.getElementById('formulario');
const btnCancelar = document.getElementById('btnCancelar');

window.addEventListener('load', function () {
    formAgregar.style.display = 'none';
    btnCancelar.style.display= 'none';
});

// Agrega el evento para mostrar/ocultar el formulario
btnMostrarFormulario.addEventListener('click', function () {
    if (formAgregar.style.display === 'none' || formAgregar.style.display === '') {
        formAgregar.style.display = 'block'; // Mostrar el formulario
        btnMostrarFormulario.style.display = 'none'; // Ocultar el botón
        btnCancelar.style.display= 'block';
    } else {
        formAgregar.style.display = 'none'; // Ocultar el formulario
        
    }
});
btnCancelar.addEventListener('click', function(){ 
    location.reload();
})