<?php
include 'conexion.php'; // Conectar a la base de datos

// Capturar los datos del formulario
$idUsuario = $_POST['idUsuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$foto = $_POST['foto'];
$idRol = $_POST['idRol'];

// Actualizar los datos en la base de datos
$consulta = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', correo='$correo', 
             contraseña='$contraseña', foto='$foto', idRol=$idRol WHERE idUsuario=$idUsuario";

if ($conexion->query($consulta) === TRUE) {
    header("Location: CRUD Usuarios.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
