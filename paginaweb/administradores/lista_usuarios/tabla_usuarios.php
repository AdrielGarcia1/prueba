<!-- Mostrar la lista de usuarios en una tabla estilo Excel -->
<table>
  <tr>
    <th> ID </th>
    <th> Nombre</th>
    <th> Apellido</th>
    <th> Email</th>
    <th> DNI</th>
    <th> Sexo</th>
    <th> Provincia</th>
    <th >Estado</th>
    <th> Rol</th>
    <th> Acciones</th> <!-- Nueva columna para acciones -->
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?php echo $row['id_usuario']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['surname']; ?></td>
      <td><?php echo $row['mail']; ?></td>
      <td><?php echo $row['dni']; ?></td>
      <td><?php echo $row['sexo']; ?></td>
      <td><?php echo $row['nombre_provincia']; ?></td>
      <td><?php echo $row['estado']; ?></td>
      <td><?php echo $row['rol']; ?></td>
      <td><a href="editar_usuario.php?id=<?php echo $row['id_usuario']; ?>">Editar</a></td> <!-- Enlace para editar el usuario -->
    </tr>
  <?php } ?>
</table>