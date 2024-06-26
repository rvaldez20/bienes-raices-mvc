<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController {

   public static function index(Router $router) {
      //! usamos el modelo para obtener la data de propiedades
      $propiedades = Propiedad::all();
      $resultado = null;

      //! le pasamos la data $propiedades a la vista
      $router->render('propiedades/admin', [
         'propiedades' => $propiedades,
         'resultado' => $resultado
      ]);
   }

   public static function crear(Router $router) {

      //! creamos una nueva onstancia de propiedad
      $propiedad = new Propiedad;

      //! obtenesmo los vendedores
      $vendedores = Vendedor::all();

      $router->render('propiedades/crear', [
         'propiedad' => $propiedad,
         'vendedores' => $vendedores
      ]);
   }

   public static function actualizar() {
      echo 'Actualizar Propiedad';
   }


}
