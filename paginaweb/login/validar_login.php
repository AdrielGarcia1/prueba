<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];

  // Consultar la base de datos para verificar los datos
  $query = "SELECT * FROM usuarios WHERE name = '$usuario' AND password = '$contrasena'";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 1) {
    // Usuario y contraseña son correctos
    // Iniciar sesión y redirigir al usuario a la página correspondiente
    
    $row = mysqli_fetch_assoc($result);
    
    session_start();
    $_SESSION['id_usuario'] = $row['id_usuario']; // Guardar el ID del usuario en la sesión
    
    if (isset($row['rol'])) {
      if ($row['rol'] == 1) {
        // Redireccionar a index.php si el rol es 1
        header("Location: ../principal/index.php");
      } elseif ($row['rol'] == 0) {
        // Redireccionar a la página de administradores (admin.php) si el rol es 0
        header("Location: ../administradores/admin.php");
      } else {
        //redireccionar a una página de error
        header("Location: ../errores/error.php");
      }
    } else {
      // Variable $row['rol'] no definida, manejar el error según tus necesidades
      // Por ejemplo, redireccionar a una página de error o mostrar un mensaje de error
      header("Location: ../error.php");
    }

    exit();
  } else {
    // Usuario o contraseña incorrectos
    echo "Usuario o contraseña incorrectos. Por favor, inténtalo nuevamente.";
  }

  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>