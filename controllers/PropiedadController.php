<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

   public static function index(Router $router) {
      //! usamos el modelo para obtener la data de propiedades
      $propiedades = Propiedad::all();

      //mensaje condicional
      $resultado = $_GET["resultado"] ?? null;  //checamos si esta esta establecido reusltado

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

      //! array con mensjes de errores
      $errores = Propiedad::getErrores();

      if($_SERVER['REQUEST_METHOD'] === 'POST') {
         // intanciamos y le pasamos $_POST que incluye la data del formulario
         $propiedad = new Propiedad($_POST['propiedad']);

         // crear un nombre unico para cada imagen y detectar la extension de la imagen
         $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

         // Seteo de las imagenes
         if($_FILES['propiedad']['tmp_name']["imagen"]){
            $imagen = Image::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
         }

         // validamos todo los campos del formulario
         $errores = $propiedad->validar();

         // si no hay errores podemos guardar el registro de la propiedad
         if(empty($errores)) {

            // CREACION DIERCTORIO PARA IMAGES (si no existe lo crea) Y NOMBERE UNICO
            // $carpetaImagenes = '../../imagenes/';
            if(!is_dir(CARPETA_IMAGENES)) {
               mkdir(CARPETA_IMAGENES);
            }

            /** SUBIDA DE ARCHIVOS */
            // guarda la imagen en el server con el directorio y nombre establecido
            $imagen->save(CARPETA_IMAGENES . $nombreImagen);

            // guardamos la data en la db
            $propiedad->guardar();
         }
      }

      $router->render('propiedades/crear', [
         'propiedad' => $propiedad,
         'vendedores' => $vendedores,
         'errores' => $errores
      ]);
   }

   public static function actualizar(Router $router) {

      //! validamos el id que viene en la url
      $id = validarORedireccioanr('/admin');

      //! buscamos la propiedad
      $propiedad = Propiedad::find($id);

      //! obtenesmo los vendedores
      $vendedores = Vendedor::all();

      //! array con mensjes de errores
      $errores = Propiedad::getErrores();


      //! verificamos que la propiedad exista en la DB si no lo redireccionamos al /admin
      if(!$propiedad) {
         header("Location: /admin");
      }

      // Metodo POST para actualziar una propiedad
      if($_SERVER["REQUEST_METHOD"] === 'POST') {
         // asignar los atributos del POST
         $args = $_POST['propiedad'];

         $propiedad->sincronizar($args);

         // Validacion de los campos actualizados
         $errores = $propiedad->validar();

         // Subida de archivos
         $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';   // crea un nombre unico

         if($_FILES['propiedad']['tmp_name']['imagen']){
            $image = Image::make($_FILES['propiedad']['tmp_name']["imagen"])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
         }

         // revisar que el array de errores este vacio
         if(empty($errores)) {
            if($_FILES['propiedad']['tmp_name']['imagen']) {
               // Guardar la nueva imagen en le servidor
               $image->save(CARPETA_IMAGENES . $nombreImagen);
            }

            // Guardamos la actualizaciond e los datos
            $propiedad->guardar();
         }
      }  // if $_SERVER["REQUEST_METHOD"]

      $router->render('/propiedades/actualizar', [
         'propiedad' => $propiedad,
         'errores' => $errores,
         'vendedores' => $vendedores
      ]);

   }


}
