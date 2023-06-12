<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $prog_id;
    public $prog_correo;
    public $prog_grado;
    public $prog_nombreS;
    public $prog_apellidoS;
    public $prog_sit;


    public function __construct($args = [] )
    {
        $this->prog_id = $args['prog_id'] ?? null;
        $this->prog_correo = $args['prog_correo'] ?? '';
        $this->prog_grado = $args['prog_grado'] ?? '';
        $this->prog_nombreS = $args['prog_nombreS'] ?? '';
        $this->prog_apellidoS = $args['prog_apellidoS'] ?? '';
        $this->prog_sit = $args['prog_sit'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO programadores(prog_correo,prog_grado, prog_nombreS, prog_apellidoS, prog_sit) VALUES ('$this->prog_correo','$this->prog_grado','$this->prog_nombreS''$this->prog_apellidoS','$this->prog_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM programadores WHERE prog_sit = 1";

        if($this->prog_correo != ''){
            $sql .= " AND prog_correo LIKE '%$this->prog_correo%'";
        }

        if($this->prog_grado != ''){
            $sql .= " AND prog_grado LIKE '%$this->prog_grado%'";
        }

        if($this->prog_nombreS != ''){
            $sql .= " AND prog_nombreS LIKE '%$this->prog_nombreS%'";
        }

        if($this->prog_apellidoS != ''){
            $sql .= " AND prog_apellidoS LIKE '%$this->prog_apellidoS%'";
        }

        if($this->prog_sit != ''){
            $sql .= " AND prog_sit = '$this->prog_sit'";
        }

        if($this->prog_id != null){
            $sql .= " AND prog_id = $this->prog_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE programadores SET prog_correo = '$this->prog_correo', prog_grado = '$this->prog_grado', prog_nombreS = '$this->prog_nombreS', prog_apelllidoS = '$this->prog_apelllidoS', prog_sit = '$this->prog_sit' WHERE prog_id = $this->prog_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM programadores WHERE prog_id = $this->prog_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}