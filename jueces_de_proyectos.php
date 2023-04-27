<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <script src="js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
    		<div class="row">
    			<div class="row">
    				<h3>Asignacion de Jueces</h3>				
    			</div>

				<div class="row">
					<p>
						<a href="pagina_inicio_a.php" role="button" class="btn btn-lg" style="position:relative; left:780px;">Regresar a página de inicio</a>
					</p>

					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Edicion</th>
								<th>Nombre</th>
								<th>Area Estrategica</th>
								<th>Unidad de Formacion</th>
								<th>Autorizado</th>
								<th>Juez</th>
							</tr>
						</thead>
						<tbody>
						<?php
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Get the selected judge
        $judge = $_POST['judge'];
        // Get the project ID
        $project_id = $_POST['project_id'];

        // Insert the judge and project ID into the R_Juez_Proyecto_Calif table
        $pdo = Database::connect();
        $sql = "INSERT INTO R_Juez_Proyecto_Calif (Id_Juez, Id_Proyecto) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array($judge, $project_id));
        Database::disconnect();

        // Redirect to the same page to prevent form resubmission
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }

    // Display the table of projects with a form for each project
    include 'database.php';
    $pdo = Database::connect();
    $sql = 'SELECT * FROM R_Proyecto 
            natural join R_Edicion 
            natural join R_Area_Estrategica 
            natural join R_Unidad_Formacion 
            natural join R_Nivel_Desarrollo 
            ORDER BY Id_Proyecto';
    foreach ($pdo->query($sql) as $row) {
        echo '<tr>';
        echo '<td>'. $row['NombreEd'] . '</td>';
        echo '<td>'. $row['NombrePy'] . '</td>';
        echo '<td>'. $row['NombreAe'] . '</td>';
        echo '<td>'. $row['Nivel'] . '</td>';
        echo '<td>'. ($row['Autorizacion'] ? "SI" : "NO") . '</td>';
        echo '<td width=150>';

        // Create a form for the current project
        echo '<form method="POST">';
        echo '<input type="hidden" name="project_id" value="'.$row['Id_Proyecto'].'">';
        echo '<select name="judge">';
        // Query to get the judges
        $sql_jueces_y_profesores_jueces = 'SELECT NombreJu as Nombre
                                           FROM R_Juez
                                           UNION
                                           SELECT NombrePr as Nombre
                                           FROM R_Profesor
                                           WHERE Es_Juez=1';
        foreach ($pdo->query($sql_jueces_y_profesores_jueces) as $row_juez_o_profesor) {
            $selected = ($row_juez_o_profesor['Nombre'] == $row['Juez']) ? 'selected' : '';
            echo '<option value="'.$row_juez_o_profesor['Nombre'].'" '.$selected.'>'.$row_juez_o_profesor['Nombre'].'</option>';
        }
        echo '</select>';
        echo '<input type="submit" name="submit" value="Seleccionar" class="btn btn-success"/>';
        echo '</form>';

        echo '</td>';
        echo '</tr>';
    }
    Database::disconnect();
?>
			    		</tbody>
		      		</table>
					
		    	</div>
				
		    </div>
				
        </div> <!-- /container -->
	</body>
