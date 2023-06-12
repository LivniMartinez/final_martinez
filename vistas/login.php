<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleloginemb.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<center><body>
<!-- Contenedor formulario -->
<section class="text-center"></section>
   <div class="container py-3">
     <div class="row g-0 align-items-center">
       <div class="col-lg-6 mb-5 mb-lg-0">
         <div class="card cascading-right" style="background: hsla(188, 61%, 64%, 0.462);
             backdrop-filter: blur(20px);">
           <div class="card-body p-5 shadow-5 text-center">
             <h2 class="fw-bold mb-5">Control de Aplicaciones Comando de Informática y Tecnología</h2>
             <form>
               <!-- El formulario para registrarse -->
               <div class="row">
                  <!-- nombre input -->
                 <div class="col-md-6 mb-4">
                   <div class="form-outline">
                     <input type="text" id="name" class="form-control" required />
                     <label class="form-label" for="Name" >Nombres</label>
                   </div>
                 </div>
                   <!-- apellido input -->
                 <div class="col-md-6 mb-4">
                   <div class="form-outline">
                     <input type="text" id="Apellido" class="form-control" required />
                     <label class="form-label" for="Apellidos">Apellidos</label>
                   </div>
                 </div>
               </div>
 
               <!-- catalogo input -->
               <div class="form-outline mb-4">
                 <input type="number" id="number" class="form-control" required/>
                 <label class="form-label" for="email">Catálogo</label>
               </div>
 
               <!-- Contraseña input -->
               <div class="form-outline mb-4">
                 <input type="password" id="password" class="form-control" required />
                 <label class="form-label" for="password">Contraseña</label>
               </div>
               <!-- Redireccion al Inicio -->
               <a href="/final_martinez/vistas/grados/index.php" class="btn btn-primary btn-block mb-4" >Ingresar</a>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- Section: Design Block -->
      <section>
        <div class="text-center py-4 px-4 bg-black-50">
          <!-- Copyright -->
          <div class="text-center text-white mb-3"> 
            Copyright © 2023. Todos los derechos son reservados, creado por Livni Martinez.
          </div>
      </section>
</center></body>
</html>
<?php include_once '../../includes/footer.php'?>