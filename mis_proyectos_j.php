<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

$_SESSION["Record"] = null;

if ( $key!=1 and $key!=2 and $key!=3 and $key!=4) {
		header("Location: 404.html");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Mis Proyectos</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="JavaScript/menu.js"></script> 
   <link rel="stylesheet" href="css/autorizar.css">
</head>

<section id='steezy'>

<body>

<section class="w3-threequarter w3-padding-large w3-right">
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            
            <?php
            if ($key == 1) {
            	echo '<a href="pagina_inicio_e.php" class="center">Pagina de Inicio</a>';
            	echo '<a href="registro.php" class="center">Registrar</a>';
            }
            else if ($key == 2) {
            	echo '<a href="pagina_inicio_p.php" class="center">Pagina de Inicio</a>';
            }
            else if ($key == 3) {
            	echo '<a href="pagina_inicio_j.php" class="center">Pagina de Inicio</a>';
            }
            else {
            	echo '<a href="pagina_inicio_a.php" class="center">Pagina de Inicio</a>';
            }
            
            ?>
            
            <a href="proyectos1.php" class="center">Proyectos</a>
            <a href="about.php" class="center">About</a>
            <a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="left">&#9776; Menu</span>
	</div>
</section>

  <h1>Mis Proyectos</h1>

   <table>
    <thead>
      <tr>
        <td>
          <h1>Id del Proyecto</h1>
        </td>
        <td>
          <h3>Area Estrategica</h3>
        </td>
        <td>
          <h3>Unidad de Formacion</h3>
        </td>
        <td>
          <h3>Nivel de Desarrollo</h3>
        </td>
        <td>
          <h3>Nombre</h3>
        </td>
        <td>
          <h3>Autorizacion</h3>
        </td>
      </tr>
    </thead>

    <tbody>
  
  <?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	
								   	if ($key == 1) {
								   	$sql = 'SELECT * FROM R_Alumno NATURAL JOIN R_Alumno_Proyecto JOIN R_Proyecto NATURAL JOIN R_Area_Estrategica NATURAL JOIN R_Unidad_Formacion NATURAL JOIN R_Nivel_Desarrollo WHERE R_Alumno_Proyecto.Id_Proyecto = R_Proyecto.Id_Proyecto AND Matricula ="' . $user . '"';
								   	}
								   	else if ($key == 2) {
								   	$sql = 'SELECT * FROM R_Profesor NATURAL JOIN R_Proyecto NATURAL JOIN R_Area_Estrategica NATURAL JOIN R_Unidad_Formacion NATURAL JOIN R_Nivel_Desarrollo WHERE Nomina ="' . $user . '"';
								   	}
								   	else if ($key == 3) {
								   	$sql = 'SELECT * FROM R_Juez NATURAL JOIN R_Juez_Proyecto_Calif JOIN R_Proyecto NATURAL JOIN R_Area_Estrategica NATURAL JOIN R_Unidad_Formacion NATURAL JOIN R_Nivel_Desarrollo WHERE R_Juez_Proyecto_Calif.Id_Proyecto = R_Proyecto.Id_Proyecto AND Id_Juez ="' . $user . '" AND Autorizacion = 1';
								   	$rQ = $pdo->query($sql);
								   	$nQ = $rQ -> rowCount();
								   	if ($nQ == 0) {
								   	$sql = 'SELECT * FROM R_Profesor NATURAL JOIN R_Juez_Proyecto_Calif JOIN R_Proyecto NATURAL JOIN R_Area_Estrategica NATURAL JOIN R_Unidad_Formacion NATURAL JOIN R_Nivel_Desarrollo WHERE R_Juez_Proyecto_Calif.Id_Proyecto = R_Proyecto.Id_Proyecto AND R_Juez_Proyecto_Calif.Nomina ="' . $user . '" AND Autorizacion = 1';
								   	}
								   	}
								   	
								   	
				 				   	foreach ($pdo->query($sql) as $row) {
				 				   	echo '<tr>';
                                        				echo '<td>'. $row['Id_Proyecto'] . '</td>';
			    					   	echo '<td>'. $row['NombreAe'] . '</td>';
			    					   	echo '<td>'. $row['NombreUf'] . '</td>';
			    					  	echo '<td>'. $row['Nivel'] . '</td>';
                                        				echo '<td>'. $row['NombrePy'] . '</td>';
                                        				echo '<td>';    echo ($row['Autorizacion'])?"SI":"NO"; echo'</td>';
			                            		echo '<td width=150>';
			    					   	echo '<a class="btn" href="detalles.php?id='.$row['Id_Proyecto'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					   	
			    					   	if ($key == 1 and $row['Autorizacion'] == 0) {
			    					   	echo '<td width=150>';
			    					   	echo '<a class="btn btn-success" href="#?id='.$row['Id_Proyecto'].'">Actualizar</a>';
			    					   	echo '&nbsp;';
			    					   	}
			    					   	else if ($key == 2) {
			    					   	echo '<td width=150>';
			    					   	echo '<a class="btn btn-success" href="autorizar_py.php?id='.$row['Id_Proyecto'].'">Autorizar</a>';
			    					   	echo '&nbsp;';
			    					   	}
			    					   	else if ($key == 3) {
			    					   	echo '<td width=150>';
			    					  	echo '<a class="btn btn-success" href="calificar-j.php?id='.$row['Id_Proyecto'].'">Calificar</a>';
			    					  	echo '&nbsp;';
			    					  	}
			    					  	
			    					   	echo '</td>';
										  echo '</tr>';
								    }
								   	Database::disconnect();
				  				?>

 
</section>
  <script src="JavaScript/mis_proyectos_j.js"></script>
</body>
</html>
