<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {

   public static function crear(Router $router) {

      //! creamos una isntancia de vendedores
      $vendedor = new Vendedor;

      //! array con mensjes de errores
      $errores = Vendedor::getErrores();

      if($_SERVER["REQUEST_METHOD"] === 'POST') {
         // Crea nuueva intancia de vendedor
         $vendedor = new Vendedor($_POST['vendedor']);

         // validar el formulario
         $errores = $vendedor->validar();

         // si no hay errores
         if(empty
         ($errores)) {
            // guardamos el nuevo vendedor
            $vendedor->guardar();
         }
       }

      $router->render('vendedores/crear', [
         'errores' => $errores,
         'vendedor' => $vendedor
      ]);

   } // method crear


   public static function actualizar() {
      echo "Actualizar Vendedor";
   } // method actualizar

   public static function eliminar() {
      echo "Eliminar Vendedor";
   } // method eliminar

}  // class
