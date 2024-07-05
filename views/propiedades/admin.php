<main class="contenedor seccion">
   <h1>Administrador de Bienes Raices</h1>

   <?php
   if($resultado) {
      $mensaje = mostrarNotificacion(intval($resultado));

      if($mensaje) { ?>
         <p class="alerta exito"><?php echo s($mensaje) ?></p>
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
                  <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>

                  <form method="POST" class="w-100" action="/propiedades/eliminar">
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

   <h2>Vendedores</h2>

   <a href="/vendedores/crear" class="boton-amarillo">Nuevo Vendedor(a)</a>

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
