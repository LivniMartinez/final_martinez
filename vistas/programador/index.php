<?php include_once '../../includes/header.php' ?>
<?php include_once '../../includes/navbar.php' ?>
<?php
require '../../modelos/Grados.php';
try {
    $app = new Grado($_GET);
    $Grados = $app->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>
<div class="container mt-5">
    <h1 class="text-center mt-3">REGISTRAR PROGRAMADORES</h1>
    <div class="row justify-content-center mt-2">
        <form action="/final_martinez/controladores/programadores/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
            <div class="form-group mb-3">
                <label for="prog_nombre" class="fs-5">Nombre:</label>
                <input type="text" class="form-control" name="prog_nombres" id="prog_nombres" required>
            </div>
            <div class="form-group mb-3">
                <label for="prog_apellidos" class="fs-5">Apellidos:</label>
                <input type="text" class="form-control" name="prog_apellidos" id="prog_apellidos" required>
            </div>
            <div class="form-group mb-3">
                <label for="prog_grados" class="fs-5">Grado:</label>
                <select class="form-select" name="prog_grado" id="prog_grado" required>
                    <option value="">Seleccionar grado</option>
                    <?php foreach ($Grados as $grado) : ?>
                        <option value="<?= $grado['GRA_ID'] ?>"><?= $grado['GRA_NOMBRE'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="prog_correo" class="fs-5">Correo:</label>
                <input type="email" class="form-control" name="prog_correo" id="prog_correo" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg ">Guardar</button>
            </div>
        </form>
    </div>
</div>
<?php include_once '../../includes/footer.php' ?>
