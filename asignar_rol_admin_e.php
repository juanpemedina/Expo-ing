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
    				<h3>Asignar Rol Estudiantes</h3>				
    		</div>

				<div class="row">
					<p>
						<a href="create_rol_e.php" class="btn btn-success" role="button">Crear Usuario</a>
						<a href="proyectos_admin.php" class="btn btn-primary" role="button">Ver Proyectos</a>
						<a href="pagina_inicio_a.php" role="button" class="btn btn-lg" style = "position:relative; left:515px;" >Regresar a página de inicio</a>
									
					</p>
					<p>
						<a href="#" class="btn btn-inverse disabled" role="button">Estudiantes</a>
						<a href="asignar_rol_admin_p.php" class="btn btn-info" role="button">Docente</a>
						<a href="asignar_rol_admin_j.php" class="btn btn-info" role="button">Juez</a>
					</p>

					<table class="table table-striped table-bordered">
					<thead>
	                <tr>
	                	<th>Nombre</th>
	                	<th>Apellido</th>
	                	<th>Matricula</th>
	                </tr>
	            </thead>
	            <tbody>
	              	<?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Alumno';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
			    					   	echo '<td>'. $row['NombreAl'] . '</td>';
			    					   	echo '<td>'. $row['ApellidoAl'] . '</td>';
			    					  	echo '<td>'. $row['Matricula'] . '</td>';
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="read_rol_e.php?id='.$row['Matricula'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					  	echo '<a class="btn btn-success" href="update_rol_e.php?id='.$row['Matricula'].'">Actualizar</a>';
			    					   	echo '&nbsp;';
			    					   	echo '<a class="btn btn-danger" href="delete_rol_e.php?id='.$row['Matricula'].'">Eliminar</a>';
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
