<?php
// Establecer la conexión a la base de datos MySQL en la instancia EC2 de AWS
$servername = "18.224.58.119"; // Cambia esto por la dirección IP de tu instancia EC2
$username = "carlos";
$password = "carlos109";
$dbname = "escuela35";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($result->num_rows > 0) {
    // Usuario autenticado correctamente
    // Redirigir a la página de inicio de sesión exitosa
    header("Location: http://18.224.58.199/");
} else {
    // Usuario no autenticado
    // Redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
    header("Location: login.html");
}

$conn->close();
?>
