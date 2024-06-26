
<main class="contenedor seccion">
   <h1>Crear Nueva Propiedad</h1>

   <?php foreach($errores as $error): ?>
      <div class="alerta error">
         <?php echo $error; ?>
      </div>
   <?php endforeach; ?>

   <a href="/admin" class="boton-amarillo">Volver al Admin</a>

   <form class="formulario" method="POST" enctype="multipart/form-data">
      <?php include __DIR__ . '/formulario.php' ?>

      <input type="submit" value="Crear Propiedad" class="boton-verde">
   </form>
</main>
