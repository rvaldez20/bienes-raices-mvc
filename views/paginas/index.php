<main class="contenedor seccion">
   <h1>Más Sobre Nosotros</h1>

   <!-- ICONOS-NOSOTROS -->
   <?php include 'iconos.php' ?>
</main>

<!-- CASAS Y DEPAS EN VENTA -->
<section class="seccion contenedor">
   <h2>Casas y Departamentos en Venta</h2>

   <?php
      include 'listado.php';
   ?>

   <div class="alinear-derecha">
      <a href="anuncios.html" class="boton-verde">Ver Todas</a>
   </div>
</section>

<!-- BANNER CONTACTO -->
<section class="imagen-contacto">
   <h2>Encuntra la casa de tus sueños</h2>
   <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
   <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
</section>

<!-- BLOG AND ASIDE TESTIMONIALES -->
<div class="contenedor seccion seccion-inferior">
   <!-- ENTRADAS DE BLOG -->
   <section class="blog">
      <h3>Nuestro Blog</h3>

      <article class="entrada-blog">
         <div class="imagen">
            <picture>
               <source srcset="build/img/blog1.webp" type="image/webp">
               <source srcset="build/img/blog1.jpg" type="image/jpeg">
               <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
            </picture>
         </div>  <!-- .imagen -->

         <div class="texto-entrada">
            <a href="entrada.html">
               <h4>Terraza en el techo de tu casa</h4>
               <p class="informacion-meta">Escrito el: <span>20/10/2021</span>Por: <span>Admin</span></p>

               <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero.</p>
            </a>
         </div>
      </article>

      <article class="entrada-blog">
         <div class="imagen">
            <picture>
               <source srcset="build/img/blog2.webp" type="image/webp">
               <source srcset="build/img/blog2.jpg" type="image/jpeg">
               <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog">
            </picture>
         </div>  <!-- .imagen -->

         <div class="texto-entrada">
            <a href="entrada.html">
               <h4>Guía para decoración de tu hogar</h4>
               <p class="informacion-meta">Escrito el: <span>20/10/2021</span>Por: <span>Admin</span></p>

               <p>Maximiza el espacio en tu hogar con esta guía, aprende a cambiar muebles y colores para darle vida a tu espacio.</p>
            </a>
         </div>
      </article>
   </section>

   <section class="testimoniales">
      <h3>Testimoniales</h3>

      <div class="testimonial">
         <blockquote>
            El personal se comporto de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis espectativas.
         </blockquote>
         <p>- Raúl Valdez</p>
      </div>
   </section>
</div>
