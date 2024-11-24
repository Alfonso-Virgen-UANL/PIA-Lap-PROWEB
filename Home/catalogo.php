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

// Obtener géneros disponibles
$sqlGeneros = "SELECT * FROM generos";
$resultadoGeneros = $conexion->query($sqlGeneros);

// Obtener filtros seleccionados
$filtroGenero = isset($_POST['genero']) ? $_POST['genero'] : [];
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

  <main>
    <!-- Encabezado del catálogo -->
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
                  <input type="checkbox" name="genero[]" value="<?= $genero['idGenero']; ?>" <?= in_array($genero['idGenero'], $filtroGenero) ? 'checked' : ''; ?>>
                  <?= htmlspecialchars($genero['nombre']); ?>
                </label>
              <?php endwhile; ?>
            </div>
            <button type="submit" id="apply-filters">Aplicar</button>
          </div>
        </div>
      </section>
    </form>

    <?php
    // Resetear el cursor de resultado de géneros
    $resultadoGeneros->data_seek(0);

    // Mostrar los géneros y sus álbumes
    if ($resultadoGeneros->num_rows > 0):
      while ($genero = $resultadoGeneros->fetch_assoc()):
        $idGenero = $genero['idGenero'];
        $nombreGenero = htmlspecialchars($genero['nombre']);

        // Filtrar álbumes según los géneros seleccionados
        if (!empty($filtroGenero) && !in_array($idGenero, $filtroGenero)) {
          continue; // Omitir géneros que no están seleccionados
        }

        // Consulta para obtener los álbumes del género actual
        $consultaAlbumes = $conexion->prepare("SELECT * FROM albumes WHERE idGenero = ?");
        $consultaAlbumes->bind_param("i", $idGenero);
        $consultaAlbumes->execute();
        $resultadoAlbumes = $consultaAlbumes->get_result();
    ?>

    <section class="carousel-section">
      <h3><?= $nombreGenero; ?></h3>
      <div class="carousel-container">
        <?php if ($resultadoAlbumes->num_rows > 0): ?>
          <?php while ($album = $resultadoAlbumes->fetch_assoc()): ?>
            <div class="carousel-item">
              <img src="<?= htmlspecialchars($album['foto']); ?>" alt="<?= htmlspecialchars($album['nombre']); ?>">
              <p><?= htmlspecialchars($album['nombre']); ?></p>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p>No se encontraron álbumes para este género.</p>
        <?php endif; ?>
      </div>
      <hr>
    </section>

    <?php
        $consultaAlbumes->close(); // Cerrar consulta preparada
      endwhile;
    else:
    ?>
    <p>No se encontraron géneros disponibles.</p>
    <?php endif; ?>
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
