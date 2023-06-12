<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $app_id;
    public $app_nombre;
    public $app_estado;


    public function __construct($args = [] )
    {
        $this->app_id = $args['app_id'] ?? null;
        $this->app_nombre = $args['app_nombre'] ?? '';
        $this->app_estado = $args['app_estado'] ?? 1;
    }

    public function guardar(){
        $sql = "INSERT INTO aplicaciones(app_nombre, app_estado) VALUES ('$this->app_nombre','$this->app_estado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM aplicaciones WHERE app_estado = 1";

        if($this->app_nombre != ''){
            $sql .= " AND app_nombre LIKE '%$this->app_nombre%'";
        }

        if($this->app_estado != ''){
            $sql .= " AND app_estado = '$this->app_estado'";
        }

        if($this->app_id != null){
            $sql .= " AND app_id = $this->app_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscart(){
        $sql = "SELECT * FROM aplicaciones WHERE app_estado in (1,2,3,4,5)";

        if($this->app_nombre != ''){
            $sql .= " AND app_nombre LIKE '%$this->app_nombre%'";
        }

            if($this->app_id != null){
            $sql .= " AND app_id = $this->app_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarapp(){
        $sql = "SELECT * FROM aplicaciones WHERE app_estado in (1,2,3,4,5) AND app_id = $this->app_id";



        $resultado = self::servir($sql);
        return $resultado;
    }





    public function modificar(){
        $sql = "UPDATE aplicaciones SET app_nombre = '$this->app_nombre', app_estado = '$this->app_estado' WHERE app_id = $this->app_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }



    
    public function modificar2(){
        $sql = "UPDATE aplicaciones SET  app_estado = '$this->app_estado' WHERE app_id = $this->app_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM aplicaciones WHERE app_id = $this->app_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
