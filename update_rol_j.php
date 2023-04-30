<?php

session_start();

$key = $_SESSION["TipoUsuario"];

	if ( $key!=4) {
		header("Location: 404.html");
	}

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
		$mailError   = null;
		$nombError = null;
		$apellError = null;
		$contError = null;
		// $areaError = null;
		// $ufError = null;
		// $nivelError = null;
		// $nomiError = null;

		// keep track post values
		$arol = $_POST['arol'];
		$mail   = $_POST['mail'];
		$nomb = $_POST['nomb'];
		$apell = $_POST['apell'];
		$cont = $_POST['cont'];
		// $area = $_POST['area'];
		// $uf = $_POST['uf'];
		// $nivel = $_POST['nivel'];
		// $nomi = $_POST['nomi'];
		
		/// validate input
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
		// if (empty($area)) {
		// 	$areaError = 'Por favor selecciona un area estrategica';
		// 	$valid = false;
		// }
		// if (empty($uf)) {
		// 	$ufError = 'Por favor selecciona una unidad de formacion';
		// 	$valid = false;
		// }
		// if (empty($nivel)) {
		// 	$nivelError = 'Por favor selecciona un nivel de desarrollo';
		// 	$valid = false;
		// }
		// if (empty($nomi)) {
		// 	$nomiError = 'Por favor selecciona a tu profesor';
		// 	$valid = false;
		// }

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


			if ($arol==1){
				$sql1 = "INSERT INTO R_Alumno(Matricula, contrasenia, NombreAl, ApellidoAl) values(?, ?, ?, ?)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));			
				
				$sql2 = "DELETE FROM R_Juez WHERE Id_Juez = ?";
				$q2 = $pdo->prepare($sql2);
				$q2->execute(array($id));
			}
			else if ($arol==2){
				$sql1 = "INSERT INTO R_Profesor(Nomina, contrasenia, NombrePr, ApellidoPr, Es_Juez) values(?, ?, ?, ?, 0)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));


				$sql2 = "DELETE FROM R_Juez WHERE Id_Juez = ?";
				$q2 = $pdo->prepare($sql2);
				$q2->execute(array($id));
			}
			else if ($arol==3){
				$sql = 'UPDATE R_Juez  set Id_Juez =?, Contrasenia =?, NombreJu =?, ApellidoJu =? WHERE Id_Juez = "' . $mail . '"';
				$q = $pdo->prepare($sql);
				$q->execute(array($mail, $cont, $nomb, $apell));			}
			else if ($arol==4){
				$sql1 = "INSERT INTO R_Profesor(Nomina, contrasenia, NombrePr, ApellidoPr, Es_Juez) values(?, ?, ?, ?, 1)";
				$q1 = $pdo->prepare($sql1);
				$q1->execute(array($mail, $cont, $nomb, $apell));

				$sql2 = "DELETE FROM R_Juez WHERE Id_Juez = ?";
				$q2 = $pdo->prepare($sql2);
				$q2->execute(array($id));
			}
			Database::disconnect();
			header("Location: asignar_rol_admin_j.php");
		}
	}
	else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM R_Juez where Id_Juez = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
        $mail = $data['Id_Juez'];
        $cont = $data['Contrasenia'];
        $nomb = $data['NombreJu'];
        $apell = $data['ApellidoJu'];
		// $id 	= $data['Id_Proyecto'];
		// $nomi = $data['Nomina'];
		// $area 	= $data['Id_Area'];
		// $uf 	= $data['Id_Uf'];
		// $nivel 	= $data['Id_Nivel'];
		// $nomb 	= $data['NombrePy'];
		// $desc = $data['Descripcion'];
		// $mult = $data['Multimedia'];
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
		    		<h3>Actualizar Datos del Usuario/Juez invitado</h3>
		    	</div>

	    			<form class="form-horizontal" action="update_rol_j.php?id=<?php echo $mail;?>" method="post">


						<div class="control-group">
							<label class="control-label">Rol de Usuario</label>
							<div class="controls">
								<select name ="arol">
									<option value="">Selecciona un rol</option>
										<option name="arol" value="1">Estudiante</option>
										<option name="arol" value="2">Profesor</option>
										<option selected name="arol" value="3">Juez invitado</option>
										<option name="arol" value="4">Profesor-Juez</option>
								</select>
							</div>
						</div>
					  <div class="control-group <?php echo !empty($f_idError)?'error':'';?>">

					    <label class="control-label">mail</label>
					    <div class="controls">
					      	<input name="mail" type="text" readonly placeholder="mail" value="<?php echo !empty($mail)?$mail:''; ?>">
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
					  
					  <div class="control-group <?php echo !empty($apellError)?'error':'';?>">

					    <label class="control-label">apellido</label>
					    <div class="controls">
					      	<input name="apell" type="text" placeholder="apellido ..." value="<?php echo !empty($apell)?$apell:'';?>">
					      	<?php if (!empty($apellError)): ?>
					      		<span class="help-inline"><?php echo $apellError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($contError)?'error':'';?>">

					    <label class="control-label">contraseña</label>
					    <div class="controls">
					      	<input name="cont" type="text" placeholder="contraseña ..." value="<?php echo !empty($cont)?$cont:'';?>">
					      	<?php if (!empty($contError)): ?>
					      		<span class="help-inline"><?php echo $contError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  	

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Actualizar</button>
						  <a class="btn" href="asignar_rol_admin_j.php">Regresar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>



