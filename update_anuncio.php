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
		$tituloError   = null;
		$textoError = null;

		// keep track post values
		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];
        $mail = $_POST['mail'];
		
		/// validate input
		$valid = true;

		if (empty($titulo)) {
			$tituloError = 'Por favor ingresa un titulo';
			$valid = false;
		}
		if (empty($texto)) {
			$textoError = 'Por favor ingrese texto';
			$valid = false;
		}

		// update data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	
			$sql = 'UPDATE R_Anuncios  set Titulo =?, Texto =?, Id_Anuncio=? WHERE Id_Anuncio = "' . $mail . '"';
			$q = $pdo->prepare($sql);
            $q->execute(array($titulo, $texto, $mail));
            // $q->execute(array($titulo, $texto));
		
			Database::disconnect();
			header("Location: pagina_inicio_a.php#anuncios2");
		}
	}
	else {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM R_Anuncios where Id_Anuncio = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
        $mail = $data['Id_Anuncio'];
        $titulo = $data['Titulo'];
        $texto = $data['Texto'];

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
		    		<h3>Actualizar Datos del Anuncio</h3>
		    	</div>

	    			<form class="form-horizontal" action="update_anuncio.php?id=<?php echo $mail;?>" method="post">
                    <div class="control-group <?php echo !empty($f_idError)?'error':'';?>">

                        <label class="control-label">id</label>
                        <div class="controls">
                              <input name="mail" type="text" readonly placeholder="mail" value="<?php echo !empty($mail)?$mail:''; ?>">
                              <?php if (!empty($f_idError)): ?>
                                  <span class="help-inline"><?php echo $f_idError;?></span>
                              <?php endif; ?>
                        </div>
                        </div>


					  <div class="control-group <?php echo !empty($tituloError)?'error':'';?>">

					    <label class="control-label">titulo</label>
					    <div class="controls">
					      	<input name="titulo" type="text" placeholder="titulo ..." value="<?php echo !empty($titulo)?$titulo:'';?>">
					      	<?php if (!empty($tituloError)): ?>
					      		<span class="help-inline"><?php echo $tituloError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  
					  <div class="control-group <?php echo !empty($textoError)?'error':'';?>">

					    <label class="control-label">texto</label>
					    <div class="controls">
					      	<textarea name="texto" type="text" placeholder="texto ..." value="<?php echo !empty($texto)?$texto:'';?>"></textarea>
					      	<?php if (!empty($textoError)): ?>
					      		<span class="help-inline"><?php echo $textoError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Actualizar</button>
						  <a class="btn" href="pagina_inicio_a.php#anuncios2">Regresar</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>



