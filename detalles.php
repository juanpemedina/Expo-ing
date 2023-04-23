<?php

session_start();

    require 'database.php';
	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
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
  <title>Detalles Profesor</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/detalles_p.css">
</head>

<body>

<section class="w3-threequarter w3-padding-large w3-right"> <!--NO FUNCIONA BIEN EL SIDEBAR-->
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="pagina_inicio_p.php" class="center">Pagina de Inicio</a>
            <a href="autorizar.php" class="center">Mis Proyectos</a> <!--FALTA CONECTAR ESTE BOTON-->
            <a href="about.html" class="center">About</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>

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
						<a class="btn" href="todosproyectos.php">Regresar</a>
					</div>
	
    </form>
   
  </section>


</body>

</html>
