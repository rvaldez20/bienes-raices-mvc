<?php
define('TEMPLATES_URL', __DIR__ . '\templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ) {
   include TEMPLATES_URL . "\\" . $nombre . ".php";
}

function isAuth() {
   session_start();

   if(!$_SESSION['login']) {
      header('Location: /');
   }
}

function debug($variable) {
   echo "<pre>";
   var_dump($variable);
   echo "</pre>";
   exit;
}

function debug_noExit($variable) {
   echo "<pre>";
   var_dump($variable);
   echo "</pre>";
}

// escapar el html (sanitizar)
function s($html) {
   $s = htmlspecialchars($html);
   return $s;
}

// validar tipo de contenido
function validarTipoContenido($tipo) {
   $tipos = ['vendedor', 'propiedad'];

   return in_array($tipo, $tipos);
 }

 //muesta los mensajes
 function mostrarNotificacion($codigo) {
   $mensaje = '';

   switch ($codigo) {
      case 1:
         $mensaje = 'Creado Correctamente';
         break;
      case 2:
         $mensaje = 'Actualizado Correctamente';
         break;
      case 3:
         $mensaje = 'Eliminado Correctamente';
         break;

      default:
         $mensaje = false;
   }

   return $mensaje;
 }

 function validarORedireccioanr(String $url) {
   // Validamos si no es un id valido redireccionamos al admin
   $id = $_GET["id"];
   $id = filter_var($id, FILTER_VALIDATE_INT);
   if(!$id) {
      header("Location: $url");
   }

   return $id;
 }
