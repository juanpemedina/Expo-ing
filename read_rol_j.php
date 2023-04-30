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
	if ( $id==null) {
		header("Location: asignar_rol_admin_j.php");
	} else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = 'SELECT * FROM R_Juez where Id_Juez=?';
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
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
		    		<h3>Detalles del Usuario</h3>
		    	</div>

	    		<div class="form-horizontal" >

					<div class="control-group">
						<label class="control-label">correo</label>
					    <div class="controls">
							<label class="checkbox">
								<?php echo $data['Id_Juez'];?>
							</label>
					    </div>
					</div>

					<div class="control-group">
					    <label class="control-label">nombre</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['NombreJu'];?>
						    </label>
					    </div>
					</div>
					
					<div class="control-group">
					    <label class="control-label">apellido</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['ApellidoJu'];?>
						    </label>
					    </div>
					</div>
					

					<div class="control-group">
					    <label class="control-label">contraseña</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Contrasenia'];?>
						    </label>
					    </div>
					</div>
					
					
					<div class="control-group">
					    <label class="control-label">tipo de usuario</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo "juez";?>
						    </label>
					    </div>
					</div>
					
				</div>
			</div>
    	
		      
		      <div class="form-actions">
						<a class="btn" href="asignar_rol_admin_j.php">Regresar</a>
					</div>
		      
		</div> <!-- /container --> 
  	</body>
</html>
