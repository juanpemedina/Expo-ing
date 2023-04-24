<?php
	session_start();
	$id = $_SESSION["TipoUsuario"];
	$user = $_SESSION["Usuario"];
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
            
            <?php
            if ($id == 1) {
            	echo '<a href="pagina_inicio_e.php" class="center">Pagina de Inicio</a>';
            	echo '<a href="registro.php" class="center">Registrar</a>';
            	echo '"mis_proyectos_j.php" class="center">Mis Proyectos</a>';
            }
            else if ($id == 2) {
            	echo '<a href="pagina_inicio_p.php" class="center">Pagina de Inicio</a>';
            	echo '<a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>';
            }
            else if ($id == 3) {
            	echo '<a href="pagina_inicio_j.php" class="center">Pagina de Inicio</a>';
            	echo '<a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>';
            }
            else {
            	echo '<a href="pagina_inicio_a.php" class="center">Pagina de Inicio</a>';
            }
            
            ?>
            
            <a href="#" class="center">Proyectos</a>
            <a href="about.html" class="center">About</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>

</section>

  <h2>Evento Actual</h2>
  <h1> Proyectos</h1>
  <section id="proyectos">
  
  <?php
								   
	
								   	include 'database.php';			   
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Area_Estrategica';
								   	echo '<div class="row">';
				 				   	foreach ($pdo->query($sql) as $row) {
				 				   	echo '<div class="proyectos-column col-lg-4 col-md-6" id="cartas">';
				 				   	echo '<div class="card" style="width: 18rem;">';
									echo '<img src="images/borrego.png" class="card-img-top" alt="...">';
								        echo '<div class="card-body">';
								        echo '<h5 class="card-title">' . $row['NombreAe'] . '</h5>';
								        echo '<p class="card-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>';
								        echo '<a class="btn btn-primary" href="todosproyectos.php?idA='.$row['Id_Area'].'">Más</a>';
			    					   	echo '&nbsp;';
								        echo '</div>';
									echo '</div>';
     						 			echo '</div>';	
     						 		 			
     								    }
     								    	echo '</div>';
								   	Database::disconnect();
				  				?>
 

  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

</body>

</html>
