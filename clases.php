<?php
    
  abstract class Entrada implements Detalle{
        public $id;
        public $fecha_creacion;
        public $tipo;
        public $titulo;
        public $descripcion;

        public function __construct($datos = []) {
            foreach ($datos as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }



  class EntradaUnaColumna extends Entrada{
      public $titulo;
      public $descripcion;

      public function obtenerDetallesEspecificos(): string {

          return "Entrada de una columna: " .$titulo;

      }
  }



    interface Detalle{

        public function obtenerDetallesEspecificos(): string {

        }

    }

    class GestorBlog {
        private $entradas = [];

        public function cargarEntradas() {
            if (file_exists('blog.json')) {
                $json = file_get_contents('blog.json');
                $data = json_decode($json, true);
                foreach ($data as $entradaData) {
                    $this->entradas[] = new Entrada($entradaData);
                }
            }
        }
    }



    public function guardarEntradas() {
        $data = array_map(function($entrada) {
            return get_object_vars($entrada);
        }, $this->entradas);
        file_put_contents('blog.json', json_encode($data, JSON_PRETTY_PRINT));
    }

    public function editarEntradas(Entrada $entrada) {
        return $this->entradas;
    }

    public function obtenerEntradas() {
        return $this->entradas;
    }




  class EntradaDosColumnas extends Entrada {
      $titulo1 = "";
      $descripcion1 = "";
      $titulo2 = "";
      $descripcion2 = "";

      public function obtenerDetallesEspecificos(): string {

          return "Entrada de dos columnas: " .$titulo1. " ".$titulo2;

      }
  }

  class EntradaTresColumnas extends Entrada {
      $titulo1 = "";
      $descripcion1 = "";
      $titulo2 = "";
      $descripcion2 = "";
      $titulo3 = "";
      $descripcion3 = "";

      public function obtenerDetallesEspecificos(): string {

          return "Entrada de tres columnas: " .$titulo1. " ".$titulo2." ".$titulo3 ;

      }
  }


?>

