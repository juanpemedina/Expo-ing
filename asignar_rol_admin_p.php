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
					<h3>Asignar Rol Docentes</h3>				
				</div>
				<div class="row">
					<p>
						<a href="create_rol_e.php" class="btn btn-success" role="button">Crear Usuario</a>
						<a href="proyectos_admin.php" class="btn btn-primary" role="button">Ver Proyectos</a>
						<a href="pagina_inicio_a.php" role="button" class="btn btn-lg" style="position:relative; left:515px;">Regresar a página de inicio</a>									
					</p>
					<p>
						<a href="asignar_rol_admin_e.php" class="btn btn-info" role="button">Estudiantes</a>
						<a href="#" class="btn btn-inverse disabled" role="button">Docente</a>
						<a href="asignar_rol_admin_j.php" class="btn btn-info" role="button">Juez</a>
					</p>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Nomina</th>
								<th>¿Es Juez?</th>
								<th>
									<form action="asignar_rol_admin_p.php" style="text-align:center; position:relative; left: 0px;top:15px;" method="post">
										<div class="controls">	
											<select name="arol">
												<option value="1">Todos</option>
												<option value="2">Profesor</option>
												<option value="3">Profesor-Juez</option>
											</select>
											<input type="submit" value="Filtrar" class="btn btn-info"/>
										</div>
									</form>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
									include 'database.php';
									$pdo = Database::connect();
									if(isset($_POST['arol'])){
										$arol = $_POST['arol'];
									}else{
										$arol = 0;
									}
									if ($arol == 2) {
										//Filtrar Profesor
										$sql = 'SELECT * FROM R_Profesor WHERE Es_Juez = 0';
										foreach ($pdo->query($sql) as $row) {
												echo '<tr>';
												echo '<td>'. $row['NombrePr'] . '</td>';
												echo '<td>'. $row['ApellidoPr'] . '</td>';
												echo '<td>'. $row['Nomina'] . '</td>';
												// echo '<td>'. $row['Es_Juez'] . '</td>';
												echo '<td>';     echo ($row['Es_Juez'])?"SI":"NO";   echo '</td>';

												echo '<td width=250>';
												echo '<a class="btn" href="read_rol_p.php?id='.$row['Nomina'].'">Detalles</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-success" href="update_rol_p.php?id='.$row['Nomina'].'">Actualizar</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-danger" href="delete_rol_p.php?id='.$row['Nomina'].'">Eliminar</a>';
												echo '</td>';
												echo '</tr>';
										}	
									}
									else if ($arol == 3) {
										//Filtrar Profesor-Juez
										$sql = 'SELECT * FROM R_Profesor WHERE Es_Juez = 1';
										foreach ($pdo->query($sql) as $row) {
												echo '<tr>';
												echo '<td>'. $row['NombrePr'] . '</td>';
												echo '<td>'. $row['ApellidoPr'] . '</td>';
												echo '<td>'. $row['Nomina'] . '</td>';
												// echo '<td>'. $row['Es_Juez'] . '</td>';
												echo '<td>';     echo ($row['Es_Juez'])?"SI":"NO";   echo '</td>';

												echo '<td width=250>';
												echo '<a class="btn" href="read_rol_p.php?id='.$row['Nomina'].'">Detalles</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-success" href="update_rol_p.php?id='.$row['Nomina'].'">Actualizar</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-danger" href="delete_rol_p.php?id='.$row['Nomina'].'">Eliminar</a>';
												echo '</td>';
												echo '</tr>';
										}	
									}
									else {
										//Filtrar Todos
										$sql = 'SELECT * FROM R_Profesor';
										foreach ($pdo->query($sql) as $row) {
												echo '<tr>';
												echo '<td>'. $row['NombrePr'] . '</td>';
												echo '<td>'. $row['ApellidoPr'] . '</td>';
												echo '<td>'. $row['Nomina'] . '</td>';
												// echo '<td>'. $row['Es_Juez'] . '</td>';
												echo '<td>';     echo ($row['Es_Juez'])?"SI":"NO";   echo '</td>';

												echo '<td width=250>';
												echo '<a class="btn" href="read_rol_p.php?id='.$row['Nomina'].'">Detalles</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-success" href="update_rol_p.php?id='.$row['Nomina'].'">Actualizar</a>';
												echo '&nbsp;';
												echo '<a class="btn btn-danger" href="delete_rol_p.php?id='.$row['Nomina'].'">Eliminar</a>';
												echo '</td>';
												echo '</tr>';
										}	
									}
									Database::disconnect();
								?>
						</tbody>
				</table>
			</div>
		</div> <!-- /container -->
	</body> 
</html>