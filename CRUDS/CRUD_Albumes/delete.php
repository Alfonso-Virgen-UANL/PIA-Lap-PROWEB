<?php
include 'conexion.php'; // Conectar a la base de datos

// Obtener el idUsuario desde la URL
$idAlbumes = $_GET['id'];

// Eliminar el registro de la base de datos
$consulta = "DELETE FROM albumes WHERE idAlbumes = $idAlbumes";

if ($conexion->query($consulta) === TRUE) {
    //echo "Usuario eliminado exitosamente. <a href='index.php'>Volver</a>";
    header("Location: CRUD_Albumes.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
