<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $email = $_POST["email"];
  $dni = $_POST["dni"];
  $name = $_POST["name"];

  // Consultar la base de datos para verificar los datos
  $query = "SELECT password FROM usuarios WHERE mail = '$email' AND dni = '$dni' AND name = '$name'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $password = $row["password"];

    // Redirigir al usuario a la página de mostrar contraseña con la contraseña recuperada como parámetro
    header("Location: mostrar_contrasena.php?password=" . urlencode($password));
    exit();
  } else {
    echo "Los datos proporcionados no coinciden. Por favor, verifique la información ingresada.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>


