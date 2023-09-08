<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
  <?php include("../includes/db_connection.php"); ?>
  
  <h2>Registro de usuario</h2>
  <form action="../register/registro_adicional.php" method="POST" onsubmit="return validateForm();">
    
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    
    <label for="surname">Apellido:</label>
    <input type="text" name="surname" required>
   
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    
    <label for="mail">Email:</label>
    <input type="email" id="mail" name="mail" required>
    
    <input type="submit" value="Continuar">
  </form>
  
  <script>
    function validateForm() {
      var passwordInput = document.getElementById("password");
      var passwordValue = passwordInput.value.trim();
      
      // Validar que la contraseña cumpla con los requisitos de seguridad
      // Al menos 8 caracteres de longitud
      if (passwordValue.length < 8) {
        alert("La contraseña debe tener al menos 8 caracteres.");
        passwordInput.value = ""; // Limpiar el campo de contraseña
        passwordInput.focus(); // Enfocar el campo de contraseña para facilitar la corrección
        return false;
      }
      
      // Otros criterios de complejidad de contraseña, ej:
      // - Al menos una letra mayúscula y una minúscula
      // - Al menos un número
      // - Al menos un carácter especial
      
      var emailInput = document.getElementById("mail");
      var emailValue = emailInput.value.trim();
      
      // Validar que el correo electrónico contenga el símbolo "@" y tenga una terminación válida después del arroba
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(emailValue)) {
        alert("Email inválido. Por favor, ingrese un email válido.");
        emailInput.value = ""; // Limpiar el campo de email
        emailInput.focus(); // Enfocar el campo de email para facilitar la corrección
        return false;
      }
      
      return true;
    }
  </script>
</body>
</html>