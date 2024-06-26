<?php

namespace MVC;

class Router {

   public $rutasGET = [];
   public $rutasPOST = [];

   public function get($url, $fn) {
      $this->rutasGET[$url] = $fn;
   }

   public function post($url, $fn) {
      $this->rutasPOST[$url] = $fn;
   }

   public function comprobarRutas() {
      $urlActual = $_SERVER['PATH_INFO'] ?? '/';
      $metodo = $_SERVER['REQUEST_METHOD'];


      // obtenemos la funcion (fn) asociada al url (GET)
      if($metodo === 'GET') {
         $fn = $this->rutasGET[$urlActual] ?? null;
      } else {
         $fn = $this->rutasPOST[$urlActual] ?? null;
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
   public function render($view, $datos= []) {

      foreach($datos as $key => $value) {
         $$key = $value;
      }

      // ob_start() permite iniciar un alamacenamiento en memoria
      ob_start();
         include __DIR__ . "/views/$view.php";
         // inyecta en layout en $contenido la vista que le pasamos desde el index.php
         $contenido = ob_get_clean();
         include __DIR__ . "/views/layout.php";
   }
}
