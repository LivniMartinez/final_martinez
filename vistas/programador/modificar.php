<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>

<?php
require '../../modelos/Programadores.php';
require '../../modelos/Grados.php';

try {
    $tarea = new Programadores($_GET);
    $Programadores = $tarea->buscar2();
   //var_dump($Programadores);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

try {      
    $app = new Grado();
    $Grados = $app->buscar();
    //var_dump($Grados);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}
?>
si

<div class="container mt-5">
    <h1 class="text-center mt-3">Formulario para modificar el Programador</h1>
    <div class="row justify-content-center mt-2">
        <form action="/final_martinez/controladores/programadores/modificar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="prog_nombre" class="fs-5">Nombres:</label>
                <input type="hidden" class="form-control" name="prog_id" id="prog_id" value="<?= $Programadores[0]['PROG_ID'] ?? '' ?>" required>
                <input type="text" class="form-control" name="prog_nombres" id="prog_nombres" value="<?= $Programadores[0]['PROG_NOMBRES'] ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="prog_apellidos" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="prog_apellidos" id="prog_apellidos" value="<?= $Programadores[0]['PROG_APELLIDOS']  ?? '' ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="prog_grados" class="fs-5">Grado:</label>
                <select class="form-select" name="prog_grado" id="prog_grado" required>
                    <option value="">Seleccionar grado</option>
                    <?php foreach ($Grados as $grado) : ?>
                        <option value="<?= $grado['GRA_ID'] ?>" <?= ($Programadores[0]['PROG_GRADO'] ?? '') == $grado['GRA_ID'] ? 'selected' : '' ?>>
                            <?= $grado['GRA_NOMBRE'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="prog_correo" class="fs-5">Correo:</label>
                <input type="email" class="form-control" name="prog_correo" id="prog_correo" value="<?= $Programadores[0]['PROG_CORREO'] ?? '' ?>" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
            </div>
        </form>
    </div>
</div>

<?php include_once '../../includes/footer.php' ?>
