<?php
session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

if ( $key!=1 and $key!=2 and $key!=3 and $key!=4) {
		header("Location: 404.html");
	}

	$idA = null;
	if ( !empty($_GET['idA'])) {
		$idA = $_REQUEST['idA'];
		$_SESSION["Record"] = $idA;
	}
	if ( $idA==null) {
		header("Location: 404.html");
	}

?>

<!DOCTYPE html>
<html>

<head>
<title>Proyectos por Area</title>
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
            
            <a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>
            <a href="about.php" class="center">About</a>
            <a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="left">&#9776; Menu</span>
	</div>
</section>
	
<section>
  <h1>Proyectos del Evento</h1>

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
      </tr>
    </thead>

    <tbody>
        <?php
								   	include 'database.php';
	    								$pdo = Database::connect();
									$sql = 'SELECT * FROM R_Proyecto natural join R_Edicion natural join R_Area_Estrategica natural join R_Unidad_Formacion natural join R_Nivel_Desarrollo where Id_Area = ' . $idA . ' AND Autorizacion = 1';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
                                        echo '<td>'. $row['Id_Proyecto'] . '</td>';
			    					   	echo '<td>'. $row['NombreAe'] . '</td>';
			    					   	echo '<td>'. $row['NombreUf'] . '</td>';
			    					  	echo '<td>'. $row['Nivel'] . '</td>';
                                        echo '<td>'. $row['NombrePy'] . '</td>';
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="detalles.php?id='.$row['Id_Proyecto']. '">Detalles</a>';
			    					   	echo '&nbsp;';
			    					   	echo '&nbsp;';
			    					   	echo '</td>';
										  echo '</tr>';
								    }
								   	Database::disconnect();
				  				?>
    </tbody>
      
   </table>
   
   <div class="form-actions">
						<a class="btn" href="proyectos1.php">Regresar</a>
					</div>

</section>
  <script src="JavaScript/mis_proyectos_p.js"></script>
</body>

</html>
