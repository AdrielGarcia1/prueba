<?php
include("../../includes/db_connection.php");

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $id_usuario = $_SESSION['id_usuario'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $password = $_POST['password'];
  $mail = $_POST['mail'];
  $dni = $_POST['dni'];
  $sexo = $_POST['sexo'];
  $id_provincia = $_POST['id_provincia'];
  $estado = $_POST['estado'];
  
  // Realizar las validaciones necesarias
  
  // Procesar y guardar los datos en la base de datos
  $query = "UPDATE usuarios SET name='$name', surname='$surname', password='$password', mail='$mail', sexo='$sexo', id_provincia='$id_provincia' WHERE id_usuario='$id_usuario'";
  
  if (mysqli_query($connection, $query)) {
    // Los datos se han actualizado correctamente
    header("Location: datos_personales.php");
    exit();
  } else {
    // Ocurrió un error al actualizar los datos
    echo "Error: " . mysqli_error($connection);
  }
  
  // Cerrar la conexión a la base de datos
  mysqli_close($connection);
}
?>