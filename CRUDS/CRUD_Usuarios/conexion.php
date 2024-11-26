<?php
$host = '127.0.0.1'; // o 'localhost'
$usuario = 'root'; // Usuario de Workbench
$contraseña = 'Xibalba@2001'; // Contraseña de Workbench
$baseDatos = 'albumfypia'; // Nombre de tu base de datos en Workbench
$puerto = 3306; // Asegúrate de usar el puerto configurado en Workbench

$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

//echo "Conexión exitosa";
?>