<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

?>

<!DOCTYPE html>
<html>

<head>
<title>About</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php
    if (!empty($key)) {
    echo '<link rel="stylesheet" href="css/pagina_inicio.css" />';
    }
    ?>
    <script src="JavaScript/menu.js"></script> 
  <link rel="stylesheet" href="css/aboutstyle.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

  <section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/prueba.png" alt="logo" width="200"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
          if (empty($key)) {
          	echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="signup.html">Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="index.html">Login</a>
            </li>
          </ul>';
          }
          ?>
        </div>
      </div>
    </nav>
  </section>
  <?php
	if (!empty($key)) {
		echo '<section class="w3-threequarter w3-padding-large w3-right">
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';
            
            if ($key == 1) {
            	echo '<a href="pagina_inicio_e.php" class="center">Pagina de Inicio</a>';
            	echo '<a href="registro.php" class="center">Registrar</a>';
		echo '<a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>';
		echo '<a href="proyectos1.php" class="center">Proyectos</a>';
            }
            else if ($key == 2) {
            	echo '<a href="pagina_inicio_p.php" class="center">Pagina de Inicio</a>';
		echo '<a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>';
		echo '<a href="proyectos1.php" class="center">Proyectos</a>';
            }
            else if ($key == 3) {
            	echo '<a href="pagina_inicio_j.php" class="center">Pagina de Inicio</a>';
		echo '<a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>';
		echo '<a href="proyectos1.php" class="center">Proyectos</a>';
            }
            else {
            	echo '<a href="pagina_inicio_a.php" class="center">Pagina de Inicio</a>';
		echo '<a href="proyectos_admin.php" class="center">Proyectos</a>';
		echo '<a href="asignar_rol_admin_e.php" class="center">Asignar Rol</a>';
            }
            
            echo '<a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="left">&#9776; Menu</span>
	</div>
</section>';
	}
	?>
  <img class="image" src="images/borrego.png" width="10%" align="right" />
  <section class="about">
  
    <h1>About</h1>
    <iframe class="video" width="560" height="315" src="https://www.youtube.com/embed/E1fUpr9EA-Y"
      title="YouTube video player" frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      allowfullscreen></iframe>
    <p>En este evento podrás conocer muestras y exhibiciones de los proyectos más ingeniosos, innovadores y peculiares
      de estudiantes actuales de todas nuestras carreras de Ingeniería y Ciencias. También podrás participar en diversas
      actividades interactivas como las que se describen a continuación.</p>
  </section>
  <section class="about-tablas">
    <h2>Actividades y exhibiciones destacadas:</h2>
    <table align="center">
      <tr>
        <td>Proyectos NEXUS: Agua, energía y alimentos.</td>
        <td>Proyectos BIO: Bioprocesos, biología sintética,
          ingeniería metabólica, genómica, proteómica,
          transcriptómica, metabolómica, biosistemas agroalimentarios,
          alimentos.</td>
      </tr>
      <tr>
        <td>Proyectos CYBER: Desarrollo de software, ciberseguridad, IA,
          Data Science e IoT.</td>
        <td>Proyectos NANO: Sensores, materiales avanzados,
          biomedicina e ingeniería de tejidos</td>
      </tr>
    </table>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>
