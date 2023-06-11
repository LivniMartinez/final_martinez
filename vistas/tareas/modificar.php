<?php
require '../../modelos/Grados.php';
    try {
      
        $grado = new Grado($_GET);
        
        $grados = $grado->buscar();
        var_dump($grados);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar grados</h1>
        <div class="row justify-content-center">
            <form action="/final_martinez/controladores/grados/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="gra_id" value="<?= $grados[0]['GRA_ID'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="gra_nombre">Nombre de la Tarea</label>
                        <input type="text" name="gra_nombre" id="gra_nombre" value="<?= $grados[0]['GRA_NOMBRE'] ?>" class="form-control" required>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>