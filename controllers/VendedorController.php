<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController {

   public static function index(Router $router) {
      //! usamos el modelo para obtener la data de vendedores
      $vendedores = Vendedor::all();

      //! mensaje condicional
      $resultado = $_GET["resultado"] ?? null;  //checamos si esta esta establecido reusltado

      //! le pasamos la data $propiedades a la vista
      $router->render('vendedores/admin', [
         'vendedores' => $vendedores,
         'resultado' => $resultado
      ]);

   }

}
