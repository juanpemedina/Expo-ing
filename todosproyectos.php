<?php
session_start();

    require 'database.php';
	$idA = null;
	if ( !empty($_GET['idA'])) {
		$idA = $_REQUEST['idA'];
	}
	if ( $idA==null) {
		header("Location: 404.html");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM R_Proyecto natural join R_Edicion natural join R_Area_Estrategica natural join R_Unidad_Formacion natural join R_Nivel_Desarrollo where Id_Area = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($idA));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		Database::disconnect();
	}

?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/autorizar.css">
</head>

<header>
  <h1>Autorizacion de Proyectos</h1>
  <nav>
    <a href="pagina_inicio_p.php">Home</a>
    <a href="about.html">About</a>
  </nav>
</header>

<section id='steezy'>

<body>
<section>
  <h1>Proyectos Asignados</h1>

  <table>
    <thead>
      <tr>
        <td>
          <h1>Id del Proyecto</h1>
        </td>
        <td>
          <h3>Area Estrategica</h3>
        </td>
        <td>
          <h3>Unidad de Formacion</h3>
        </td>
        <td>
          <h3>Nivel de Desarrollo</h3>
        </td>
        <td>
          <h3>Nombre</h3>
        </td>
        <td>
          <h3>Autorizacion</h3>
        </td>
      </tr>
    </thead>

    <tbody>
        <?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Proyecto natural join R_Edicion natural join R_Area_Estrategica natural join R_Unidad_Formacion natural join R_Nivel_Desarrollo ORDER BY Id_Proyecto';
				 				   	foreach ($pdo->query($sql) as $row) {
											echo '<tr>';
                                        echo '<td>'. $row['Id_Proyecto'] . '</td>';
			    					   	echo '<td>'. $row['NombreAe'] . '</td>';
			    					   	echo '<td>'. $row['NombreUf'] . '</td>';
			    					  	echo '<td>'. $row['Nivel'] . '</td>';
                                        echo '<td>'. $row['NombrePy'] . '</td>';
			                            echo '<td>';    echo ($row['Autorizacion'])?"SI":"NO"; echo'</td>';
			                            echo '<td width=250>';
			    					   	echo '<a class="btn" href="detalles.php?id='.$row['Id_Proyecto'].'">Detalles</a>';
			    					   	echo '&nbsp;';
			    					   	echo '&nbsp;';
			    					   	echo '</td>';
										  echo '</tr>';
								    }
								   	Database::disconnect();
				  				?>
    </tbody>
      
   </table>

</section>
  <script src="JavaScript/mis_proyectos_p.js"></script>
</body>

</html>
