<!DOCTYPE html>
<html>
<head>
  <title>Registro Adicional</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script>
    function validateDNI() {
      var dniInput = document.getElementById("dni");
      var dniValue = dniInput.value.trim();
      
      // Validar que el DNI contenga solo caracteres numéricos y tenga una longitud de 8
      var numericRegex = /^[0-9]+$/;
      if (!numericRegex.test(dniValue) || dniValue.length !== 8) {
        alert("DNI inválido. Por favor, ingrese un DNI válido de 8 caracteres numéricos.");
        dniInput.value = ""; // Limpiar el campo DNI
        dniInput.focus(); // Enfocar el campo DNI para facilitar la corrección
        return false;
      }
      
      return true;
    }
  </script>
</head>
<body>
<?php include("../includes/db_connection.php"); ?>
  <h2>Registro de usuario (Adicional)</h2>
  <form action="../register/save_registration.php" method="POST" onsubmit="return validateDNI();">
    <?php
    // Recuperar los datos enviados desde registro.php
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $password = $_POST["password"];
    $email = $_POST["mail"];
    ?>
    
    <!-- Campos ocultos -->
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="surname" value="<?php echo $surname; ?>">
    <input type="hidden" name="password" value="<?php echo $password; ?>">
    <input type="hidden" name="mail" value="<?php echo $email; ?>">
    
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
    
    <input type="submit" value="Guardar">
  </form>
</body>
</html>


