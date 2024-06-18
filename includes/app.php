<?php

// Cargamos las funciones | la conexión a la DB | el autoload
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Nos Conectarnos a la DB
$db = conectarDB();

// dismponemos de los objetos
use Model\ActiveRecord;

// ejecutamos el metodo que setea la conexion a la base datos
ActiveRecord::setDB($db);
