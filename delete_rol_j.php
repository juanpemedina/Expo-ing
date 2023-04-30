<?php

session_start();

$key = $_SESSION["TipoUsuario"];

	if ( $key!=4) {
		header("Location: 404.html");
	}

	require 'database.php';
	$id = 0;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];
		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql1 = "DELETE FROM R_Juez WHERE Id_Juez = ?";
		$q1 = $pdo->prepare($sql1);
		$q1->execute(array($id));
		Database::disconnect();
		header("Location: asignar_rol_admin_j.php");
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
			    	<h3>Eliminar Usuario</h3>
			    </div>

			    <form class="form-horizontal" action="delete_rol_j.php" method="post">
		    		<input type="hidden" name="id" value="<?php echo $id;?>"/>
					<p class="alert alert-error">Estas seguro que quieres eliminar este usuario ?</p>
					<div class="form-actions">
						<button type="submit" class="btn btn-danger">Si</button>
						<a class="btn" href="asignar_rol_admin_j.php">No</a>
					</div>
				</form>
			</div>
	  </div> <!-- /container -->
	</body>
</html>
