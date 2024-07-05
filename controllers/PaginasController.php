<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {

   public static function index(Router $router) {

      // obtenemos todas las propiedades
      $propiedades = Propiedad::get(3);

      // inicializamos $inicio para visualizar el banner
      $inicio = true;

      $router->render('paginas/index', [
         'propiedades' => $propiedades,
         'inicio' => $inicio
      ]);
   }

   public static function nosotros() {
      echo 'desde nosotros';
   }

   public static function propiedades() {
      echo 'desde propiedades';
   }

   public static function propiedad() {
      echo 'desde propiedad';
   }

   public static function blog() {
      echo 'desde blog';
   }

   public static function entrada() {
      echo 'desde entrada';
   }

   public static function contacto() {
      echo 'desde contacto';
   }
}
