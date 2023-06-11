<?php
require '../../modelos/Grados.php';

  
if($_POST['gra_nombre'] != '' ){


    try {
        $grado = new Grado($_POST);
      //  var_dump($grado);
        $resultado = $grado->guardar();
        $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Debe llenar todos los datos";
}


?>