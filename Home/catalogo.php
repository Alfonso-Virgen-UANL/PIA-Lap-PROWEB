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

// Géneros disponibles
$sqlGeneros = "SELECT * FROM generos";
$resultadoGeneros = $conexion->query($sqlGeneros);

// Filtros seleccionados
$filtroGenero = isset($_POST['genero']) ? $_POST['genero'] : [];

// Consulta para álbumes
$sqlAlbumes = "SELECT * FROM albumes";
if (!empty($filtroGenero)) {
    $generosFiltrados = implode(',', array_map('intval', $filtroGenero));
    $sqlAlbumes .= " WHERE idGenero IN ($generosFiltrados)";
}
$resultadoAlbumes = $conexion->query($sqlAlbumes);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo - Albumify</title>
  <link rel="stylesheet" href="catalogo.css">
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

  <!-- Catálogo -->
  <main>
    <section class="catalogo-header">
      <h2>Catálogo</h2>
      <button id="filter-button">Filtrar</button>
    </section>

    <!-- Ventana modal para filtros -->
    <form method="POST" action="catalogo.php">
      <section id="filter-modal">
        <div class="modal-overlay">
          <div class="modal-content">
            <h3>Selecciona los géneros que quieres que aparezcan</h3>
            <div class="filter-grid">
              <?php while ($genero = $resultadoGeneros->fetch_assoc()): ?>
                <label>
                  <input type="checkbox" name="genero[]" value="<?= $genero['idGenero']; ?>">
                  <?= htmlspecialchars($genero['nombre']); ?>
                </label>
              <?php endwhile; ?>
            </div>
            <button type="submit" id="apply-filters">Aplicar</button>
          </div>
        </div>
      </section>
    </form>

    <!-- Mostrar álbumes -->
    <section class="carousel">
      <h3>Álbumes disponibles</h3>
      <div class="carousel-container">
        <?php if ($resultadoAlbumes->num_rows > 0): ?>
          <?php while ($album = $resultadoAlbumes->fetch_assoc()): ?>
            <div class="carousel-item">
             <img src="foto/<?= htmlspecialchars($album['foto']); ?>" alt="<?= htmlspecialchars($album['nombre']); ?>">
              <p><?= htmlspecialchars($album['nombre']); ?></p>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>No se encontraron álbumes para los géneros seleccionados.</p>
        <?php endif; ?>
      </div>
    </section>
  </main>

  <script>
    const filterButton = document.getElementById('filter-button');
    const filterModal = document.getElementById('filter-modal');

    // Mostrar modal
    filterButton.addEventListener('click', () => {
      filterModal.classList.add('active');
    });

    // Ocultar modal
    filterModal.addEventListener('click', (e) => {
      if (e.target === filterModal) {
        filterModal.classList.remove('active');
      }
    });
  </script>
</body>
</html>

