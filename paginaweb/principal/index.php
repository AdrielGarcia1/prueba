<?php
session_start();
echo $_SESSION['id_usuario'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Página Principal</title>
  <link rel="stylesheet" type="text/css" href="index-styles.css">
</head>
<body>
  <div class="top-section">
    <div class="user-section">
      <div class="user-dropdown">
        <span>Usuario ▼</span>
        <div class="user-dropdown-content">
          <a href="cerrar_sesion.php">Cerrar sesión</a>
          <a href="../configuracion/configuracion.php">Configuración</a>
          <a href="#">Perfil</a>
        </div>
      </div>
    </div>
  </div>
  <div class="search-section">
    <div class="search-input-container">
      <button class="search-button">Buscar</button>
      <input type="text" class="search-input" placeholder="Buscar">
    </div>
  </div>

  <h1>Bienvenido a la Página Principal</h1>
</body>
</html>
