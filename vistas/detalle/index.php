<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php

require '../../modelos/Aplicacion.php';
try {
  
    $tarea = new Aplicacion($_GET);
 
    
    $tareas = $tarea->buscarT();
//var_dump($tareas);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>APLICACIÓN</th>
                            <th>VER</th>
                          
                        </tr>
                    </thead>
                    <tbody>
    <?php if (count($tareas) > 0) : ?>
        <?php foreach ($tareas as $key => $tar) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $tar['APP_NOMBRE'] ?></td>
                <td>
                    <?php if ($tar['APP_ESTADO'] == 2) { ?>
                        <a class="btn btn-warning w-75%" href="/final_martinez/vistas/detalle/buscar.php?tar_id=<?= $tar['APP_ID'] ?>"> ver</a>
                    <?php } else { ?>
                        no asignada aún
                    <?php } ?>
                </td>
                
            </tr>
        <?php endforeach ?>
    <?php else : ?>
        <tr>
            <td colspan="4">NO EXISTEN REGISTROS</td>
        </tr>
    <?php endif ?>
</tbody>

                </table>
            </div>
        </div>
      
    </div>
</body>
</html>
<?php include_once '../../includes/footer.php'?>