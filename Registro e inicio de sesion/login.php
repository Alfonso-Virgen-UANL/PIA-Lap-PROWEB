<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta con la base de datos (reemplaza los datos de conexión según tu configuración)
    $host = "127.0.0.1"; 
    $dbname = "albumfypia";
    $username = "root";
    $password = "Xibalba@2001";
    $port = 3306;
    
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Captura los datos del formulario
        $email = $_POST['uemail'];
        $contraseña = $_POST['ucont'];

        // Consulta para obtener el usuario con ese email
        $stmt = $conn->prepare("SELECT * FROM usuario WHERE correo = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si el usuario existe
        if ($row) {
            // Compara la contraseña ingresada con la almacenada en la base de datos (sin cifrado)
            if ($contraseña === $row['contraseña']) {
                // Contraseña correcta, guardar información en sesión
                $_SESSION['idUsuario'] = $row['idUsuario'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['idRol'] = $row['idRol'];

                // Redirigir al usuario a la página principal o donde sea necesario
                header('Location: http://localhost:3000/HomeTendencias/Home(U).php');
                exit();
            } else {
                // Contraseña incorrecta
                $error_message = "Correo o contraseña incorrectos.";
                
            }
        } else {
            // Usuario no encontrado
            echo "No se encontró el usuario.";
        }
    } catch (PDOException $e) {
        // Si hay un error en la conexión
        die("Error: " . $e->getMessage());
    }
}
?>
