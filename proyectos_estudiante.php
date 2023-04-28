<?php
session_start();
$user = $_SESSION["Usuario"];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link   href="css/bootstrap.min.css" rel="stylesheet">
	    <script src="js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
    			<div class="row">
					<div class="row">
    				<h3>Proyectos</h3>
    		</div>

				<div class="row">
					<p>
						<a href="registro.php" class="btn btn-success" role="button">Registrar Proyecto</a>
						<a href="pagina_inicio_e.php" role="button" class="btn btn-lg" style = "position:relative; left:515px;" >Regresar a página de inicio</a>

					</p>

					<table class="table table-striped table-bordered">
	            <thead>
	                <tr>
	                	<th>Nombre del Proyecto	</th>
	                	<th>Descripcion	</th>

	                	<th>Calificacion Final	</th>
                        	<th>Autorización					</th>
	                </tr>
	            </thead>
	            <tbody>
	              	<?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * from R_Proyecto JOIN R_Alumno_Proyecto ON R_Alumno_Proyecto.Id_Proyecto=R_Proyecto.Id_Proyecto WHERE Matricula ="' . $user . '" ';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
			    					   	echo '<td>'. $row['NombrePy'] . '</td>';
			    					   	echo '<td>'. $row['Descripcion'] . '</td>';

                                        				echo '<td>'. $row['Calif_Final'] . '</td>';
									echo '<td>'. $row['Autorizacion'] . '</td>';
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="read_proyectos_estudiante.php?id='.$row['Id_Proyecto'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					  	echo '<a class="btn btn-success" href="update_proyectos_estudiante.php?id='.$row['Id_Proyecto'].'">Actualizar</a>';
			    					   	echo '&nbsp;';
			    					   	echo '<a class="btn btn-danger" href="delete_proyectos_estudiante.php?id='.$row['Id_Proyecto'].'">Eliminar</a>';
			    					   	echo '</td>';
										  echo '</tr>';
								    }
								   	Database::disconnect();
				  				?>
			    		</tbody>
		      </table>

		    </div>

	    </div> <!-- /container -->
	</body>
</html>
