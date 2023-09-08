<!DOCTYPE html>
<html>
<head>
  <title>Cambiar Contraseña</title>
</head>
<body>
  <h2>Cambiar Contraseña</h2>
  <form action="procesar_cambiar_contrasena.php" method="POST">
    <label for="current_password">Contraseña actual:</label>
    <input type="password" id="current_password" name="current_password" required>

    <label for="new_password">Nueva contraseña:</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="confirm_password">Confirmar nueva contraseña:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="submit" value="Cambiar Contraseña">
  </form>
</body>
</html>