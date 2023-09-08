<?php
// Conexión a la base de datos
$host = "127.0.0.1";
$db = "pagina";
$user = "root";
$password = "";

$connection = mysqli_connect($host, $user, $password, $db);

if (!$connection) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>