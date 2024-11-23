<?php
include 'conexion.php'; // Conectar a la base de datos

// Capturar los datos enviados desde el formulario
$nombre = $_POST['nombre'];
$duracion = $_POST['duracion'];
$fechaLanzamiento = $_POST['fechaLanzamiento'];
$foto = $_POST['foto'];
$idArtista = $_POST['idArtista'];
$url = $_POST['url'];
$idGenero = $_POST['idGenero'];
$estado = $_POST['estado'];

// Insertar datos en la tabla Albumes
$consulta = "INSERT INTO albumes (nombre, duracion, fechaLanzamiento, foto, idArtista, url,idGenero, estado) 
             VALUES ('$nombre', '$duracion', '$fechaLanzamiento', '$foto', '$idArtista', '$url','$idGenero', '$estado' )";

if ($conexion->query($consulta) === TRUE) {
    echo "Usuario agregado exitosamente. <a href='CRUD Usuarios.php'> Volver</a>";
   header("Location: CRUD Albumes.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
