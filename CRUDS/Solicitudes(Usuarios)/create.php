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

$estado = isset($_POST['estado']) ? $_POST['estado'] : 0; //Hace que estado sea 0
// Insertar datos en la tabla Albumes
$consulta = "INSERT INTO albumes (nombre, duracion, fechaLanzamiento, foto, idArtista, url,idGenero, estado) 
             VALUES ('$nombre', '$duracion', '$fechaLanzamiento', '$foto', '$idArtista', '$url','$idGenero', '$estado' )";

if ($conexion->query($consulta) === TRUE) {
   // echo "Usuario agregado exitosamente. <a href='CRUD Usuarios.php'> Volver</a>";
   header("Location: Solicitudes.php");
} else {
    echo "Error: " . $conexion->error;
}
?>