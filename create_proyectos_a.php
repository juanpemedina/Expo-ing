<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

if ( $key!=4) {
		header("Location: 404.html");
	}

	require 'database.php';

		$nombError = null;
		$descError = null;
		$multError = null;
		$areaError = null;
		$ufError = null;
		$nivelError = null;
		$nomiError = null;
		$matriError = null;
		

	if ( !empty($_POST)) {

		$nomb = $_POST['nomb'];
		$desc = $_POST['desc'];
		$mult = $_POST['mult'];
		$area = $_POST['area'];
		$uf = $_POST['uf'];
		$nivel = $_POST['nivel'];
		$nomi = $_POST['nomi'];
		$matri = $_POST['matri'];
		$proye = $_POST['proye'];


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
		if (empty($matri)) {
			$matriError = 'Por favor selecciona a los integrantes';
			$valid = false;
		}


		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql1 = "INSERT INTO R_Proyecto (Nomina, Id_Edicion, Id_Area, Id_Uf, Id_Nivel, NombrePy, Descripcion, Multimedia, Calif_Final, Autorizacion) values(?, 1, ?, ?, ?, ?, ?, ?, null, 0)";
			$q1 = $pdo->prepare($sql1);
			$q1->execute(array($nomi, $area, $uf, $nivel, $nomb, $desc, $mult));
			$sql2 = "INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) values(?, ?)"; //NO SÉ BIEN COMO HACER PARA QUE FUNCIONE
			$q2 = $pdo->prepare($sql2);
			$q2->execute(array($matri, $proye));
			Database::disconnect();
			header("Location: proyectos_admin.php");
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta 	charset="utf-8">
	    <link   href=	"css/bootstrap.min.css" rel="stylesheet">
	    <script src=	"js/bootstrap.min.js"></script>
	</head>

	<body>
	    <div class="container">
	    	<div class="span10 offset1">
	    		<div class="row">
		   			<h3>Registrar un nuevo proyecto</h3>
		   		</div>

				<form class="form-horizontal" action="create_proyectos_a.php" method="post">

					<div class="control-group <?php echo !empty($nombError)?'error':'';?>">
						<label class="control-label">Nombre del Proyecto</label>
					    <div class="controls">
					      	<input name="nomb" type="text"  placeholder="nombre ..." value="<?php echo !empty($nomb)?$nomb:'';?>">
					      	<?php if (($nombError != null)) ?>
					      		<span class="help-inline"><?php echo $nombError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($descError)?'error':'';?>">
						<label class="control-label">Descripcion del Proyecto</label>
					    <div class="controls">
					      	<input name="desc" type="text"  placeholder="descripcion ..." value="<?php echo !empty($desc)?$desc:'';?>">
					      	<?php if (($descError != null)) ?>
					      		<span class="help-inline"><?php echo $descError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($multError)?'error':'';?>">
						<label class="control-label">Enlace multimedia</label>
					    <div class="controls">
					      	<input name="mult" type="text"  placeholder="http(s):// ..." value="<?php echo !empty($mult)?$mult:'';?>">
					      	<?php if (($multError != null)) ?>
					      		<span class="help-inline"><?php echo $multError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($areaError)?'error':'';?>">
				    	<label class="control-label">Area Estrategica</label>
				    	<div class="controls">
	                       	<select name ="area">
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

					<div class="control-group <?php echo !empty($ufError)?'error':'';?>">
				    	<label class="control-label">Unidad de Formacion</label>
				    	<div class="controls">
	                       	<select name ="uf">
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
					
					<div class="control-group <?php echo !empty($nivelError)?'error':'';?>">
				    	<label class="control-label">Nivel de Desarrollo</label>
				    	<div class="controls">
	                       	<select name ="nivel">
		                        <option value="">Selecciona un nivel de desarrollo</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Nivel_Desarrollo';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Id_Nivel']==$area)
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
					
					<div class="control-group <?php echo !empty($nomiError)?'error':'';?>"> <!--NO PUEDO HACER QUE SOLO SALGA EL PROFE DE LA UF-->
				    	<label class="control-label">Profesor Encargado</label>
				    	<div class="controls">
	                       	<select name ="nomi">
		                        <option value="">Selecciona a tu profesor</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Profesor NATURAL JOIN R_Profesor_Uf NATURAL JOIN R_Unidad_Formacion';
			 				   		foreach ($pdo->query($query) as $row) {
		                        		if ($row['Id_Uf']==$uf)
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
					
					<div class="control-group <?php echo !empty($matriError)?'error':'';?>"> <!--¿CÓMO METO LA Id_Proyecto DEL QUE APENAS VOY A CREAR A R_Alumno_Proyecto-->
				    	<label class="control-label">Integrantes</label>
				    	<div class="controls">
	                       	<select name ="matri">
		                        <option value="">Selecciona a los Integrantes</option>
		                        <?php
							   		$pdo = Database::connect();
							   		$query = 'SELECT * FROM R_Alumno';
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

					<div class="form-actions">
						<button type="nomit" class="btn btn-success">Agregar</button>
						<a class="btn" href="proyectos_admin.php">Regresar</a>
					</div>

				</form>
			</div>
	    </div> <!-- /container -->
	</body>
</html>
