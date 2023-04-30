<?php

session_start();

$key = $_SESSION["TipoUsuario"];

	if ( $key!=4) {
		header("Location: 404.html");
	}

	require 'database.php';

		$nombError = null;
		$apellError = null;
		$contError = null;
		$mailError = null;
		$rolError = null;
		

	if ( !empty($_POST)) {

		$nomb = $_POST['nomb'];
		$apell = $_POST['apell'];
		$cont = $_POST['cont'];
		$mail = $_POST['mail'];
		$rol = $_POST['rol'];



		// validate input
		$valid = true;

		if (empty($nomb)) {
			$nombError = 'Por favor ingresa un nombre';
			$valid = false;
		}
		if (empty($apell)) {
			$apellError = 'Por favor ingresa un apellido';
			$valid = false;
		}
		if (empty($cont)) {
			$contError = 'Por favor ingrese una contraseña';
			$valid = false;
		}
		if (empty($mail)) {
			$mailError = 'Por favor ingrese un correo';
			$valid = false;
		}
		if (empty($rol)) {
			$rolError = 'Por favor selecciona un rol';
			$valid = false;
		}


		// insert data
		if ($valid) {
			$pdo = Database::connect();

			if ($rol==1){
				$sql1 = "INSERT INTO R_Alumno(Matricula, contrasenia, NombreAl, ApellidoAl) values(?, ?, ?, ?)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));
			}
			else if ($rol==2){
				$sql1 = "INSERT INTO R_Profesor(Nomina, contrasenia, NombrePr, ApellidoPr, Es_Juez) values(?, ?, ?, ?, 0)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));
			}
			else if ($rol==3){
				$sql1 = "INSERT INTO R_Juez(Id_Juez, contrasenia, NombreJu, ApellidoJu) values(?, ?, ?, ?)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));
			}
			else if ($rol==4){
				$sql1 = "INSERT INTO R_Profesor(Nomina, contrasenia, NombrePr, ApellidoPr, Es_Juez) values(?, ?, ?, ?, 1)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));
			}
			Database::disconnect();
			header("Location: asignar_rol_admin_e.php");
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
		   			<h3>Registrar un nuevo Usuario</h3>
		   		</div>

				<form class="form-horizontal" action="create_rol_e.php" method="post">

					<div class="control-group <?php echo !empty($nombError)?'error':'';?>">
						<label class="control-label">Nombre del Usuario</label>
					    <div class="controls">
					      	<input name="nomb" type="text"  placeholder="nombre ..." value="<?php echo !empty($nomb)?$nomb:'';?>">
					      	<?php if (($nombError != null)) ?>
					      		<span class="help-inline"><?php echo $nombError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($apellError)?'error':'';?>">
						<label class="control-label">Apellido del Usuario</label>
					    <div class="controls">
					      	<input name="apell" type="text"  placeholder="apellido ..." value="<?php echo !empty($apell)?$apell:'';?>">
					      	<?php if (($apellError != null)) ?>
					      		<span class="help-inline"><?php echo $apellError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($contError)?'error':'';?>">
						<label class="control-label">Contraseña</label>
					    <div class="controls">
					      	<input name="cont" type="text"  placeholder="contraseña ..." value="<?php echo !empty($cont)?$cont:'';?>">
					      	<?php if (($contError != null)) ?>
					      		<span class="help-inline"><?php echo $contError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($mailError)?'error':'';?>">
						<label class="control-label">Correo</label>
					    <div class="controls">
					      	<input name="mail" type="text"  placeholder="correo ..." value="<?php echo !empty($mail)?$mail:'';?>">
					      	<?php if (($mailError != null)) ?>
					      		<span class="help-inline"><?php echo $mailError;?></span>
					    </div>
					</div>

					<div class="control-group <?php echo !empty($rolError)?'error':'';?>">
				    	<label class="control-label">Rol de Usuario</label>
				    	<div class="controls">
	                       	<select name ="rol">
		                        <option value="">Selecciona un rol</option>
		                        	<option name="rol" value="1">Estudiante</option>
    								<option name="rol" value="2">Profesor</option>
    								<option name="rol" value="3">Juez invitado</option>
    								<option name="rol" value="4">Profesor-Juez</option>
                            </select>
					      	<?php if (($rolError) != null) ?>
					      		<span class="help-inline"><?php echo $rolError;?></span>
						</div>
					</div>

					<div class="form-actions">
						<button type="nomit" class="btn btn-success">Agregar</button>
						<a class="btn" href="asignar_rol_admin_e.php">Regresar</a>
					</div>

				</form>
			</div>
	    </div> <!-- /container -->
	</body>
</html>
