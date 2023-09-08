<!DOCTYPE html>
<html>
<head>
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" type="text/css" href="../login/tyles.css">
</head>
<body>
  <div class="login-container">
    <h1>Inicio de Sesión</h1>
    <form action="validar_login.php" method="POST">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="contrasena" placeholder="Contraseña" required>
      <button type="submit">Iniciar Sesión</button>
      <a href="../contrasena/recuperar_contrasena.php">¿Olvidaste tu contraseña?</a>
      <a href="../register/registro.php">Registrarse</a>
    </form>
  </div>
</body>
</html>
