<?php

namespace Model;

class ActiveRecord {
   // Base de Datos
   protected static $db;
   protected static $columnasDB = [];
   protected static $tabla = '';

   //validaciones
   protected static $errores = [];

   // Seteamos en la propiedad static $db la conexión de la base de datos, $database pasa la conexion
   // ya solo se la asignamos a $db
   public static function setDB($database) {
      self::$db = $database;
   }

   public function guardar() {
      if(!is_null($this->id)) {
         // Actualizand
         $this->actualizar();
      } else {
         // creando
         $this->crear();
      }
   }

   public function crear() {
      // Sanitizar los datos
      $atributos = $this->sanitizarAtributos();

      // inserta en la base de datos
      $query = "INSERT INTO " . static::$tabla . " ( ";
      $query.= join(', ', array_keys($atributos));
      $query.= " ) VALUES('";
      $query.= join("', '", array_values($atributos));
      $query.= "') ";

      // ejecutamos el query usando la propiedad statica $db que ta tiene seteada la conexion d ela DB
      $resultado = self::$db->query($query);

       if($resultado) {
         // redireccionar al usuario
         header('Location: /admin?resultado=1');
      }
   }

   public function actualizar() {
      // Sanitizar los datos
      $atributos = $this->sanitizarAtributos();

      $valores = [];
      foreach($atributos as $key => $value) {
         $valores[] = "$key='$value'";
      }

      // $query = "UPDATE propiedades SET titulo='". $atributos['titulo'] . "', precio='" . $atributos['precio'] . "', imagen='" . $atributos['imagen'] . "', descripcion='" . $atributos['descripcion'] . "', habitaciones='" . $atributos['habitaciones'] . "', wc='" . $atributos['wc'] . "', estacionamiento='" . $atributos['estacionamiento'] . "', creado='" . $atributos['creado'] . "', vendedores_Id='" . $atributos['vendedores_Id'] . "' WHERE id = " . self::$db->escape_string($this->id) . "  LIMIT 1";

      $query = "UPDATE " . static::$tabla . " SET ";
      $query.= join(' , ', $valores);
      $query.= " WHERE id = '" . self::$db->escape_string($this->id) . "'";
      $query.= " LIMIT 1";

      $resultado = self::$db->query($query);

      if($resultado) {
         $this->borrarImagen();

         // redireccionar al usuario
         header('Location: /admin?resultado=2');
      }
   }

   public function eliminar() {
      $query = "DELETE FROM " . static::$tabla . " WHERE id=" . self::$db->escape_string($this->id) . " LIMIT 1";
      $resultado = self::$db->query($query);

      if($resultado) {
         $this->borrarImagen();
         header('Location: /admin?resultado=3');
      }
   }

   // Identificar y unir los atributos de la DB
   public function atributos() {
      $atributos = [];
      foreach(static::$columnasDB as $columna) {
         if($columna === 'id') continue;
         $atributos[$columna] = $this->$columna;
      }
      return $atributos;
   }

   public function sanitizarAtributos() {
      $atributos = $this->atributos();
      $sanitizado = [];

      foreach($atributos as $key => $value) {
         $sanitizado[$key] = self::$db->escape_string($value);
      }
      return $sanitizado;
   }

   // subida de iamgenes
   public function setImagen($imagen) {
      // elimina la imagen previa
      // debug($this->imagen);   //debuguea el nombre de imagen previa

      // Verifica si hay id, si hay esta actualizando y elimina la iamgen previa
      if(!is_null($this->id)) {
         // comprobar si existe el archivo de la imagen en le servidor
         $this->borrarImagen();
      }

      //Asigna al atributo imagen el nombre d ela imagen
      if($imagen) {
         $this->imagen = $imagen;
      }
   }

   // eliminar una imagen del servidor
   public function borrarImagen() {

      // comprobar si existe el archivo d ela imagen en le servidor
      $existeArchivo = file_exists('../imagenes/' . $this->imagen);

      if($existeArchivo) {
         unlink('../imagenes/' . $this->imagen);
      }
   }

   // validaciones
   public static function getErrores(){
      return static::$errores;
   }

   public function validar() {
      static::$errores = [];
      return static::$errores;
   }

   // Lista todas las propiedades
   public static function all() {
      // $query = "SELECT * FROM propiedades";
      $query = "SELECT * FROM " . static::$tabla;

      // debug($query);

      $resultado = self::consultarSQL($query);

      return $resultado;
   }

   // Obtiene un determina numero de de regsitros
   public static function get($cantidad) {
      // $query = "SELECT * FROM propiedades";
      $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;

      // debug($query);

      $resultado = self::consultarSQL($query);

      return $resultado;
   }

   // Buscar un registro por ID
   public static function find($id) {
      $query = "SELECT * FROM " . static::$tabla . " WHERE id='$id'";
      $resultado = self::consultarSQL($query);

      // return $resultado;
       return array_shift($resultado);   //array_shift retorna el primer elemento d eun array
   }

   public static function consultarSQL($query) {
      // consultar la DB
      $res = self::$db->query($query);

      //Iterar los resultado
      $array = [];
      while($registro = $res->fetch_assoc()) {
         $array[] = static::crearObjeto($registro);
      }
      // liberar la memoria
      $res->free();

      //retornar los reusltados
      return $array;
   }

   protected static function crearObjeto($registro) {
      $objeto = new static;

      foreach($registro as $key => $value) {
         if(property_exists($objeto, $key)) {
            $objeto->$key = $value;
         }
      }
      return $objeto;
   }

   // Sincroniza el objeto en memoria con los cambios realizados por el usuario
   public function sincronizar($args = []) {
      foreach($args as $key => $value) {
         if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
         }
      }
   }

}
