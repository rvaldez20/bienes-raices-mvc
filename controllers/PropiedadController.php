<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;

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

   public static function crear() {
      echo 'Crear Propiedad';
   }

   public static function actualizar() {
      echo 'Actualizar Propiedad';
   }


}
