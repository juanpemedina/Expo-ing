<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

if ( $key!=4) {
		header("Location: 404.html");
	}

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
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
    	<div class="container">

    		<div class="span10 offset1">
    			<div class="row">
		    		<h3>Detalles del Proyecto</h3>
		    	</div>

	    		<div class="form-horizontal" >

					<div class="control-group">
						<label class="control-label">id</label>
					    <div class="controls">
							<label class="checkbox">
								<?php echo $data['Id_Proyecto'];?>
							</label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">nombre</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombrePy'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">profesor encargado</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombrePr'];?>
						     	<?php echo $data['ApellidoPr'];?>
						    </label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">descripcion</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Descripcion'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">multimedia</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Multimedia'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">edicion</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombreEd'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">area</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombreAe'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">unidad de formacion</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombreUf'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">nivel de desarrollo</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Nivel'];?>
						    </label>
					    </div>
					</div>

					<div class="control-group">
						<label class="control-label">autorizacion</label>
					    <div class="controls">
					      	<label class="checkbox">
						    	<?php echo ($data['Autorizacion'])?"SI":"NO";?>
						    </label>
					    </div>
					</div>

				</div>
			</div>
			
			<div class="row">
    			<h3>Integrantes</h3>
    		</div>
    		
    		<div class="row">
					
					<table class="table table-striped table-bordered">
	            <thead>
	                <tr>
	                	<th>Matricula	</th>
	                	<th>Nombre 				</th>
                        <th>Apellido 					</th>
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
						<a class="btn" href="proyectos_admin.php">Regresar</a>
					</div>
		      
		</div> <!-- /container --> 
  	</body>
</html>
