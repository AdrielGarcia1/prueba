<!DOCTYPE html>
<html>
<head>
  <title>Eliminar Cuenta</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <h2>Eliminar Cuenta</h2>
  <form action="procesar_eliminar_cuenta.php" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required>
    
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required>
    
    <input type="submit" value="Eliminar Cuenta">
  </form>
</body>
</html>