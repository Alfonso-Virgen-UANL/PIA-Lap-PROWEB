<?php
include 'VerPriv.php';
verificarPrivilegio("Gestionar álbumes");
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
$sqlAlbum = "SELECT * FROM albumes WHERE idAlbumes = $idAlbumes";
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
                        <a href="/Home/catalogo.html" class="NavMedio"> Catálogo</a>   
                        <a href="/AcercaDe/AcercaDe(NR).html" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="/PaginasAdministrativas/PerfilAdmin.html" class="NavDer">Mi perfil</a> 
                    </td>
                </tr>
                <tr>
                  <td><a href="/HomeTendencias/Home.html" class="TextoNav">| Home</a></td>
                </tr>
              </table>
        </nav>
    </header>
    <main>
        <div class="row">
            <div class="col-3">
                <h1><strong>Utopia</strong></h1>
                <img width="250" height="250" src="/ContenidoAlbumify/Utopia.jpg">
            </div>
            <div class="col-3">
                <div class="marcorojo">
                    <a href="https://www.youtube.com/watch?v=qS6ozdhzSVQ&list=PLxA687tYuMWgx4pL55X-MxOzo0rW52UOp" target="_blank">Escuchar en Youtube 
                        <img id="play" width="25" height="25" src="/ContenidoAlbumify/Albumify-play.png"/></a>
                </div>
                <div>   
                    <p><strong>Artista/grupo: </strong>Travis Scott</p>
                    <p><strong>Genero: </strong>Pop, Hip hop</p>
                    <p><strong>Lanzamiento </strong>28 de julio de 2023</p>
                    <p><strong>Duración: </strong>73:27</p>
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
            <p><strong>Utopia: </strong>UTOPIA es el cuarto álbum de estudio del DJ estadounidense Travis Scott. 
                Fue lanzado a través de Cactus Jack Records y Epic Records el 28 de julio de 2023. 
                El álbum presenta apariciones especiales de Teezo Touchdown, Drake, Playboi Carti, 
                Beyoncé, Rob49, 21 Savage, The Weeknd, Swae Lee, entre otros.</p>
        </div>
        <div class="row">
            <iframe src="/Reseñas/Reseñas(UyA).html" height="300em" width="800em"></iframe>
        </div>
    </main>
</body>
</html>
