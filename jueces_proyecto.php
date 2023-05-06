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
    				<h3>Jueces Asignados a Proyectos</h3>				
    		</div>

				<div class="row">
					<p>
						<a href="jueces_de_proyectos.php" class="btn btn-success" role="button">Asignar juez</a>
						<a href="pagina_inicio_a.php" role="button" class="btn btn-lg" style = "position:relative; left:680px;" >Regresar a página de inicio</a>
					</p>
					<table class="table table-striped table-bordered">
	            <thead>
	                <tr>
	                	<th>ID Proyecto</th>
                        <th>Nombre Proyecto</th>
	                	<th>Juez</th>
	                	<th>Matricula</th>
						  <th>					</th>

	                </tr>
	            </thead>
	            <tbody>
	              	<?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'select * from Jueces right join R_Juez_Proyecto_Calif on Jueces.matricula=R_Juez_Proyecto_Calif.Id_Juez or Jueces.matricula=R_Juez_Proyecto_Calif.Nomina left join R_Proyecto on R_Juez_Proyecto_Calif.Id_Proyecto=R_Proyecto.Id_Proyecto';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
			    					   	echo '<td>'. $row['Id_Proyecto'] . '</td>';
                                        echo '<td>'. $row['NombrePy'] . '</td>';
			    					   	echo '<td>'. $row['nombre'] . '</td>';
			    					  	echo '<td>'. $row['matricula'] . '</td>';
                                
			                            echo '<td width=250>';
			    					   	echo '&nbsp;';
			    					   	echo '&nbsp;';
			    					   	echo '<a class="btn btn-danger" href="delete_jueces_proyecto.php?id='.$row['Id_Proyecto'].'">Eliminar a todos los jueces del proyecto</a>';
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
