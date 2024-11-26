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

// Obtener el ID del álbum desde la URL
$idAlbumes = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obtener los datos del álbum
$sqlAlbum = "SELECT * FROM albumes WHERE id = $idAlbumes";
$resultadoAlbum = $conexion->query($sqlAlbum);

// Verificar si el álbum existe
if ($resultadoAlbum->num_rows > 0) {
    $album = $resultadoAlbum->fetch_assoc();
} else {
    die("Álbum no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($album['nombre']) ?> - Albumify</title>
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
                        <a href="/AcercaDe/AcercaDe(NR).php" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="/Registro e inicio de sesion/Login.php" class="NavDer">Login</a> 
                        <a href="/Registro e inicio de sesion/Registro.php" class="NavDer2">| Registro</a>
                    </td>
                </tr>
                <tr>
                  <td><a href="/HomeTendencias/Home.php" class="TextoNav">| Home</a></td>
                </tr>
              </table>
        </nav>
    </header>
    <main>
        <div class="row">
            <div class="col-3">
                <h1><strong><?= htmlspecialchars($album['nombre']) ?></strong></h1>
                <img width="250" height="250" src="foto/<?= htmlspecialchars($album['foto']) ?>" alt="<?= htmlspecialchars($album['nombre']) ?>">
            </div>
            <div class="col-3">
                <div class="marcorojo">
                    <a href="<?= htmlspecialchars($album['URL']) ?>" target="_blank">Escuchar en Youtube 
                        <img id="play" width="25" height="25" src="/ContenidoAlbumify/Albumify-play.png"/></a>
                </div>
                <div>   
                    <p><strong>Artista/grupo: </strong><?= htmlspecialchars($album['nombre']) ?></p>
                    <p><strong>Genero: </strong><?= htmlspecialchars($album['genero']) ?></p>
                    <p><strong>Lanzamiento: </strong><?= htmlspecialchars($album['fechaLanzamiento']) ?></p>
                    <p><strong>Duración: </strong><?= htmlspecialchars($album['duracion']) ?></p>
                    <p><strong>(24 Calificaciones)</strong></p>
                </div>
            </div>
            <div class="col-3">
            </div>
            <div id="califcont" class="col-3">
                <img height="250" width="250" src="/ContenidoAlbumify/AlbumifyMarco.png">
                <div id="calif">
                    <p>7</p>
                </div>
            </div>
        </div>
        <div class="row">
            <p><strong><?= htmlspecialchars($album['nombre']) ?>: </strong><?= htmlspecialchars($album['descripcion']) ?></p>
        </div>
        <div class="row">
            <iframe src="/Reseñas/Reseñas(UyA).html" height="300em" width="800em"></iframe>
        </div>
    </main>
</body>
</html>
