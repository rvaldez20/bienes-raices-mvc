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


   public static function actualizar(Router $router) {

      $id = validarORedireccioanr('/admin');

      //! Obtener el arreglo del vendedor
      $vendedor = Vendedor::find($id);

      //! seteamos los errores
      $errores = Vendedor::getErrores();

      if($_SERVER["REQUEST_METHOD"] === 'POST') {

         // Asiganar valores
         $args = $_POST['vendedor'];

         // Sincronizar objeto en meoria con lo que el usario ecribio
         $vendedor->sincronizar($args);

         // validacion del formulario
         $errores = $vendedor->validar();

         if(empty($errores)) {
            $vendedor->guardar();
         }
      }

      $router->render('vendedores/actualizar', [
         'errores' => $errores,
         'vendedor' => $vendedor
      ]);

   } // method actualizar

   public static function eliminar() {
      echo "Eliminar Vendedor";
   } // method eliminar

}  // class
