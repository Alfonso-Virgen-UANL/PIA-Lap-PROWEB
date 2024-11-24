<?php
include 'conexion.php'; // Conectar a la base de datos

// Obtener el idGenero desde la URL
$idGenero = $_GET['id'];

// Eliminar el registro de la base de datos
$consulta = "DELETE FROM generos WHERE idGenero = $idGenero";

if ($conexion->query($consulta) === TRUE) {
    //echo "Usuario eliminado exitosamente. <a href='index.php'>Volver</a>";
    header("Location: CRUD Generos.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
