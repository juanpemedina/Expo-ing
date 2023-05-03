<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

	require 'database.php';

if ( $key!=1 and $key!=4) {
		header("Location: 404.html");
	}

		$nombError = null;
		$descError = null;
		$multError = null;
		$areaError = null;
		$ufError = null;
		$nivelError = null;
		$nomiError = null;
		
if (isset($_POST['matri'])) {
    $matri = $_POST['matri'];
}

if (isset($_POST['matri2'])) {
    $matri2 = $_POST['matri2'];
}

if (isset($_POST['matri3'])) {
    $matri3 = $_POST['matri3'];
}

if (isset($_POST['matri4'])) {
    $matri4 = $_POST['matri4'];
}

	if ( !empty($_POST)) {

		$nomb = $_POST['nomb'];
		$desc = $_POST['desc'];
		$mult = $_POST['mult'];
		$area = $_POST['area'];
		$uf = $_POST['uf'];
		$nivel = $_POST['nivel'];
		$nomi = $_POST['nomi'];

		$proye = $_POST['proye'];
		
		
		$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql1 = 'SELECT * FROM R_Profesor_Uf WHERE Nomina = "' . $nomi . '" AND Id_Uf = ' . $uf;
			$q1 = $pdo->query($sql1);
			$nq = $q1 -> rowCount();
		
		
		// validate input
		$valid = true;

		if (empty($nomb)) {
			$nombError = 'Por favor ingresa un nombre';
			$valid = false;
		}
		if (empty($desc)) {
			$descError = 'Por favor ingresa una descripcion';
			$valid = false;
		}
		if (empty($mult)) {
			$multError = 'Por favor ingrese un enlace multimedia';
			$valid = false;
		}
		if (empty($area)) {
			$areaError = 'Por favor selecciona un area estrategica';
			$valid = false;
		}
		if (empty($uf)) {
			$ufError = 'Por favor selecciona una unidad de formacion';
			$valid = false;
		}
		if (empty($nivel)) {
			$nivelError = 'Por favor selecciona un nivel de desarrollo';
			$valid = false;
		}
		if (empty($nomi)) {
			$nomiError = 'Por favor selecciona a tu profesor';
			$valid = false;
		}
		if ($nq == 0) {
			$nomiError = 'La unidad de formación y el profesor no coinciden';
			$valid = false;
		}


		// insert data
$matriculas = array_filter([$matri, $matri2, $matri3, $matri4]);


		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql1 = "INSERT INTO R_Proyecto (Nomina, Id_Edicion, Id_Area, Id_Uf, Id_Nivel, NombrePy, Descripcion, Multimedia, Calif_Final, Autorizacion) values(?, 1, ?, ?, ?, ?, ?, ?, null, 0)";
			$q1 = $pdo->prepare($sql1);
			$q1->execute(array($nomi, $area, $uf, $nivel, $nomb, $desc, $mult));

			$sql2 = 'INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES ("' . $user . '", (SELECT MAX(Id_Proyecto) FROM R_Proyecto))';
			$pdo->query($sql2);

		foreach ($matriculas as $matricula) {
        if (!empty($matricula)) {
            $sql = "INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES (?, (SELECT MAX(Id_Proyecto) FROM R_Proyecto))";
            $q = $pdo->prepare($sql);
            $q->execute([$matricula]);
        }


}
			Database::disconnect();
			echo'<script type="text/javascript">
			alert("Proyecto Registrado");
			window.location.href="pagina_inicio_e.php";
			</script>';
		}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Registro</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="JavaScript/menu.js"></script> 
  <link rel="stylesheet" href="css/registrostyle.css">
</head>

<body>

<section class="w3-threequarter w3-padding-large w3-right">
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            
            <?php
            if ($key == 1) {
            	echo '<a href="pagina_inicio_e.php" class="center">Pagina de Inicio</a>';
            }
            else if ($key == 2) {
            	echo '<a href="pagina_inicio_p.php" class="center">Pagina de Inicio</a>';
            }
            else if ($key == 3) {
            	echo '<a href="pagina_inicio_j.php" class="center">Pagina de Inicio</a>';
            }
            else {
            	echo '<a href="pagina_inicio_a.php" class="center">Pagina de Inicio</a>';
            }
            
            ?>
            
            <a href="mis_proyectos_j.php" class="center">Mis Proyectos</a>
            <a href="proyectos1.php" class="center">Proyectos</a>
            <a href="about.php" class="center">About</a>
            <a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>
	</div>
