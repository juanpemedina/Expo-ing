<?php
session_start();

$key = $_SESSION["TipoUsuario"];

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
    				<h3>Asignar Rol Jueces invitados</h3>				
    		</div>

				<div class="row">
					<p>
						<a href="create_rol_e.php" class="btn btn-success" role="button">Crear Usuario</a>
						<a href="proyectos_admin.php" class="btn btn-primary" role="button">Ver Proyectos</a>
						<a href="pagina_inicio_a.php" role="button" class="btn btn-lg" style = "position:relative; left:515px;" >Regresar a página de inicio</a>
									
					</p>
					<p>
                        <a href="asignar_rol_admin_e.php" class="btn btn-info" role="button">Estudiantes</a>
						<a href="asignar_rol_admin_p.php" class="btn btn-info" role="button">Docente</a>
						<a href="" class="btn btn-inverse disabled" role="button">Juez</a>
					</p>

					<p>
    					<a href="generate_excel_j.php" class="btn btn-success" role="button">Exportar Excel</a>
					</p>

					<table class="table table-striped table-bordered">
					<thead>
	                <tr>
	                	<th>Nombre</th>
	                	<th>Apellido</th>
	                	<th>Correo</th>
	                </tr>
	            </thead>
	            <tbody>
	              	<?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Juez';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
			    					   	echo '<td>'. $row['NombreJu'] . '</td>';
			    					   	echo '<td>'. $row['ApellidoJu'] . '</td>';
			    					  	echo '<td>'. $row['Id_Juez'] . '</td>';
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="read_rol_j.php?id='.$row['Id_Juez'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					  	echo '<a class="btn btn-success" href="update_rol_j.php?id='.$row['Id_Juez'].'">Actualizar</a>';
			    					   	echo '&nbsp;';
			    					   	echo '<a class="btn btn-danger" href="delete_rol_j.php?id='.$row['Id_Juez'].'">Eliminar</a>';
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
