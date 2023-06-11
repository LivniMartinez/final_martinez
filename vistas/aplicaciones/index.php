<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
<div class="container mt-5">
  <h1 class="text-center mt-3">APLICACIONES</h1>
  <div class="row justify-content-center mt-2">
    <form action="/final_martinez/controladores/aplicacion/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
      <div class="row mb-3">
        <div class="col">
          <label for="apli" class="form-label">Ingrese una aplicacion</label>
          <input type="text" name="app_nombre" id="app_nombre" class="form-control" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php include_once '../../includes/footer.php'?>