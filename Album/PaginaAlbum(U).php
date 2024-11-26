<?php
include 'VerPriv.php';
verificarPrivilegio("Escribir reseña");


// Conexión a la base de datos
$host = '127.0.0.1';
$usuario = 'root';
$contraseña = 'Xibalba@2001'; // Cambia según tu configuración
$baseDatos = 'albumfypia';
$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['idUsuario'])) {
        die("Error: Debes iniciar sesión para publicar una reseña.");
    }

    $idUsuario = $_SESSION['idUsuario']; // Obtener el idUsuario desde la sesión
    $idAlbumes = intval($_POST['idAlbumes']); // Asegúrate de enviar este dato en el formulario
    $comentario = $conexion->real_escape_string(trim($_POST['reviewText']));
    $calificacion = intval($_POST['rating']);
    $fecha = date('Y-m-d'); // Fecha actual

    $stmt = $conexion->prepare("INSERT INTO reseña (fecha, Calificacion, comentario, idUsuario, idAlbumes) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisii", $fecha, $calificacion, $comentario, $idUsuario, $idAlbumes);

    if ($stmt->execute()) {
        echo "<script>alert('Reseña creada exitosamente.');</script>";
    } else {
        echo "<script>alert('Error al crear la reseña: {$stmt->error}');</script>";
    }

    $stmt->close();
}
// Obtener el ID del álbum desde la URL
$idAlbumes = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obtener los datos del álbum
$sqlAlbum = "SELECT * FROM albumes WHERE idAlbumes = $idAlbumes";
$resultadoAlbum = $conexion->query($sqlAlbum);

// Verificar si el álbum existe
if ($resultadoAlbum->num_rows > 0) {
    $album = $resultadoAlbum->fetch_assoc();
} else {
    die("Álbum no encontrado.");
}

// Insertar reseña si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuario = 1; // Reemplaza con el ID del usuario actual desde la sesión
    $comentario = $conexion->real_escape_string(trim($_POST['reviewText']));
    $calificacion = intval($_POST['rating']);
    $fecha = date('Y-m-d'); // Fecha actual

    $stmt = $conexion->prepare("INSERT INTO reseña (fecha, calificacion, comentario, idUsuario, idAlbumes) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisii", $fecha, $calificacion, $comentario, $idUsuario, $idAlbumes);

    if ($stmt->execute()) {
        echo "<script>alert('Reseña creada exitosamente.');</script>";
    } else {
        echo "<script>alert('Error al crear la reseña: {$stmt->error}');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumify - Acerca de</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <header>
        <nav>
        <table class="NavTab">
        <tr>
          <td rowspan="3"><img src="/ContenidoAlbumify/AlbumifyLogo.png" class="logo"></td>
          <td rowspan="1"><input type="text" placeholder="🔎¿Qué quieres buscar?" class="busqueda"></td>
          <td rowspan="3">  
            <a href="/Home/catalogo.php" class="NavMedio"> Catálogo</a>   
            <a href="/AcercaDe/AcercaDe(NR).html" class="NavMedio2">| Acerca de</a>
          </td>
          <td rowspan="3" class="fill"></td>
          <td rowspan="3">
          <a href="http://localhost:3000/PaginasUsuario/PerfilUsuario.html" class="NavDer">Mi Perfil</a>
          </td>
        </tr>
        <tr>
          <td><a href="/HomeTendencias/Home.php" class="TextoNav">| Home</a></td>
        </tr>
      </table>
        </nav>
    </header>
    <main>
        <!-- Información del álbum -->
        <div class="row">
            <div class="col-3">
                <h1><strong><?= htmlspecialchars($album['nombre']) ?></strong></h1>
                <img width="250" height="250" src="<?= htmlspecialchars($album['foto']) ?>">
            </div>
            <div class="col-3">
                <div class="marcorojo">
                    <a href="<?= htmlspecialchars($album['url']) ?>" target="_blank">Escuchar en Youtube 
                        <img id="play" width="25" height="25" src="/ContenidoAlbumify/Albumify-play.png"/></a>
                </div>
                <div>
                    <p><strong>Artista/grupo: </strong><?= htmlspecialchars($album['nombre']) ?></p>
                    <p><strong>Genero: </strong><?= htmlspecialchars($album['idGenero']) ?></p>
                    <p><strong>Lanzamiento: </strong><?= htmlspecialchars($album['fechaLanzamiento']) ?></p>
                    <p><strong>(24 Calificaciones)</strong></p>
                </div>
            </div>
            <div class="col-3"></div>
            <div id="califcont" class="col-3">
                <div>
                    <img height="250" width="250" src="/ContenidoAlbumify/AlbumifyMarco.png">
                    <div id="calif">
                        <p>7</p>
                    </div>
                </div>
                <div class="CreaRes">
                    <a href="#" id="crearReseñaBtn">Crear Reseña</a>
                </div>
            </div>
        </div>

        <!-- Descripción del álbum -->
        <div class="row">
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus est suscipit quam numquam, sint placeat veniam assumenda! Neque hic quam, tenetur nobis deserunt at facilis perferendis numquam quia praesentium! Nam.</p>
        </div>

        <!-- Sección de reseñas -->
        <div class="row">
            <iframe src="/Reseñas/Reseñas(NR).php?id=<?= $idAlbumes ?>" height="300em" width="800em"></iframe>
        </div>
    </main>

    <!-- Popup para reseñas -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-content">
            <button class="close-btn" id="closePopup">X</button>
            <h3>Crear Reseña</h3>
            <form method="POST">
                <label for="reviewText">Reseña (300 caracteres máx):</label>
                <textarea id="reviewText" name="reviewText" maxlength="300" required></textarea>
                <label for="rating">Calificación (0-10):</label>
                <input type="number" id="rating" name="rating" min="0" max="10" required>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <script src="CreaReseña.js"></script>
</body>
</html>
