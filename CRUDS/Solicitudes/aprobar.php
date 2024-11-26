<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

// Verificar si el ID del álbum ha sido pasado a través de la URL
if (isset($_GET['id'])) {
    $idAlbum = $_GET['id'];

    // Validar que el ID sea un número entero
    if (is_numeric($idAlbum)) {
        // Realizar la actualización del estado a 1 (Aprobado)
        $sql = "UPDATE albumes SET estado = 1 WHERE idAlbumes = $idAlbum";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            // Si la actualización fue exitosa, redirigir a la página donde se listan los álbumes
            header("Location: Solicitudes.php"); // Cambia "Solicitudes.php" al nombre de la página que muestra la lista de álbumes
            exit();
        } else {
            echo "Error al aprobar el álbum: " . $conexion->error;
        }
    } else {
        echo "ID no válido.";
    }
} else {
    echo "ID no proporcionado.";
}

// Cerrar la conexión
$conexion->close();
?>
