<main class="contenedor seccion">
   <h1>Administrador de Bienes Raices</h1>

   <?php
   if($resultado) {
      $mensaje = mostrarNotificacion(intval($resultado));
      if($mensaje) { ?>
         <p class="alerta exito"><?php s($mensaje) ?></p>
      <?php } ?>
   <?php } ?>

   <h2>Propiedades</h2>

   <a href="/propiedades/crear" class="boton-amarillo">Nueva Propiedad</a>

   <table class="propiedades">
      <thead>
         <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
         </tr>
      </thead>

      <tbody>
         <?php foreach($propiedades as $propiedad): ?>
            <tr>
               <td><?php echo $propiedad->id; ?></td>
               <td><?php echo $propiedad->titulo; ?></td>
               <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen propiedad" class="imagen-tabla"></td>
               <td>$ <?php echo number_format($propiedad->precio, 2, '.', ','); ?></td>
               <td>
                  <!-- se modifico uri pq dulicaba el admin -->
                  <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>

                  <form method="POST" class="w-100">
                     <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                     <input type="hidden" name="tipo" value="propiedad">
                     <!-- <input type="hidden" name="tipo" value="vendedor"> -->
                     <input type="submit" class="boton-rojo-block" value="Eliminar">
                  </form>
               </td>
            </tr>
         <?php endforeach;; ?>
      </tbody>
   </table>
</main>
