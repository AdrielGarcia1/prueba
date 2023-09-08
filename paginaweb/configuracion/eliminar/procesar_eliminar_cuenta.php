<?php
include("../../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $name = $_POST['name'];
  $password = $_POST['password'];
  $dni = $_POST['dni'];

  // Verificar los datos en la base de datos
  $query = "SELECT * FROM usuarios WHERE name = '$name' AND password = '$password' AND dni = '$dni'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 1) {
    // Cambiar el valor del campo "estado" de la base de datos
    $updateQuery = "UPDATE usuarios SET estado = 0 WHERE name = '$name' AND password = '$password' AND dni = '$dni'";
    if (mysqli_query($connection, $updateQuery)) {
      echo "Cuenta eliminada exitosamente.";
    } else {
      echo "Error al eliminar la cuenta: " . mysqli_error($connection);
    }
  } else {
    echo "Datos incorrectos. Por favor, inténtalo nuevamente.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>