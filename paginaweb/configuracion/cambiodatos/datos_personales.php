<!DOCTYPE html>
<html>
<head>
  <title>Datos Personales</title>
</head>
<body>
  <?php
  include("../../includes/db_connection.php");
  
  // Verificar si el usuario ha iniciado sesión
  session_start();
  if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redireccionar a la página de inicio de sesión
    header("Location: ../login/login.php");
    exit();
  }
  
  // Obtener el ID del usuario de la sesión
  $id_usuario = $_SESSION['id_usuario'];
  
  // Consultar la base de datos para obtener los datos del usuario
  $query = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
  $result = mysqli_query($connection, $query);
  
  if (mysqli_num_rows($result) == 1) {
    // El usuario existe, obtener los datos y mostrar el formulario
    $row = mysqli_fetch_assoc($result);
    ?>
    <h2>Datos Personales</h2>
    <form action="../cambiodatos/validar_datos_personales.php" method="POST">
      <label for="name">Nombre:</label>
      <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
      
      <label for="surname">Apellido:</label>
      <input type="text" name="surname" value="<?php echo $row['surname']; ?>" required>
      
      <label for="mail">Email:</label>
      <input type="email" name="mail" value="<?php echo $row['mail']; ?>" required>
      
      <label for="dni">DNI:</label>
      <input type="text" name="dni" value="<?php echo $row['dni']; ?>" readonly>
      
      <label for="sexo">Sexo:</label>
      <select name="sexo" required>
        <option value="1" <?php if ($row['sexo'] == 1) echo 'selected'; ?>>Masculino</option>
        <option value="0" <?php if ($row['sexo'] == 0) echo 'selected'; ?>>Femenino</option>
      </select>
      
      <label for="id_provincia">Provincia:</label>
      <input type="text" name="id_provincia" value="<?php echo $row['id_provincia']; ?>" required>
      
      <input type="hidden" name="estado" value="<?php echo $row['estado']; ?>">
      
      <input type="submit" name="guardar" value="Guardar">
    </form>
    
    <a href="../../principal/index.php">Volver a la página principal</a>
    
    <?php
  } else {
    // El usuario no existe, manejar el error según tus necesidades
    echo "Error: Usuario no encontrado.";
  }
  
  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
  ?>
</body>
</html>