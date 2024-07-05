<main class="contenedor seccion">
   <h1>Administrador de Bienes Raices</h1>

   <?php
   if($resultado) {
      $mensaje = mostrarNotificacion(intval($resultado));

      if($mensaje) { ?>
         <p class="alerta exito"><?php echo s($mensaje) ?></p>
      <?php } ?>
   <?php } ?>

   <h2>Vendedores</h2>

   <a href="/admin/vendedores/crear.php" class="boton-amarillo">Nuevo Vendedor(a)</a>

   <table class="propiedades">
      <thead>
         <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Acciones</th>
         </tr>
      </thead>

      <tbody>
         <?php foreach($vendedores as $vendedor): ?>
            <tr>
               <td><?php echo $vendedor->id; ?></td>
               <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
               <td><?php echo $vendedor->telefono; ?></td>
               <td>
                  <form method="POST" class="w-100">
                     <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                     <input type="hidden" name="tipo" value="vendedor">
                     <input type="submit" class="boton-rojo-block" value="Eliminar">
                  </form>
                  <!-- se modifico uri pq dulicaba el admin -->
                  <a href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
               </td>
            </tr>
         <?php endforeach;; ?>
      </tbody>
   </table>
</main>
