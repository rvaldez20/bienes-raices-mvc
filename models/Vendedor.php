<?php

namespace Model;

class Vendedor extends ActiveRecord {

   //! ========= PROPIEDADES PARA DB =============
   protected static $tabla = 'vendedores';
   protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

   //! ========= PROPIEDADES =============
   public $id;
   public $nombre;
   public $apellido;
   public $telefono;

   //! ========= METHOD CONSTRUCTOR =============
   public function __construct($args = []){
      $this->id = $args['id'] ?? null;
      $this->nombre = $args['nombre'] ?? '';
      $this->apellido = $args['apellido'] ?? '';
      $this->telefono = $args['telefono'] ?? '';
   }

    //! ========= METHOD VALIDAR =============
   public function validar() {
      // validamos que se ingrese información en cada campo
      if(!$this->nombre) {
         self::$errores[] = "El Nombre es Obligatorio";
      }

      if(!$this->apellido) {
         self::$errores[] = "El Apellido es Obligatorio";
      }

      if(!$this->telefono) {
         self::$errores[] = "El Teléfono es Obligatorio";
      }

      if(!preg_match('/[0-9]{10}/', $this->telefono)) {
         self::$errores[] = "Formato no Valido";
      }

      return self::$errores;
   }
}
