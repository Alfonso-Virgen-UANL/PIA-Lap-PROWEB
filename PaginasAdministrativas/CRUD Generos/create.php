<?php
include 'conexion.php'; // Conectar a la base de datos

// Capturar los datos enviados desde el formulario
$nombre = $_POST['nombre'];

// Insertar datos en la tabla Generos
$consulta = "INSERT INTO generos (nombre) 
             VALUES ('$nombre')";

if ($conexion->query($consulta) === TRUE) {
   // echo "Usuario agregado exitosamente. <a href='CRUD Usuarios.php'> Volver</a>";
    include 'CRUD Generos.php';
} else {
    echo "Error: " . $conexion->error;
}
?>
