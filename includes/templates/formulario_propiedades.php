<fieldset>
   <legend>Información General</legend>

   <label for="titulo">Titulo</label>
   <input type="text" id="titulo" name="propiedad[titulo]" value="<?php echo s($propiedad->titulo) ?>" placeholder="Titulo Propiedad">

   <label for="precio">Precio</label>
   <input type="number" id="precio" name="propiedad[precio]" value="<?php echo s($propiedad->precio) ?>" placeholder="Precio  Propiedad">

   <label for="imagen">Precio</label>
   <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

   <?php if($propiedad->imagen): ?>
      <img src="/imagenes/<?php echo $propiedad->imagen ?>" alt="imagen propiedad" class="imagen-small">
   <?php endif; ?>

   <label for="descripcion">Descripción</label>
   <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion) ?></textarea>
</fieldset>

<fieldset>
   <legend>Información de la Propiedad</legend>

   <label for="habitaciones">habitaciones</label>
   <input type="number" id="habitaciones" name="propiedad[habitaciones]" value="<?php echo s($propiedad->habitaciones) ?>" placeholder="Ej: 3" min="1" max="9">

   <label for="wc">Baños</label>
   <input type="number" id="wc" name="propiedad[wc]" value="<?php echo s($propiedad->wc) ?>" placeholder="Ej: 3" min="1" max="9">

   <label for="estacionamiento">Etacionamiento</label>
   <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" value="<?php echo s($propiedad->estacionamiento) ?>" placeholder="Ej: 3" min="1" max="9">
</fieldset>

<fieldset>
   <legend>Vendedor</legend>

   <select name="propiedad[vendedores_Id]" id="vendedor">
      <label for="vendedor">Vendedor</label>
      <option value="" disabled selected>-- Seleccione un Vendedor --</option>
         <?php foreach($vendedores as $vendedor){ ?>
            <option <?php echo $propiedad->vendedores_Id === $vendedor->id ? 'selected' : ''; ?> value="<?php echo s($vendedor->id); ?>"> <?php echo s($vendedor->nombre) . s($vendedor->apellido); ?> </option>
         <?php } ?>
   </select>
</fieldset>
