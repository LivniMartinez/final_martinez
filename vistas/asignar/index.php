<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<?php
require '../../modelos/Aplicacion.php';
require '../../modelos/Programadores.php';
    try {
      
        $app = new Aplicacion();
        
        $Aplicacion = $app->buscar();
     //var_dump($Aplicacion);
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }


try {
  
    $progra = new Programadores();
 
    
    $progras = $progra->buscar();
    //var_dump($progras);

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>

<div class="container mt-5">
  <h1 class="text-center mt-3">ASIGNACIÓN DE TAREAS</h1>
  <div class="row justify-content-center mt-2">
    <form action="/final_martinez/controladores/asignar/guardar.php" method="POST" class="border border-primary rounded p-3 bg-light col-md-6">
      <div class="form-group">
        <label for="aplicacion">Seleccione una aplicación:</label>
        <select class="form-select" name="asig_app" id="asig_app" required>
          <option value="">Seleccionar aplicación</option>
          <?php foreach ($Aplicacion as $apps) { ?>
            <option value="<?php echo $apps['APP_ID']; ?>"><?php echo $apps['APP_NOMBRE']; ?></option>
          
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="aplicacion">Seleccione un programador</label>
        <select class="form-select" name="asig_programador" id="asig_programador" required>
          <option value="">Seleccionar..</option>
          <?php foreach ($progras as $apps) { ?>
            <option value="<?php echo $apps['PROG_ID']; ?>"><?php echo $apps['NOMBRE']; ?></option>
          <?php } ?>
        </select>
      </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
    </form>
  </div>
</div>


<?php include_once '../../includes/footer.php'?>