<?php

session_start();

$key = $_SESSION["User"];

if ( $key==null) {
		header("Location: 404.html");
	}

	require 'database.php';

	$nomiError = null;
	$ufError = null;

	if ( !empty($_POST)) {
		// keep track validation errors
		$nomiError   = null;
        $ufError = null;

		// keep track post values
        $nomi = $_POST['nomi'];
		$uf   = $_POST['uf'];

		/// validate input
		$valid = true;

        if (empty($uf)) {
			$ufError = 'Por favor selecciona una unidad de formacion';
			$valid = false;
		}

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO R_Profesor_Uf(Nomina, Id_Uf) VALUES(?,?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($key,$uf));
			Database::disconnect();
			echo'<script type="text/javascript">
			alert("Profesor Registrado");
			window.location.href="index.html";
			</script>';
		}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>¿Cuàl es tu Unidad de Formacion?</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="JavaScript/menu.js"></script> 
  <link rel="stylesheet" href="css/autorizar_py.css">
</head>

<body>

  <section class="form-registro">
    <form class="form-horizontal" action="select_Uf.php" method="post">
      <h1>Seleccionar Unidad de Formacion</h1>
      
      <h1>Eres: </h1>
<h3>
<?php
   $pdo = Database::connect();
   $query = 'SELECT * FROM R_Profesor WHERE Nomina = "' . $key . '"';
   $result = $pdo->query($query);

   echo "<table>";
   while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       echo "<tr><td>" . $row['Nomina'] . "</td><td>" . $row['NombrePr'] . "</td><td>" . $row['ApellidoPr'] . "</td></tr>";
   }
   echo "</table>";

   Database::disconnect();
?>
</h3>

					  	<div class="control-group <?php echo !empty($ufError)?'error':'';?>">
				    	<div class="controls">
	                       	<select name ="uf" id="Unidad_Formacion" class="input">
		                        <option value="">Selecciona una UF</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Unidad_Formacion';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Id_Uf']==$uf)
		                        			echo "<option selected value='" . $row['Id_Uf'] . "'>" . $row['NombreUf'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Id_Uf'] . "'>" . $row['NombreUf'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($ufError) != null) ?>
					      		<span class="help-inline"><?php echo $ufError;?></span>
						</div>
					</div>


					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Seleccionar</button>
						</div>
	
    </form>
   
  </section>


</body>

</html>
