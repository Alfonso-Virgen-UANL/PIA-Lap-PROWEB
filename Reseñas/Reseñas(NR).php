<?php
// Conexión a la base de datos
$host = '127.0.0.1';
$usuario = 'root';
$contraseña = 'Xibalba@2001';
$baseDatos = 'albumfypia';
$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener ID del álbum
$idAlbumes = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obtener reseñas
$sqlReseñas = "
    SELECT r.fecha, r.Calificacion, r.comentario, u.nombre AS usuarioNombre, u.apellido AS usuarioApellido, u.foto 
    FROM reseña r
    JOIN usuario u ON r.idUsuario = u.idUsuario
    WHERE r.idAlbumes = ?
    ORDER BY r.fecha DESC";
$stmt = $conexion->prepare($sqlReseñas);
$stmt->bind_param("i", $idAlbumes);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Reseñas de Usuario</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <h2>Reseñas</h2>
    <?php while ($reseña = $resultado->fetch_assoc()): ?>
        <div class="album-card">
            <img src="<?= htmlspecialchars($reseña['foto']) ?>" alt="Foto de <?= htmlspecialchars($reseña['usuarioNombre']) ?>">
            <div class="album-info">
            <h3><?= htmlspecialchars($reseña['usuarioNombre'] . ' ' . $reseña['usuarioApellido']) ?></h3>
            <p>Fecha: <?= htmlspecialchars($reseña['fecha']) ?></p>
            <p>Calificación: <?= htmlspecialchars($reseña['Calificacion']) ?>/10</p>
            <p>Comentario: <?= htmlspecialchars($reseña['comentario']) ?></p>
            </div>
        </div>
        <hr>
    <?php endwhile; ?>
</body>
</html>
