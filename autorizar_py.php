<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

if ( $key!=2 and $key!=4) {
		header("Location: 404.html");
	}

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index.html");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$idError   = null;

		// keep track post values
		$id   = $_POST['id'];
		$autorizacion   = $_POST['autorizacion'];

		/// validate input
		$valid = true;

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE R_Proyecto  set Id_Proyecto = ?, Autorizacion= ? WHERE Id_Proyecto = ?";
			$q = $pdo->prepare($sql);
			$autorizacionq = ($autorizacion=="S")?1:0;
			$q->execute(array($id,$autorizacionq, $id));
			Database::disconnect();
			echo'<script type="text/javascript">
			alert("Autorización Actualizada");
			window.location.href="mis_proyectos_j.php";
			</script>';
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
		$autorizacion   = ($data['Autorizacion'])?"S":"N";
		Database::disconnect();
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Autorizar</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="JavaScript/menu.js"></script> 
  <link rel="stylesheet" href="css/autorizar_py.css">
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
            	echo '<a href="registro.php" class="center">Registrar</a>';
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
            
            <a href="proyectos1.php" class="center">Proyectos</a>
            <a href="about.php" class="center">About</a>
            <a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="left">&#9776; Menu</span>
	</div>
</section>

  <section class="form-registro">
    <form class="form-horizontal" action="autorizar_py.php?id=<?php echo $id?>" method="post">
      <h1>Autorizar Proyecto</h1>
      
      <div class="control-group <?php echo !empty($f_idError)?'error':'';?>">

					    <label class="control-label">Id:</label>
					    <div class="controls">
					      	<input name="id" type="text" readonly placeholder="id" value="<?php echo !empty($id)?$id:''; ?>">
					      	<?php if (!empty($f_idError)): ?>
					      		<span class="help-inline"><?php echo $f_idError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>

					  	<div class="control-group <?php echo !empty($autorizarError)?'error':'';?>">
						    <label class="control-label">Autorizar el Proyecto ?</label>
						    <div class="controls">
	                                                <input name="autorizacion" type="radio" value="S"
	                                                	<?php echo ($autorizacion == "S")?'checked':'';?> >Si</input> &nbsp;&nbsp;
	                                                <input name="autorizacion" type="radio" value="N"
	                                                	<?php echo ($autorizacion == "N")?'checked':'';?> >No</input>

						      	<?php if (!empty($autorizacionError)): ?>
						      		<span class="help-inline"><?php echo $autorizacionError;?></span>
						      	<?php endif;?>
						    </div>
					  	</div>



					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Autorizar</button>
						  <a class="btn" href="mis_proyectos_j.php">Regresar</a>
						</div>
	
    </form>
   
  </section>


</body>

</html>
