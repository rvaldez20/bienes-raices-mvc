<?php

namespace MVC;

class Router {

   public $rutasGET = [];
   public $rutasPOST = [];

   public function get($url, $fn) {
      $this->rutasGET[$url] = $fn;
   }

   public function comprobarRutas() {
      $urlActual = $_SERVER['PATH_INFO'] ?? '/';
      $metodo = $_SERVER['REQUEST_METHOD'];

      // obtenemos la funcion (fn) asociada al url
      if($metodo === 'GET') {
         $fn = $this->rutasGET[$urlActual] ?? null;

      }

      if($fn) {
         // URL valida y podmeos obtener la funcion asociada
         call_user_func($fn, $this);

         // debug($this);
      } else {
         echo "Pagina no encontrada";
      }
   }

   // Muestra una vista
   public function render($view) {
      include __DIR__ . "/views/$view.php";
   }

}
