<?php
require_once 'Conexion.php';

class Programadores extends Conexion {
    public $prog_id;
    public $prog_correo;
    public $prog_grado;
    public $prog_nombres;
    public $prog_apellidos;
    public $prog_sit;

    public function __construct($args = []) {
        $this->prog_id = $args['prog_id'] ?? null;
        $this->prog_correo = $args['prog_correo'] ?? '';
        $this->prog_grado = $args['prog_grado'] ?? '';
        $this->prog_nombres = $args['prog_nombres'] ?? '';
        $this->prog_apellidos = $args['prog_apellidos'] ?? '';
        $this->prog_sit = $args['prog_sit'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO programadores(prog_correo, prog_grado, prog_nombres, prog_apellidos, prog_sit) 
                VALUES ('$this->prog_correo', '$this->prog_grado', '$this->prog_nombres', '$this->prog_apellidos', '$this->prog_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "SELECT prog_id, prog_correo, gra_nombre || ' ' || prog_nombres || ' ' || prog_apellidos AS nombre
        FROM programadores INNER JOIN grados on gra_id= prog_grado";

        if ($this->prog_id != null) {
            $sql .= " AND prog_id = $this->prog_id";
        }

        if ($this->prog_correo != '') {
            $sql .= " AND prog_correo LIKE '%$this->prog_correo%'";
        }

        if ($this->prog_grado != '') {
            $sql .= " AND prog_grado LIKE '%$this->prog_grado%'";
        }

        if ($this->prog_nombres != '') {
            $sql .= " AND prog_nombres LIKE '%$this->prog_nombres%'";
        }

        if ($this->prog_apellidos != '') {
            $sql .= " AND prog_apellidos LIKE '%$this->prog_apellidos%'";
        }

        if ($this->prog_sit != '') {
            $sql .= " AND prog_sit = '$this->prog_sit'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar2() {
        $sql = "SELECT *
        FROM programadores INNER JOIN grados on gra_id= prog_grado";

        if ($this->prog_id != null) {
            $sql .= " AND prog_id = $this->prog_id";
        }

        if ($this->prog_correo != '') {
            $sql .= " AND prog_correo LIKE '%$this->prog_correo%'";
        }

        if ($this->prog_grado != '') {
            $sql .= " AND prog_grado LIKE '%$this->prog_grado%'";
        }

        if ($this->prog_nombres != '') {
            $sql .= " AND prog_nombres LIKE '%$this->prog_nombres%'";
        }

        if ($this->prog_apellidos != '') {
            $sql .= " AND prog_apellidos LIKE '%$this->prog_apellidos%'";
        }

        if ($this->prog_sit != '') {
            $sql .= " AND prog_sit = '$this->prog_sit'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function modificar() {
        $sql = "UPDATE programadores 
                SET prog_correo = '$this->prog_correo', prog_grado = '$this->prog_grado', 
                    prog_nombres = '$this->prog_nombres', prog_apellidos = '$this->prog_apellidos', 
                    prog_sit = '$this->prog_sit' 
                WHERE prog_id = $this->prog_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM programadores WHERE prog_id = $this->prog_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
