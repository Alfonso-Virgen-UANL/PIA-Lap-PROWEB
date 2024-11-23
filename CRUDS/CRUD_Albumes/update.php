<?php
include 'conexion.php'; // Conectar a la base de datos

// Capturar los datos del formulario
$idAlbumes=$_POST['idAlbumes'];
$nombre = $_POST['nombre'];
$duracion = $_POST['duracion'];
$fechaLanzamiento = $_POST['fechaLanzamiento'];
$foto = $_POST['foto'];
$idArtista = $_POST['idArtista'];
$url = $_POST['url'];
$idGenero = $_POST['idGenero'];
$estado = $_POST['estado'];

// Actualizar los datos en la base de datos
$consulta = "UPDATE albumes SET nombre='$nombre', duracion='$duracion', fechaLanzamiento='$fechaLanzamiento', 
             foto='$foto', idArtista='$idArtista', url='$url', idGenero='$idGenero', estado='$estado' WHERE idAlbumes=$idAlbumes";

if ($conexion->query($consulta) === TRUE) {
    header("Location: CRUD Albumes.php");
} else {
    echo "Error: " . $conexion->error;
}
?>
