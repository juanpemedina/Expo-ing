<?php

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$idError   = null;
		$nombError = null;
		$descError = null;
		$multError = null;
		$areaError = null;
		$ufError = null;
		$nivelError = null;
		$nomiError = null;

		// keep track post values
		$id   = $_POST['id'];
		$nomb = $_POST['nomb'];
		$desc = $_POST['desc'];
		$mult = $_POST['mult'];
		$area = $_POST['area'];
		$uf = $_POST['uf'];
		$nivel = $_POST['nivel'];
		$nomi = $_POST['nomi'];
		
		/// validate input
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

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE R_Proyecto  set Id_Proyecto =?, Nomina =?, Id_Area =?, Id_Uf =?, Id_Nivel =?, NombrePy =?, Descripcion =?, Multimedia =? WHERE Id_Proyecto = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id, $nomi, $area, $uf, $nivel, $nomb, $desc, $mult, $id));
			Database::disconnect();
			header("Location: index.php");
		}
	}
	else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM R_Proyecto where Id_Proyecto = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$id 	= $data['Id_Proyecto'];
		$nomi = $data['Nomina'];
		$area 	= $data['Id_Area'];
		$uf 	= $data['Id_Uf'];
		$nivel 	= $data['Id_Nivel'];
		$nomb 	= $data['NombrePy'];
		$desc = $data['Descripcion'];
		$mult = $data['Multimedia'];
		Database::disconnect();
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
		    		<h3>Actualizar Datos del Proyecto</h3>
		    	</div>

	    			<form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">

					  <div class="control-group <?php echo !empty($f_idError)?'error':'';?>">

					    <label class="control-label">id</label>
					    <div class="controls">
					      	<input name="id" type="text" readonly placeholder="id" value="<?php echo !empty($id)?$id:''; ?>">
					      	<?php if (!empty($f_idError)): ?>
					      		<span class="help-inline"><?php echo $f_idError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  <div class="control-group <?php echo !empty($nombError)?'error':'';?>">

					    <label class="control-label">nombre</label>
					    <div class="controls">
					      	<input name="nomb" type="text" placeholder="nombre ..." value="<?php echo !empty($nomb)?$nomb:'';?>">
					      	<?php if (!empty($nombError)): ?>
					      		<span class="help-inline"><?php echo $nombError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($descError)?'error':'';?>">

					    <label class="control-label">descripcion</label>
					    <div class="controls">
					      	<input name="desc" type="text" placeholder="descripcion ..." value="<?php echo !empty($desc)?$desc:'';?>">
					      	<?php if (!empty($descError)): ?>
					      		<span class="help-inline"><?php echo $descError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($multError)?'error':'';?>">

					    <label class="control-label">Enlace multimedia</label>
					    <div class="controls">
					      	<input name="mult" type="text" placeholder="http(s):// ..." value="<?php echo !empty($mult)?$mult:'';?>">
					      	<?php if (!empty($multError)): ?>
					      		<span class="help-inline"><?php echo $multError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

						<div class="control-group <?php echo !empty($areaError)?'error':'';?>">
					    	<label class="control-label">Area Estrategica</label>
					    	<div class="controls">
                            	<select name ="area">
                                    <option value="">Selecciona un Area Estrategica</option>
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
					      	<?php if (!empty($areaError)): ?>
					      		<span class="help-inline"><?php echo $areaError;?></span>
					      	<?php endif;?>
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
					      	<?php if (!empty($ufError)): ?>
					      		<span class="help-inline"><?php echo $ufError;?></span>
					      	<?php endif;?>
					    	</div>
					  	</div>
					  	
					  	<div class="control-group <?php echo !empty($nivelError)?'error':'';?>">
					    	<label class="control-label">Nivel de Desarrollo</label>
					    	<div class="controls">
                            	<select name ="nivel">
                                    <option value="">Selecciona un Nivel de Desarrollo</option>
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
					      	<?php if (!empty($nivelError)): ?>
					      		<span class="help-inline"><?php echo $nivelError;?></span>
					      	<?php endif;?>
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
					      	<?php if (!empty($nomiError)): ?>
					      		<span class="help-inline"><?php echo $nomiError;?></span>
					      	<?php endif;?>
					    	</div>
					  	</div>
					  	
					  	<!--¿CAMBIAMOS A LOS INTEGRANTES?-->



					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Actualizar</button>
						  <a class="btn" href="index.php">Regresar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>s



