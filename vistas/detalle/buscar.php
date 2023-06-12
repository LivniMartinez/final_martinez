<?php
include_once '../../includes/header.php';
include_once '../../includes/navbar.php';

require '../../modelos/Aplicacion.php';
require '../../modelos/Asignar.php';
require '../../modelos/Tareas.php';

// Obtener el nombre de la aplicación
//var_dump($_REQUEST);
try {
    $app_id = $_REQUEST['tar_id'] ?? null;
    $app = new Aplicacion(['app_id' => $app_id]);
    //var_dump($app);
    $apps = $app->buscarapp();
  
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

// Obtener el nombre del programador
try {
    $asig_app = $_REQUEST['tar_id'] ?? null;
    $nombre = new Asignar(['asig_app' => $asig_app]);

    $nombres = $nombre->buscarnom();
   // var_dump($nombres);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

// Obtener las tareas y calcular el porcentaje de trabajo realizado
try {
    $tar_app = $_REQUEST['tar_id'] ?? null;
    $tarea = new Tareas(['tar_app' => $tar_app]);
    $tare = $tarea->buscartar();

    $totalTareas = count($tare);
    $totalFinalizadas = 0;
    foreach ($tare as $tar) {
        if ($tar['TAR_ESTADO'] == 3) {
            $totalFinalizadas++;
        }
    }
    $porcentajeTrabajoRealizado = ($totalFinalizadas / $totalTareas) * 100;
  
    if (is_nan($porcentajeTrabajoRealizado)){
       $porcentajeTrabajoRealizado = floatval("0.00");
    }
   // var_dump($porcentajeTrabajoRealizado);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
mir awts
<body>
    <div class="container border bg-light py-4 mt-4">
        <h1 class="mt-4">Detalle de Aplicación</h1>

        <div class="row mt-4">
            <div class="col">
                <h5>Nombre de Aplicación:</h5>
                <input type="text" class="form-control" value="<?= $apps[0]['APP_NOMBRE'] ?>" readonly>
            </div>
            <div class="col">
                <h5>Programador:</h5>
                <input type="text" class="form-control" value="<?= $nombres[0]['NOMBRE'] ?>" readonly>
            </div>
        </div>

        <h5 class="mt-4">Tareas:</h5>
        <table class="table table-bordered mt-2">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col" class="text-center">Número</th>
            <th scope="col" class="text-center">Nombre</th>
            <th scope="col" class="text-center">Fecha</th>
            <th scope="col" class="text-center">Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($tare) > 0) : ?>
            <?php foreach ($tare as $key => $tar) : ?>
                <tr>
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td class="text-center"><?= $tar['TAR_DESCRIPCION'] ?></td>
                    <td class="text-center"><?= $tar['TAR_FECHA'] ?></td>
                    <td class="text-center">
                        <?php
                        $estado = "";
                        $estadoClass = "";
                        switch ($tar['TAR_ESTADO']) {
                            case 1:
                                $estado = "NO INICIADA";
                                $estadoClass = "bg-danger";
                                break;
                            case 2:
                                $estado = "EN PROCESO";
                                $estadoClass = "bg-warning";
                                break;
                            case 3:
                                $estado = "FINALIZADA";
                                $estadoClass = "bg-success";
                                break;
                        }
                        ?>
                        <span class="badge <?= $estadoClass ?>"><?= $estado ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4" class="text-center">No hay tareas disponibles</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


        <div class="row">
    <div class="col">
        <h5>Porcentaje de trabajo realizado:</h5>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: <?= number_format($porcentajeTrabajoRealizado, 2) ?>%;" aria-valuenow="<?= number_format($porcentajeTrabajoRealizado, 2) ?>" aria-valuemin="0" aria-valuemax="100"><?= number_format($porcentajeTrabajoRealizado, 2) ?>%</div>
        </div>
    </div>
</div>


    <?php include_once '../../includes/footer.php' ?>
</body>
