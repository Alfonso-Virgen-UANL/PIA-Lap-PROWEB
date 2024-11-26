<?php
session_start();
include 'VerPriv.php';
verificarPrivilegio("Ver contenido");
?>

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

// Consulta para obtener los álbumes en tendencia
$sqlAlbumes = "
    SELECT 
        a.idAlbumes,
        a.nombre AS albumNombre,
        a.idArtista,
        a.idGenero,
        a.fechaLanzamiento,
        a.foto,
        g.nombre AS generoNombre
    FROM albumes a
    LEFT JOIN generos g ON a.idGenero = g.idGenero
    ORDER BY a.fechaLanzamiento DESC
";
$resultadoAlbumes = $conexion->query($sqlAlbumes);

if (!$resultadoAlbumes) {
    die("Error al consultar álbumes: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Álbumes en Tendencia - Albumify</title>
  <link rel="stylesheet" href="Home.css">
</head>
<body>
  <header>
    <nav>
      <table class="NavTab">
        <tr>
          <td rowspan="3"><img src="Images/AlbumifyLogo.png" class="logo" alt="Logo Albumify"></td>
          <td rowspan="1"><input type="text" placeholder="🔎 ¿Qué quieres buscar?" class="busqueda"></td>
          <td rowspan="3">
            <a href="/Home/catalogo(u).php" class="NavMedio">Catálogo</a>
            <a href="/AcercaDe/AcercaDe(NR).html" class="NavMedio2">| Acerca de</a>
          </td>
          <td rowspan="3" class="fill"></td>
          <td rowspan="3">
            <a href="http://localhost:3000/PaginasUsuario/PerfilUsuario.html" class="NavDer">Mi Perfil</a>
          </td>
        </tr>
        <tr>
          <td><a href="/HomeTendencias/Home.html" class="TextoNav">| Home</a></td>
        </tr>
      </table>
    </nav>
  </header>

  <main>
    <section class="albums-trending">
      <h2>Álbumes en tendencia 🔥</h2>

      <?php if ($resultadoAlbumes->num_rows > 0): ?>
  <?php while ($album = $resultadoAlbumes->fetch_assoc()): ?>
    <div class="album-card">
      <img src="<?= htmlspecialchars($album['foto']) ?>" alt="<?= htmlspecialchars($album['albumNombre']) ?>" class="album-image">
      <div class="album-info">
        <h3><?= htmlspecialchars($album['albumNombre']) ?></h3>
        <p>Artista: <?= htmlspecialchars($album['idArtista']) ?></p>
        <p>Género: <?= htmlspecialchars($album['generoNombre']) ?></p>
        <p>Lanzamiento: <?= htmlspecialchars($album['fechaLanzamiento']) ?></p>
        <p>(376 calificaciones)</p>
        <a href="/Album/PaginaAlbum(U).php?id=<?= urlencode($album['idAlbumes']); ?>" class="btn-details">Más detalles</a>
      </div>
    </div>
  <?php endwhile; ?>
<?php else: ?>
  <p>No se encontraron álbumes en tendencia.</p>
<?php endif; ?>
    </section>
  </main>
</body>
</html>
