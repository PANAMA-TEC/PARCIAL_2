<?php
// Archivo: clases.php

class Tarea {
    public $id;
    public $titulo;
    public $descripcion;
    public $estado;
    public $prioridad;
    public $fechaCreacion;
    public $tipo;

    public function __construct($datos) {
        foreach ($datos as $key => $value) {
            $this->$key = $value;
        }
    }

    // Implementar estos getters
    // public function getEstado() { }
    // public function getPrioridad() { }
}

class GestorTareas {
    private $tareas = [];

    public function cargarTareas() {
        $json = file_get_contents('tareas.json');
        $data = json_decode($json, true);
        foreach ($data as $tareaData) {
            $tarea = new Tarea($tareaData);
            $this->tareas[] = $tarea;
        }
        
        return $this->tareas;
    }


    public function agregarTarea($tarea) {

    }

    public function eliminarTarea($id)  {

    }

    public function actualizarTarea($tarea)  {

    }

    public function actualizarEstadoTarea($id, $nuevoEstado)  {

    }

    public function buscarTareasPorEstado($estado)  {

    }

    public function listarTareas($filtroEstado = '')  {
        
    }
}

class TareaDesarrollo extends Tarea{

    private $lenguajeProgramacion = '';

    public function obtenerDetallesEspecificos() {

    }



}



class TareaDiseno extends Tarea{

    private $herramientaDiseno = '';

    public function obtenerDetallesEspecificos() {

    }
    
}


class TareaTesting extends Tarea{
    
   private $tipoTesr = '' ;

  public function obtenerDetallesEspecificos() {

  }
}
// Implementar:
// 1. La interfaz Detalle
// 2. Modificar la clase Tarea para implementar la interfaz Detalle
// 3. Las clases TareaDesarrollo, TareaDiseno y TareaTesting que hereden de Tarea