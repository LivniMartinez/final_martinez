<?php
include_once '../../includes/header.php';
include_once '../../includes/navbar.php';

require '../../modelos/Aplicacion.php';

try {
    $tarea = new Aplicacion($_GET);
    $tareas = $tarea->buscarT();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>

<body>
    <div class="container border bg-light py-4 mt-4">
        <h1 class="mt-4">Detalle de Aplicación</h1>

        <div class="row mt-4">
            <div class="col">
                <h5>Nombre de Aplicación:</h5>
                <input type="text" class="form-control">
            </div>
            <div class="col">
                <h5>Programador:</h5>
                <input type="text" class="form-control">
            </div>
        </div>

        <h5 class="mt-4">Tareas:</h5>

        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($tareas) > 0) : ?>
                    <?php foreach ($tareas as $key => $tar) : ?>
                        <tr>
                            <td><?= $tar['nombre_tarea'] ?></td>
                            <td><?= $tar['fecha_tarea'] ?></td>
                            <td><?= $tar['estado_tarea'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3">No hay tareas disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <div class="row">
            <div class="col">
                <h5>Porcentaje de trabajo realizado:</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once '../../includes/footer.php' ?>
</body>

