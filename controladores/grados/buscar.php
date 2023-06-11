<?php
require '../../modelos/Grados.php';
try {
  
    $grado = new Grado($_GET);
    // var_dump($grado);
    // exit;
    
    $grados = $grado->buscar();
    // echo "<pre>";
    // var_dump($grados);
    // echo "</pre>";
    // exit;
    // $error = "NO se guardó correctamente";
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>