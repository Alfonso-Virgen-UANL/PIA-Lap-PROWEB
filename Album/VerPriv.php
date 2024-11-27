<?php
function verificarPrivilegio($privilegioRequerido) {
    session_start();
    
    if (!isset($_SESSION['idRol'])) {
        // Si no hay sesión activa, redirigir a la página de login
        header('Location: login.php');
        exit();
    }

    $idRol = $_SESSION['idRol'];
    $idUsuario = $_SESSION['idUsuario'];
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    
    // Lista de privilegios por rol (ajustado a lo que mencionaste)
    $privilegiosPorRol = [
        1 => [ // Administrador
            "Ver contenido",
            "Escribir reseña",
            "Modificar reseña",
            "Eliminar reseña",
            "Gestionar álbumes",
            "Gestionar usuarios"
        ],
        2 => [ // Visitante
            "Ver contenido"
        ],
        3 => [ // Miembro
            "Ver contenido",
            "Escribir reseña",
            "Modificar reseña",
            "Eliminar reseña"
        ]
    ];
    
    // Verificar si el rol tiene el privilegio necesario
    if (!in_array($privilegioRequerido, $privilegiosPorRol[$idRol])) {
        // Si no tiene el privilegio, redirigir a la página de acceso denegado
        header('Location: acceso_denegado.php');
        exit();
    }
}
?>