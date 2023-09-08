<!DOCTYPE html>
<html>
<head>
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <h2>Recuperar Contraseña</h2>
  <form action="procesar_recuperacion.php" method="POST">
    <label for="email">Correo Electrónico:</label>
    <input type="email" name="email" required>
    
    <label for="dni">DNI:</label>
    <input type="text" name="dni" required>
    
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    
    <input type="submit" value="Recuperar Contraseña">
  </form>
</body>
</html>

