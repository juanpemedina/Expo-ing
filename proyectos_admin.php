<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

if ( $key!=4) {
		header("Location: 404.html");
	}

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
						<a href="create_proyectos_a.php" class="btn btn-success" role="button">Registrar Proyecto</a>
						<a href="asignar_rol_admin_e.php" class="btn btn-primary" role="button">Asignar Roles</a>
						<a href="pagina_inicio_a.php" role="button" class="btn btn-lg" style = "position:relative; left:515px;" >Regresar a página de inicio</a>
									
					</p>

					<table class="table table-striped table-bordered">
	            <thead>
	                <tr>
	                	<th>Edicion	</th>
	                	<th>Nombre	</th>
	                	<th>Area Estrategica 				</th>
                        	<th>Nivel de Desarrollo 					</th>
	                  	<th>Autorizacion					</th>
						  <th>					</th>

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
			    					   	echo '<a class="btn" href="read_proyectos_a.php?id='.$row['Id_Proyecto'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					  	echo '<a class="btn btn-success" href="update_proyectos_a.php?id='.$row['Id_Proyecto'].'">Actualizar</a>';
			    					   	echo '&nbsp;';
			    					   	echo '<a class="btn btn-danger" href="delete_proyectos_a.php?id='.$row['Id_Proyecto'].'">Eliminar</a>';
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
