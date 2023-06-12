<?php
require_once 'Conexion.php';

class Asignar extends Conexion {
    public $asig_id;
    public $asig_programador;
    public $asig_app;
    public $asig_sit;

    public function __construct($args = []) {
        $this->asig_id = $args['asig_id'] ?? null;
        $this->asig_programador = $args['asig_programador'] ?? '';
        $this->asig_app = $args['asig_app'] ?? '';
        $this->asig_sit = $args['asig_sit'] ?? 1;
    }

    public function guardar() {
        $sql = "INSERT INTO asig_programador(asig_programador, asig_app, asig_sit) 
                VALUES ('$this->asig_programador', '$this->asig_app', '$this->asig_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
        $sql = "SELECT asig_id, asig_programador, asig_app, asig_sit FROM asig_programador";

        if ($this->asig_id != null) {
            $sql .= " WHERE asig_id = $this->asig_id";
        }

        if ($this->asig_programador != '') {
            $sql .= " AND asig_programador LIKE '%$this->asig_programador%'";
        }

        if ($this->asig_app != '') {
            $sql .= " AND asig_app LIKE '%$this->asig_app%'";
        }

        if ($this->asig_sit != '') {
            $sql .= " AND asig_sit = '$this->asig_sit'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar() {
        $sql = "UPDATE asig_programador 
                SET asig_programador = '$this->asig_programador', asig_app = '$this->asig_app', 
                    asig_sit = '$this->asig_sit' 
                WHERE asig_id = $this->asig_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar() {
        $sql = "DELETE FROM asig_programador WHERE asig_id = $this->asig_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
