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
    			<h3>Proyectos</h3>
    		</div>

				<div class="row">
					<p>
						<a href="create.php" class="btn btn-success">Registrar Proyecto</a>
					</p>

					<table class="table table-striped table-bordered">
	            <thead>
	                <tr>
	                	<th>Edicion	</th>
	                	<th>Nombre	</th>
	                	<th>Area Estrategica 				</th>
	                	<th>Unidad de Formacion	</th>
                        	<th>Nivel de Desarrollo 					</th>
	                  	<th>Autorizacion					</th>
	                </tr>
	            </thead>
	            <tbody>
	              	<?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Proyecto natural join R_Edicion natural join R_Area_Estrategica natural join R_Unidad_Formacion natural join R_Nivel_Desarrollo ORDER BY Id_Proyecto';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
			    					   	echo '<td>'. $row['NombreEd'] . '</td>';
			    					   	echo '<td>'. $row['NombrePy'] . '</td>';
			    					  	echo '<td>'. $row['NombreAe'] . '</td>';
                                        				echo '<td>'. $row['Nivel'] . '</td>';
			                            echo '<td>';    echo ($row['Autorizacion'])?"SI":"NO"; echo'</td>';
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="read.php?id='.$row['Id_Proyecto'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					  	echo '<a class="btn btn-success" href="update.php?id='.$row['Id_Proyecto'].'">Actualizar</a>';
			    					   	echo '&nbsp;';
			    					   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['Id_Proyecto'].'">Eliminar</a>';
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
