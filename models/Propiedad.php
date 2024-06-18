<?php

namespace Model;

class Propiedad extends ActiveRecord {

   //! ========= PROPIEDADES PARA DB =============
   protected static $tabla = 'propiedades';
   protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_Id'];

   //! ========= PROPIEDADES =============
   public $id;
   public $titulo;
   public $precio;
   public $imagen;
   public $descripcion;
   public $habitaciones;
   public $wc;
   public $estacionamiento;
   public $creado;
   public $vendedores_Id;

   //! ========= METHOD CONSTRUCTOR =============
   public function __construct($args = []){
      $this->id = $args['id'] ?? null;
      $this->titulo = $args['titulo'] ?? '';
      $this->precio = $args['precio'] ?? '';
      $this->imagen = $args['imagen'] ?? '';
      $this->descripcion = $args['descripcion'] ?? '';
      $this->habitaciones = $args['habitaciones'] ?? '';
      $this->wc = $args['wc'] ?? '';
      $this->estacionamiento = $args['estacionamiento'] ?? '';
      $this->creado = date('Y/m/d');
      $this->vendedores_Id = $args['vendedores_Id'] ?? '';
   }

   //! ========= METHOD VALIDAR =============
   public function validar() {
      // validamos que se ingrese información en cada campo
      if(!$this->titulo) {
         self::$errores[] = "Debes ingresar un titulo";
      }

      if(!$this->precio) {
         self::$errores[] = "El precio es requerido";
      }

      if(strlen($this->descripcion) < 50) {
         self::$errores[] = "La descripción es requerida y debe tener al menos 50 caractres";
      }

      if(!$this->habitaciones) {
         self::$errores[] = "El número de habitaciones es obligatorio";
      }

      if(!$this->wc) {
         self::$errores[] = "El número de baños es obligatorio";
      }

      if(!$this->estacionamiento) {
         self::$errores[] = "El número de lugares de estacionamiento es obligatorio";
      }

      if(!$this->vendedores_Id) {
         self::$errores[] = "Es necesario elegir un vendedor";
      }

      if(!$this->imagen) {
         self::$errores[] = "La imagen es obligatoria";
      }
      return self::$errores;
   }
}
