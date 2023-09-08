<?php
// Verificar si se ha enviado el ID del usuario a editar
if (isset($_GET['id'])) {
  $idUsuario = $_GET['id'];

  // realizar la lógica para cargar los datos del usuario en un formulario de edición
  // utilizar el ID del usuario para obtener sus datos de la base de datos y mostrarlos en los campos del formulario
  // realizar la actualización de los datos cuando se envíe el formulario
  ?>
  <h2>Editar Usuario</h2>
  <form action="guardar_usuario.php" method="post">
    <?php
      // Recuperar los datos del usuario de la base de datos y asignarlos a variables
      // Aquí deberás realizar la consulta a la base de datos para obtener los datos del usuario a editar
      // y asignarlos a las variables correspondientes
      $nombre = "John";
      $apellido = "Doe";
      $password = "********";
      $email = "john.doe@example.com";
    ?>
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" value="<?php echo $nombre; ?>" required>
    
    <label for="surname">Apellido:</label>
    <input type="text" name="surname" id="surname" value="<?php echo $apellido; ?>" required>
   
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>" required>
    
    <label for="mail">Email:</label>
    <input type="email" id="mail" name="mail" value="<?php echo $email; ?>" required>
    
    <label for="dni">DNI:</label>
    <input type="text" id="dni" name="dni" required>
    
    <label for="sexo">Sexo:</label>
    <select name="sexo" required>
      <option value="1">Masculino</option>
      <option value="0">Femenino</option>
    </select>
    <label for="id_provincia">Provincia:</label>
    <select name="id_provincia" required>
      <?php
        // Consulta para obtener las provincias de la base de datos
        $query = "SELECT * FROM provincias";
        $result = mysqli_query($connection, $query);
        
        // Generar opciones para cada provincia
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="' . $row['id_provincias'] . '">' . $row['nombreprovincia'] . '</option>';
        }
      ?>
    </select>
    
    <!-- Agrega más campos del formulario según tus necesidades -->
    
    <input type="submit" value="Guardar cambios">
  </form>
  <?php
}
?>