<?php
include 'conexion.php'; // Conectar a la base de datos

// Capturar los datos del formulario
$idGenero = $_POST['idGenero'];
$nombre = $_POST['nombre'];

// Actualizar los datos en la base de datos
$consulta = "UPDATE generos SET nombre='$nombre' WHERE idGenero=$idGenero";

if ($conexion->query($consulta) === TRUE) {
    header("Location: CRUD Generos.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
