<?php
session_start();

include("../../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $currentPassword = $_POST['current_password'];
  $newPassword = $_POST['new_password'];
  $confirmPassword = $_POST['confirm_password'];

  // Obtener el ID del usuario de la sesión
  $userId = $_SESSION['id_usuario'];
  echo "holaa $userId";
  // Verificar la contraseña actual en la base de datos
  $query = "SELECT password FROM usuarios WHERE  id_usuario = '$userId'";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    // Verificar si la contraseña actual coincide
    if ($currentPassword === $storedPassword) {
      // Verificar que las nuevas contraseñas coincidan
      if ($newPassword === $confirmPassword) {
        // Actualizar la contraseña en la base de datos
        $updateQuery = "UPDATE usuarios SET password = '$newPassword' WHERE  id_usuario = '$userId'";
        $updateResult = mysqli_query($connection, $updateQuery);

        if ($updateResult) {
          // Contraseña cambiada exitosamente
          header("Location: cambio_exitoso.php");
          exit();
        } else {
          echo "Error al actualizar la contraseña. Por favor, inténtalo nuevamente.";
        }
      } else {
        echo "Las nuevas contraseñas no coinciden. Por favor, inténtalo nuevamente.";
      }
    } else {
      echo "La contraseña actual es incorrecta. Por favor, inténtalo nuevamente.";
    }
  } else {
    echo "No se pudo verificar la contraseña actual. Por favor, inténtalo nuevamente.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>