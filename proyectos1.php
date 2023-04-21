<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Proyectos</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/proyectos1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>

<section class="w3-threequarter w3-padding-large w3-right"> <!--NO FUNCIONA BIEN EL SIDEBAR-->
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="pagina_inicio_e.php" class="center">Pagina de Inicio</a>
            <a href="registro.php" class="center">Registrar</a>
            <a href="#" class="center">Mis Proyectos</a> <!--FALTA CONECTAR ESTE BOTON-->
            <a href="#" class="center">Proyectos</a>
            <a href="about.html" class="center">About</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>

</section>

  <h2>Evento Actual</h2>
  <h1> Proyectos</h1>
  <section id="proyectos">
    <div class="row">
      <div class="proyectos-column col-lg-4 col-md-6" id="cartas">
        <div class="card" style="width: 18rem;">
          <img src="images/borrego.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nano</h5>
            <p class="card-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a href="proyecto2.php" class="btn btn-primary">Más</a>
          </div>
        </div>
      </div>
      <div class="proyectos-column col-lg-4 col-md-6" id="cartas">
        <div class="card" style="width: 18rem;">
          <img src="images/borrego.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Bio</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a href="proyecto2.php" class="btn btn-primary">Más</a>
          </div>
        </div>
      </div>
      <div class="proyectos-column col-lg-4 col-md-6" id="cartas">
        <div class="card" style="width: 18rem;">
          <img src="images/borrego.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nexus</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            <a href="proyecto2.php" class="btn btn-primary">Más</a>
          </div>
        </div>
      </div>
    </div>

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</body>

</html>
