<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];
$record = $_SESSION["Record"];

if ( $key!=1 and $key!=2 and $key!=3 and $key!=4) {
		header("Location: 404.html");
	}

    require 'database.php';
	$id = null;
	$idA = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	if ( !empty($_GET['idA'])) {
		$idA = $_REQUEST['idA'];
	}
	if ( $id==null) {
		header("Location: index.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM R_Proyecto natural join R_Edicion natural join R_Area_Estrategica natural join R_Unidad_Formacion natural join R_Nivel_Desarrollo natural join R_Profesor where Id_Proyecto = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}
	
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  	<title>Detalles Proyecto</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="JavaScript/menu.js"></script> 
  <link rel="stylesheet" href="css/detalles_p.css">
</head>

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
            
            if (!empty($record)) {
		      	echo '<a class="btn" href="mis_proyectos_j.php">Mis Proyectos</a>';
	    } else {
		      	echo '<a class="btn" href="proyectos1.php">Proyectos</a>';
		      }
            
            ?>
            
            <a href="about.php" class="center">About</a>
            <a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="left">&#9776; Menu</span>
	</div>
</section>

  <section class="form-registro">
    <form class="form" action="registro.php" method="post">
      <h1>Detalles del Proyecto</h1>
      
      <div class="form-horizontal" >

					<div class="control-group">
						<label class="control-label">Id:</label>
					    <div class="controls">
							<label>
								<?php echo $data['Id_Proyecto'];?>
							</label>
					    </div>
					</div>

                    <br>

					<div class="control-group">
					    <label class="control-label">Nombre:</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['NombrePy'];?>
						    </label>
					    </div>
					</div>
					
                    <br>

					<div class="control-group">
					    <label class="control-label">Profesor Encargado:</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['NombrePr'];?>
						     	<?php echo $data['ApellidoPr'];?>
						    </label>
					    </div>
					</div>

                    <br>

					<div class="control-group">
					    <label class="control-label">Descripcion:</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['Descripcion'];?>
						    </label>
					    </div>
					</div>
					
                    <br>

					<div class="control-group">
					    <label class="control-label">Multimedia:</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['Multimedia'];?>
						    </label>
					    </div>
					</div>

                    <br>
					
					<div class="control-group">
					    <label class="control-label">Edicion:</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['NombreEd'];?>
						    </label>
					    </div>
					</div>
					
                    <br>

					<div class="control-group">
					    <label class="control-label">area</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombreAe'];?>
						    </label>
					    </div>
					</div>

                    <br>
                    <br>
					
					<div class="control-group">
					    <label class="control-label">Unidad de Formacion:</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['NombreUf'];?>
						    </label>
					    </div>
					</div>

                    <br>
					
					<div class="control-group">
					    <label class="control-label">Nivel de Desarrollo</label>
					    <div class="controls">
					      	<label>
						     	<?php echo $data['Nivel'];?>
						    </label>
					    </div>
					</div>

                    <br>

					<div class="control-group">
						<label class="control-label">Autorizado:</label>
					    <div class="controls">
					      	<label>
						    	<?php echo ($data['Autorizacion'])?"SI":"NO";?>
						    </label>
					    </div>
					</div>

                <br>

				</div>
			</div>
			
			<div>
    			<h2>Integrantes</h2>
    		</div>
    		
    		<div>
					
					<table>
	            <thead>
	                <tr>
	                	<td>Matricula	</td>
	                	<td>Nombre 				</td>
                        <td>Apellido 					</td>
	                </tr>
	            </thead>
	            <tbody>
	              	<?php
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Proyecto natural join R_Alumno_Proyecto natural join R_Alumno';
				 				   	foreach ($pdo->query($sql) as $row) {
                                        if ($row['Id_Proyecto']==$id){
                                        echo '<tr>';
			    					   	echo '<td>'. $row['Matricula'] . '</td>';
			    					  	echo '<td>'. $row['NombreAl'] . '</td>';
                                        				echo '<td>'. $row['ApellidoAl'] . '</td>';
					echo '</tr>';
                                        }
								    }
								   	Database::disconnect();
				  				?>
			    		</tbody>
		      </table>
		      </div>
		      
		      <div class="form-actions">
		      <?php
		      if (!empty($record)) {
		      	echo '<a class="btn" href="todosproyectos.php?idA=' . $record . '">Regresar</a>';
		      } else {
		      	echo '<a class="btn" href="mis_proyectos_j.php">Regresar</a>';
		      }
		      ?>
					</div>
	
    </form>
   
  </section>


</body>

</html>
