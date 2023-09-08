<?php
session_start();
include("../../includes/db_connection.php");

// Definir la cantidad de usuarios por página
$usuariosPorPagina = 5;

// Obtener el número de página actual
if (isset($_GET['pagina'])) {
  $paginaActual = $_GET['pagina'];
} else {
  $paginaActual = 1;
}

// Calcular el offset
$offset = ($paginaActual - 1) * $usuariosPorPagina;

// Verificar si se ha enviado el formulario de búsqueda
if (isset($_GET['busqueda'])) {
  $busqueda = $_GET['busqueda'];

  // Consultar los usuarios desde la base de datos con la condición de búsqueda
  $query = "SELECT usuarios.id_usuario, usuarios.name, usuarios.surname, usuarios.mail, usuarios.dni, usuarios.sexo, provincias.nombreprovincia AS nombre_provincia, usuarios.estado, usuarios.rol FROM usuarios LEFT JOIN provincias ON usuarios.id_provincia = provincias.id_provincias WHERE usuarios.name LIKE '%$busqueda%' OR usuarios.surname LIKE '%$busqueda%' OR usuarios.mail LIKE '%$busqueda%' OR usuarios.dni LIKE '%$busqueda%' LIMIT $offset, $usuariosPorPagina";
  $result = mysqli_query($connection, $query);
} else {
  // Consultar los usuarios desde la base de datos sin ninguna condición de búsqueda
  $query = "SELECT usuarios.id_usuario, usuarios.name, usuarios.surname, usuarios.mail, usuarios.dni, usuarios.sexo, provincias.nombreprovincia AS nombre_provincia, usuarios.estado, usuarios.rol FROM usuarios LEFT JOIN provincias ON usuarios.id_provincia = provincias.id_provincias LIMIT $offset, $usuariosPorPagina";
  $result = mysqli_query($connection, $query);
}

if ($result) {
  // Obtener el número total de usuarios
  $queryTotal = "SELECT COUNT(*) AS total FROM usuarios";
  $resultTotal = mysqli_query($connection, $queryTotal);
  $rowTotal = mysqli_fetch_assoc($resultTotal);
  $totalUsuarios = $rowTotal['total'];

  // Calcular el número total de páginas
  $totalPaginas = ceil($totalUsuarios / $usuariosPorPagina);
} else {
  echo "Error en la consulta: " . mysqli_error($connection);
  exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($connection);

// Incluir el archivo HTML para mostrar la lista de usuarios
include("lista_usuarios.html");
?>