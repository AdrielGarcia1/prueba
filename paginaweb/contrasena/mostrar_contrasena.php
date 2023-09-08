<!DOCTYPE html>
<html>
<head>
  <title>Mostrar Contraseña</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <?php
  if (isset($_GET['password'])) {
    $password = $_GET['password'];
    echo "<h2>Contraseña Recuperada</h2>";
    echo "<p>La contraseña almacenada es: $password</p>";
  } else {
    echo "<h2>Error</h2>";
    echo "<p>No se ha proporcionado una contraseña válida.</p>";
  }
  ?>

  <a href="../login/login.php">Volver a Inicio</a>
</body>
</html>