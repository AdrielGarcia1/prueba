<?php
include("../includes/db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los datos del formulario
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $password = $_POST['password'];
  $mail = $_POST['mail'];
  $dni = $_POST['dni'];
  $sexo = $_POST['sexo'];
  $id_provincia = $_POST['id_provincia'];
  $estado = 1;
  $rol = 1;
  
  // Insertar los datos en la base de datos
  $query = "INSERT INTO usuarios (name, surname, password, mail, dni, sexo, id_provincia, estado, rol)
            VALUES ('$name', '$surname', '$password', '$mail', '$dni', b'$sexo', '$id_provincia', b'$estado', b'$rol')";

  if (mysqli_query($connection, $query)) {
    // Cerrar la conexión a la base de datos
    mysqli_close($connection);

    // Redirigir al archivo "registro_exitoso.php"
    header("Location: registro_exitoso.php");
    exit();
  } else {
    echo "Error al registrar el usuario: " . mysqli_error($connection);
  }
}
?>