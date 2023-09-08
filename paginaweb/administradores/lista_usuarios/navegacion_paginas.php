<!-- Búsqueda de usuario -->
<br>
<form action="lista_usuarios.php" method="get">
  <label for="busqueda">Buscar usuario:</label>
  <input type="text" name="busqueda" id="busqueda" placeholder="Buscar por nombre, apellido, email, etc.">
  <input type="submit" value="Buscar">
  <input type="submit" name="limpiar" value="Limpiar búsqueda">
</form>

<!-- Navegación de páginas -->
<?php if ($totalPaginas > 1) { ?>
  <div>
    <?php if ($paginaActual > 1) { ?>
      <a href="lista_usuarios.php?pagina=<?php echo $paginaActual - 1; ?>">&lt; Anterior</a>
    <?php } ?>
    
    <?php for ($i = 1; $i <= $totalPaginas; $i++) { ?>
      <?php if ($i == $paginaActual) { ?>
        <span><?php echo $i; ?></span>
      <?php } else { ?>
        <a href="lista_usuarios.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php } ?>
    <?php } ?>
    
    <?php if ($paginaActual < $totalPaginas) { ?>
      <a href="lista_usuarios.php?pagina=<?php echo $paginaActual + 1; ?>">Siguiente &gt;</a>
    <?php } ?>
  </div>
<?php } ?>