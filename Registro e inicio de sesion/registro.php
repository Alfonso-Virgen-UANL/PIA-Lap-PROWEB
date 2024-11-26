<?php
// Conexión a la base de datos
$host = '127.0.0.1';
$usuario = 'root';
$contraseña = 'Xibalba@2001'; // Cambia según tu configuración
$baseDatos = 'albumfypia';
$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar que se haya enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['email']);
    $contraseña = trim($_POST['password']);
    $confirmarContraseña = trim($_POST['confirm-password']);
    
    // Validación de contraseñas
    if ($contraseña !== $confirmarContraseña) {
        die("Las contraseñas no coinciden.");
    }

    // Foto predeterminada
    $foto = "https://static.vecteezy.com/system/resources/previews/009/292/244/non_2x/default-avatar-icon-of-social-media-user-vector.jpg";

    // Rol predeterminado
    $idRol = 3;


    // Insertar los datos en la base de datos
    $stmt = $conexion->prepare("INSERT INTO usuario (nombre, apellido, correo, contraseña, foto, idRol) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nombre, $apellido, $correo, $contraseña, $foto, $idRol);

    if ($stmt->execute()) {
        echo "Registro exitoso. <a href='login.html'>Inicia sesión</a>";
    } else {
        echo "Error al registrar usuario: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
