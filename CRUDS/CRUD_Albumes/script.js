document.addEventListener('DOMContentLoaded', function () {
    // Selecciona el botón y el formulario
    const btnMostrarFormulario = document.getElementById('btnAgregar');
    const formAgregar = document.getElementById('formulario');
    const btnCancelar = document.getElementById('btnCancelar');

    if (btnMostrarFormulario && formAgregar && btnCancelar) {
        // Inicialmente oculta el formulario y el botón de cancelar
        formAgregar.style.display = 'none';
        btnCancelar.style.display = 'none';

        // Evento para mostrar el formulario
        btnMostrarFormulario.addEventListener('click', function () {
            formAgregar.style.display = 'block'; // Mostrar el formulario
            btnMostrarFormulario.style.display = 'none'; // Ocultar el botón agregar
            btnCancelar.style.display = 'block'; // Mostrar el botón cancelar
        });

        // Evento para cancelar (opcionalmente solo oculta el formulario)
        btnCancelar.addEventListener('click', function () {
            formAgregar.style.display = 'none'; // Ocultar el formulario
            btnMostrarFormulario.style.display = 'block'; // Mostrar el botón agregar
            btnCancelar.style.display = 'none'; // Ocultar el botón cancelar
        });
    } else {
        console.error('Elementos del DOM no encontrados');
    }
});
