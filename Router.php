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

      // debug($this);

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
      // ob_start() permite iniciar un alamacenamiento en memoria
      ob_start();
         include __DIR__ . "/views/$view.php";

         // inyecta en layout en $contenido la vista que le pasamos desde el index.php
         $contenido = ob_get_clean();

         include __DIR__ . "/views/layout.php";
   }
}
