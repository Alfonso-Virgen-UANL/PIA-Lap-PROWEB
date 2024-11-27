<?php
include 'VerPriv.php';
verificarPrivilegio("Escribir reseña");

// Inicia la sesión


// Verifica si el usuario está autenticado
if (!isset($_SESSION['idUsuario'])) {
    header('Location: login.php?error=Debes iniciar sesión para acceder al perfil.');
    exit;
}

// Conexión a la base de datos
$host = '127.0.0.1';
$usuario = 'root';
$contraseña = 'Xibalba@2001'; // Cambia según tu configuración
$baseDatos = 'albumfypia';
$conexion = new mysqli($host, $usuario, $contraseña, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener información del usuario desde la base de datos
$idUsuario = $_SESSION['idUsuario'];
$sqlUsuario = "SELECT nombre, apellido, correo, foto FROM usuario WHERE idUsuario = ?";
$stmtUsuario = $conexion->prepare($sqlUsuario);
$stmtUsuario->bind_param("i", $idUsuario);
$stmtUsuario->execute();
$resultadoUsuario = $stmtUsuario->get_result();

if ($resultadoUsuario->num_rows === 0) {
    die("Error: Usuario no encontrado.");
}

$usuario = $resultadoUsuario->fetch_assoc();
$stmtUsuario->close();

// Obtener reseñas del usuario
$sqlReseñas = "
    SELECT r.fecha, r.Calificacion, r.comentario, a.nombre AS nombreAlbum 
    FROM reseña r
    JOIN albumes a ON r.idAlbumes = a.idAlbumes
    WHERE r.idUsuario = ?
    ORDER BY r.fecha DESC";
$stmtReseñas = $conexion->prepare($sqlReseñas);
$stmtReseñas->bind_param("i", $idUsuario);
$stmtReseñas->execute();
$resultadoReseñas = $stmtReseñas->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Perfil de Usuario</title>
    <link rel="stylesheet" href="styles.css">
    <script type="text/javascript" src="bootstrap.bundle.min.js"></script>
</head>
<body>
    <header>
        <nav>
            <table class="NavTab">
                <tr>
                    <td rowspan="3"><img src="/ContenidoAlbumify/AlbumifyLogo.png" class="logo"></td>
                    <td rowspan="1"><input type="text" placeholder="🔎¿Qué quieres buscar?" class="busqueda"></td>
                    <td rowspan="3">  
                        <a href="/Home/catalogo(U).php" class="NavMedio"> Catálogo</a>   
                        <a href="/AcercaDe/AcercaDe(UyA).html" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="PerfilUsuario.php" class="NavDer">Mi perfil</a> 
                    </td>
                </tr>
                <tr>
                    <td><a href="/HomeTendencias/Home(U).php" class="TextoNav">| Home</a></td>
                </tr>
            </table>
        </nav>
    </header>

    <div class="layout">
        <aside class="side-nav">
            <ul>
                <li><a href="PerfilUsuario.php">Perfil</a></li>
                <li><a href="ConfPerfilUsuario.php">Configuración de la cuenta</a></li>
                <li><a href="SolicitarAlbumUsuario.php">Solicitar un álbum</a></li>
            </ul>
        </aside>

        <main class="content">
            <h2>Perfil</h2><br>
            <div id="perfil">
                <img src="<?= htmlspecialchars($usuario['foto']) ?>" alt="Foto de perfil" width="150" height="150" style="border-radius: 50%;"><br>
                <p><strong>Usuario:</strong> <?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']) ?></p><br>
                <p><strong>Correo electrónico:</strong> <?= htmlspecialchars($usuario['correo']) ?></p><br>
            </div>

            <div>
                <h3>Reseñas por el usuario</h3>
                <?php if ($resultadoReseñas->num_rows > 0): ?>
                    <div class="reseñas">
                        <?php while ($reseña = $resultadoReseñas->fetch_assoc()): ?>
                            <div class="reseña">
                                <p><strong>Álbum:</strong> <?= htmlspecialchars($reseña['nombreAlbum']) ?></p>
                                <p><strong>Fecha:</strong> <?= htmlspecialchars($reseña['fecha']) ?></p>
                                <p><strong>Calificación:</strong> <?= htmlspecialchars($reseña['Calificacion']) ?>/10</p>
                                <p><strong>Comentario:</strong> <?= htmlspecialchars($reseña['comentario']) ?></p>
                                <hr>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p>No has escrito ninguna reseña aún.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</body>
</html>
