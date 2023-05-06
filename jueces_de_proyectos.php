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
                            <th>Nombre del Juez</th>
                            <th>Matricula del Juez</th>
                            <th>Proyecto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Display the table of judges and projects
                    include 'database.php';

                    if (isset($_POST['submit'])) {
                        // Get the judge and project IDs
                        $judge_id = $_POST['judge_id'];
                        $project_id = $_POST['project_id'];
                    
                        // Check if the judge's matricula starts with "L"
                        $nomina = null;
                        $id_juez = $judge_id;
                        if (substr($judge_id, 0, 1) === 'L') {
                            $nomina = $judge_id;
                            $id_juez = null;
                        }
                    
                        // Insert the judge and project IDs into the R_Juez_Proyecto_Calif table
                        $pdo = Database::connect();
                        $sql = 'INSERT INTO R_Juez_Proyecto_Calif (Id_Juez, Nomina, Id_Proyecto) VALUES (?, ?, ?)';
                        $q = $pdo->prepare($sql);
                        $q->execute(array($id_juez, $nomina, $project_id));
                    
                        // Display a success message
                        echo '<div class="alert alert-success">Asignación exitosa</div>';
                    }

                    $pdo = Database::connect();
                    $sql = 'SELECT NombreJu as Nombre, Id_Juez as Matricula FROM R_Juez
                            UNION
                            SELECT NombrePr as Nombre, Nomina as Matricula FROM R_Profesor WHERE Es_Juez = 1';

                    foreach ($pdo->query($sql) as $row_juez) {
                        echo '<tr>';
                        echo '<td>' . $row_juez['Nombre'] . '</td>';
                        echo '<td>' . $row_juez['Matricula'] . '</td>';
                        echo '<td>';
                        
                        // Create a form for the current judge or project
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="judge_id" value="'.$row_juez['Matricula'].'">';
                        echo '<select name="project_id">';
                        echo '<option value="">Seleciona Proyecto</option>';
                        // Query to get the projects
                        $sql_proyectos = 'SELECT * FROM R_Proyecto WHERE Autorizacion=1 AND Id_Uf NOT IN (SELECT Id_Uf FROM R_Profesor_Uf WHERE Nomina = ?)';
                        $q_proyectos = $pdo->prepare($sql_proyectos);
                        $q_proyectos->execute(array($row_juez['Matricula']));
                        while ($row_proyecto = $q_proyectos->fetch(PDO::FETCH_ASSOC)) {
                            $selected = ($row_proyecto['NombrePy'] == $row_juez['Nombre']) ? 'selected' : '';
                            echo '<option value="'.$row_proyecto['Id_Proyecto'].'" '.$selected.'>'.$row_proyecto['NombrePy'].'</option>';
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
</html>
