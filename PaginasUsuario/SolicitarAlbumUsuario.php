<?php
include 'VerPriv.php';
verificarPrivilegio("Escribir reseña");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Albumfy - Solicitar un álbum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
                        <a href="/AcercaDe/AcercaDe(UyA).html" class="NavMedio2">| Acerca de</a>
                    </td>
                    <td rowspan="3" class="fill"></td>
                    <td rowspan="3">
                        <a href="PerfilUsuario.html" class="NavDer">Mi perfil</a> 
                    </td>
                </tr>
                <tr>
                <td><a href="/HomeTendencias/Home.html" class="TextoNav">| Home</a></td>
                </tr>
              </table>
        </nav>
    </header>
    <div class="d-flex">
        <aside class="side-nav bg-dark text-light p-4" style="min-height: 100vh; width: 250px;">
            <ul class="nav flex-column">
                <li class="nav-item"><a href="/PaginasUsuario/PerfilUsuario.html" class="nav-link text-light">Perfil</a></li>
                <li class="nav-item"><a href="/PaginasUsuario/ConfPerfilUsuario.html" class="nav-link text-light">Configuración de la cuenta</a></li>
                <li class="nav-item"><a href="/PaginasUsuario/SolicitarAlbumUsuario.html" class="nav-link text-light">Solicitar un álbum</a></li>
            </ul>
        </aside>
        <main class="container my-4">
            <h2 class="text-light">Solicitar un álbum</h2>
            <form>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="albumName" class="form-label text-light">Nombre del álbum</label>
                        <input type="text" class="form-control" id="albumName" placeholder="Nombre del álbum">
                    </div>
                    <div class="col-md-6">
                        <label for="releaseDate" class="form-label text-light">Fecha de lanzamiento</label>
                        <input type="date" class="form-control" id="releaseDate">
                    </div>
                    <div class="col-md-6">
                        <label for="artistName" class="form-label text-light">Nombre del artista/grupo</label>
                        <input type="text" class="form-control" id="artistName" placeholder="Nombre del artista o grupo">
                    </div>
                    <div class="col-md-6">
                        <label for="albumDuration" class="form-label text-light">Duración del álbum (MM:SS)</label>
                        <input type="text" class="form-control" id="albumDuration" placeholder="Ejemplo: 45:30">
                    </div>
                    <div class="col-md-6">
                        <label for="LinkFoto" class="form-label text-light">Enlace de foto</label>
                        <input type="text" class="form-control" id="AlbumFoto" placeholder="El formato de preferencia debe tener ratio de 1:1">
                    </div>
                </div>
                <div class="my-3">
                    <label class="form-label text-light">Géneros musicales</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hipHop">
                            <label class="form-check-label text-light" for="hipHop">Hip hop</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="classical">
                            <label class="form-check-label text-light" for="classical">Música clásica</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="lofi">
                            <label class="form-check-label text-light" for="lofi">Lo-Fi</label>
                        </div>
                        <!-- Agrega más géneros según sea necesario -->
                    </div>
                </div>
                <div class="mb-3">
                    <label for="youtubeLink" class="form-label text-light">Link de YouTube del álbum</label>
                    <input type="url" class="form-control" id="youtubeLink" placeholder="Enlace del álbum">
                </div>
                <div class="mb-3">
                    <label for="albumDescription" class="form-label text-light">Descripción del álbum</label>
                    <textarea class="form-control" id="albumDescription" rows="3" placeholder="Agrega una descripción del álbum"></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-danger">Enviar solicitud</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
