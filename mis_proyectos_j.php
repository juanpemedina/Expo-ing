<?php
session_start();
$id = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/autorizar.css">
</head>

<section id='steezy'>

<body>

<section class="w3-threequarter w3-padding-large w3-right"> <!--NO FUNCIONA BIEN EL SIDEBAR-->
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="pagina_inicio_j.php" class="center">Pagina de Inicio</a>
            <a href="#" class="center">Mis Proyectos</a> 
            <a href="proyectos1.php" class="center">Proyectos</a> 
            <a href="about.html" class="center">About</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>

<section>
  <h1>Projects</h1>

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
								   	
								   	if ($id == 1) {
								   	$sql = 'SELECT * FROM R_Alumno NATURAL JOIN R_Alumno_Proyecto JOIN R_Proyecto NATURAL JOIN R_Area_Estrategica NATURAL JOIN R_Unidad_Formacion NATURAL JOIN R_Nivel_Desarrollo WHERE R_Alumno_Proyecto.Id_Proyecto = R_Proyecto.Id_Proyecto AND Matricula ="' . $user . '"';
								   	}
								   	else if ($id == 2) {
								   	$sql = 'SELECT * FROM R_Profesor NATURAL JOIN R_Proyecto NATURAL JOIN R_Area_Estrategica NATURAL JOIN R_Unidad_Formacion NATURAL JOIN R_Nivel_Desarrollo WHERE Nomina ="' . $user . '"';
								   	}
								   	else if ($id == 3) {
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
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="detalles.php?id='.$row['Id_Proyecto'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					   	
			    					   	if ($id == 2) {
			    					   	echo '<a class="btn btn-success" href="autorizar_py.php?id='.$row['Id_Proyecto'].'">Autorizar</a>';
			    					   	echo '&nbsp;';
			    					   	}
			    					   	else if ($id == 3) {
			    					  	echo '<a class="btn btn-success" href="calificar-j.php?id='.$row['Id_Proyecto'].'">Calificar</a>';
			    					  	echo '&nbsp;';
			    					  	}
			    					  	
			    					   	echo '</td>';
										  echo '</tr>';
								    }
								   	Database::disconnect();
				  				?>

  <!-- Modal 
  <div id="preview" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <img id="img" src="">
      <div id="details">
        <h3 id="title"></h3>
        <p id="info">Some text</p>
        <div class="button" id="live">Calificar</div>
      </div>
    </div>
  </div> -->
</section>
  <script src="JavaScript/mis_proyectos_j.js"></script>
</body>
</html>