</section>

  <section class="form-registro">
    <form class="form" action="registro.php" method="post">
      <h1>Registra los datos de tu proyecto aqui</h1>

      <div class="control-group <?php echo !empty($nombError)?'error':'';?>">
					    <div class="controls">
					      	<input name="nomb" type="text" class="input" placeholder="Nombre del Proyecto" value="<?php echo !empty($nomb)?$nomb:'';?>">
					      	<?php if (($nombError != null)) ?>
					      		<span class="help-inline"><?php echo $nombError;?></span>
					    </div>
					</div>

      <div class="control-group <?php echo !empty($descError)?'error':'';?>">
					    <div class="controls">
					      	<input name="desc" type="text" class="input" placeholder="Descripcion" value="<?php echo !empty($desc)?$desc:'';?>">
					      	<?php if (($descError != null)) ?>
					      		<span class="help-inline"><?php echo $descError;?></span>
					    </div>
					</div>

      <div class="control-group <?php echo !empty($areaError)?'error':'';?>">
				    	<div class="controls">
	                       	<select name ="area" id="Area_Estrategica" class="input">
	                       	<option value="">Selecciona un area estrategica</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Area_Estrategica';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Id_Area']==$area)
		                        			echo "<option selected value='" . $row['Id_Area'] . "'>" . $row['NombreAe'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Id_Area'] . "'>" . $row['NombreAe'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($areaError) != null) ?>
					      		<span class="help-inline"><?php echo $areaError;?></span>
						</div>
					</div>

	<div class="control-group <?php echo !empty($nivelError)?'error':'';?>">
				    	<div class="controls">
	                       	<select name ="nivel" id="Nivel_Desarrollo" class="input">
		                        <option value="">Selecciona un nivel de desarrollo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Nivel_Desarrollo';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Id_Nivel']==$nivel)
		                        			echo "<option selected value='" . $row['Id_Nivel'] . "'>" . $row['Nivel'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Id_Nivel'] . "'>" . $row['Nivel'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($nivelError) != null) ?>
					      		<span class="help-inline"><?php echo $nivelError;?></span>
						</div>
					</div>

      <div class="control-group <?php echo !empty($multError)?'error':'';?>">
					    <div class="controls">
					      	<input name="mult" type="text" class="input" placeholder="Inserta el link de tus archivos multimedia" value="<?php echo !empty($mult)?$mult:'';?>">
					      	<?php if (($multError != null)) ?>
					      		<span class="help-inline"><?php echo $multError;?></span>
					    </div>
					</div>

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

	<div class="control-group <?php echo !empty($nomiError)?'error':'';?>"> <!--NO PUEDO HACER QUE SOLO SALGA EL PROFE DE LA UF-->
				    	<div class="controls">
	                       	<select name ="nomi" id="prof" class="input">
		                        <option value="">Selecciona a tu profesor</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Profesor';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Nomina']==$nomi)
		                        			echo "<option selected value='" . $row['Nomina'] . "'>" . $row['NombrePr'] . $row['ApellidoPr'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Nomina'] . "'>" . $row['NombrePr'] . $row['ApellidoPr'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($nomiError) != null) ?>
					      		<span class="help-inline"><?php echo $nomiError;?></span>
						</div>
					</div>
<h1>LIDER DEL EQUIPO: </H1>
<h2>
<?php
   $pdo = Database::connect();
   $query = 'SELECT * FROM R_Alumno WHERE Matricula = "' . $user . '"';
   $result = $pdo->query($query);

   echo "<table>";
   while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
       echo "<tr><td>" . $row['Matricula'] . "</td><td>" . $row['NombreAl'] . "</td><td>" . $row['ApellidoAl'] . "</td></tr>";
   }
   echo "</table>";

   Database::disconnect();
?>
</h2>


      <div class="control-group <?php echo !empty($matriError)?'error':'';?>">
				    	<div class="controls">
	                       	<select name ="matri" id="alum" class="input">
		                        <option value="">Selecciona a los Integrantes de tu equipo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Alumno WHERE Matricula != "' . $user . '"';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Matricula']==$matri)
		                        			echo "<option selected value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
			   						}

			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($matriError) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div>
<div class="control-group <?php echo !empty($matriError)?'error':'';?>"> 
				    	<div class="controls">
	                       	<select name ="matri2" id="alum" class="input">
		                        <option value="">Selecciona a los Integrantes de tu equipo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Alumno WHERE Matricula != "' . $user . '"';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Matricula']==$matri2)
		                        			echo "<option selected value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($matri2Error) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div>
<div class="control-group <?php echo !empty($matriError)?'error':'';?>"> 
				    	<div class="controls">
	                       	<select name ="matri3" id="alum" class="input">
		                        <option value="">Selecciona a los Integrantes de tu equipo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Alumno WHERE Matricula != "' . $user . '"';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Matricula']==$matri3)
		                        			echo "<option selected value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($matri3Error) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div><div class="control-group <?php echo !empty($matriError)?'error':'';?>"> 
				    	<div class="controls">
	                       	<select name ="matri4" id="alum" class="input">
		                        <option value="">Selecciona a los Integrantes de tu equipo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Alumno WHERE Matricula != "' . $user . '"';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Matricula']==$matri4)
		                        			echo "<option selected value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
		                        		else
		                        			echo "<option value='" . $row['Matricula'] . "'>" . $row['NombreAl'] . $row['ApellidoAl'] . "</option>";
			   						}
			   						Database::disconnect();
			  					?>
                            </select>
					      	<?php if (($matri4Error) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div>




          <div class="form-actions">
				<button type="nomit" class="btn btn-success">Agregar Proyecto</button>
	</div>

    </form>

  </section>


</body>

</html>
