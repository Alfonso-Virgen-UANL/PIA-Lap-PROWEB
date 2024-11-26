<?php
include 'conexion.php'; // Conectar a la base de datos

// Capturar los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$foto = $_POST['foto'];
$idRol = $_POST['idRol'];

// Insertar datos en la tabla Usuarios
$consulta = "INSERT INTO usuario (nombre, apellido, correo, contraseña, foto, idRol) 
             VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$foto', $idRol)";

if ($conexion->query($consulta) === TRUE) {
   // echo "Usuario agregado exitosamente. <a href='CRUD Usuarios.php'> Volver</a>";
   header("Location: CRUD_Usuarios.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
