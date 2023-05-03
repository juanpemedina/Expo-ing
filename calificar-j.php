<?php

session_start();
$key = $_SESSION["TipoUsuario"];
$user = $_SESSION["Usuario"];

if ( $key!=3 and $key!=4) {
		header("Location: 404.html");
	}

require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: login.php");
	}
	
	$q0Error = NULL;
	$q1Error = NULL;
	$q2Error = NULL;
	$q3Error = NULL;
	$q4Error = NULL;
	
	if (!empty($_POST)) {
	
		$q0 = $_POST['q0'];
		$q1 = $_POST['q1'];
		$q2 = $_POST['q2'];
		$q3 = $_POST['q3'];
		$q4 = $_POST['q4'];
		
		$valid = true;
		
		if (empty($q0)) {
			$q0Error = 'Favor de llenar el rubro';
			$valid = false;
		}
		if (empty($q1)) {
			$q1Error = 'Favor de llenar el rubro';
			$valid = false;
		}
		if (empty($q2)) {
			$q2Error = 'Favor de llenar el rubro';
			$valid = false;
		}
		if (empty($q3)) {
			$q3Error = 'Favor de llenar el rubro';
			$valid = false;
		}
		if (empty($q4)) {
			$q4Error = 'Favor de llenar el rubro';
			$valid = false;
		}
		
		if ($valid) {
		
			$result = ($q0 + $q1 + $q2 + $q3 + $q4)/2;
		
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE R_Juez_Proyecto_Calif set Calificacion = ? WHERE Id_Proyecto = ? AND (Id_Juez = ? OR Nomina = ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($result, $id, $user, $user));
			Database::disconnect();
			
			$count = 0;
			$result = 0;
			$pdo = Database::connect();
			$sql = 'SELECT * FROM R_Juez_Proyecto_Calif WHERE Id_Proyecto = ' . $id . ' AND Calificacion IS NOT NULL';
			foreach ($pdo->query($sql) as $row) {
			$cal = $row['Calificacion'];
			$result = $result + $cal;
			$count = $count + 1;
			}
			Database::disconnect();
			
			$rFinal = $result/$count;
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE R_Proyecto set Calif_Final = ? WHERE Id_Proyecto = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($rFinal, $id));
			Database::disconnect();
			
			echo'<script type="text/javascript">
			alert("Proyecto Calificado");
			window.location.href="mis_proyectos_j.php";
			</script>';
		
		}
		
		else {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM R_Proyecto where Id_Proyecto = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($id));
			$data = $q->fetch(PDO::FETCH_ASSOC);
			$id 	= $data['Id_Proyecto'];
			Database::disconnect();
		}
	
	}
	
?>

<!DOCTYPE html>
<html>

<head>
  <title>Calificar</title>
  <meta charset="UTF-8" />
<!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="JavaScript/menu.js"></script> 
  <link rel="stylesheet" href="css/calificajuez.css">
  

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
            <a href="about.html" class="center">About</a>
            <a href="logout.php" class="center">Cerrar Sesión</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="left">&#9776; Menu</span>
	</div>
</section>

<h1>Calificar Proyectos</h1>
          
  <!-- Comments -->
  <h1>Rubrica de Calificaciones</h1>
  <p> En este apartado podras calificar los proyectos respecto a 5 rúbricas evaluadas durante la exposición, cada una
    con un rango de calificación de 1 a 4, siendo 1 el más bajo, y 4 el más alto</p>
    
    
<form class="form-horizontal" action="calificar-j.php?id=<?php echo $id?>" method="post">
    <li>
        <ul class="choices">
            <table width="50%" align="center">
      <tr>
      	<div class="control-group <?php echo !empty($q0Error)?'error':'';?>">
	<h4>UTILIDAD</h4>
		<div class="controls">
			<td>
				<input name="q0" type="radio" value=1
	        		<?php echo ($q0 == 1)?'checked':'';?> >1</input>
	        	</td>
	        	<td>
	                    	<input name="q0" type="radio" value=2
	                    	<?php echo ($q0 == 2)?'checked':'';?> >2</input>
	               	</td>
	               	<td>
				<input name="q0" type="radio" value=3
	        		<?php echo ($q0 == 3)?'checked':'';?> >3</input>
	        	</td>
	        	<td>
	                    	<input name="q0" type="radio" value=4
	                    	<?php echo ($q0 == 4)?'checked':'';?> >4</input>
	               	</td>
		      	<?php if (!empty($q0Error)): ?>
	      		<span class="help-inline"><?php echo $q0Error;?></span>
		      	<?php endif;?>
		</div>
	</div>
      </tr>
    </table>
        </ul>
        
        <ul class="choices">
            <table width="50%" align="center">
      <tr>
        <div class="control-group <?php echo !empty($q1Error)?'error':'';?>">
	<h4>IMPACTO E INNOVACION</h4>
		<div class="controls">
			<td>
				<input name="q1" type="radio" value=1
	        		<?php echo ($q1 == 1)?'checked':'';?> >1</input>
	        	</td>
	        	<td>
	                    	<input name="q1" type="radio" value=2
	                    	<?php echo ($q1 == 2)?'checked':'';?> >2</input>
	               	</td>
	               	<td>
				<input name="q1" type="radio" value=3
	        		<?php echo ($q1 == 3)?'checked':'';?> >3</input>
	        	</td>
	        	<td>
	                    	<input name="q1" type="radio" value=4
	                    	<?php echo ($q1 == 4)?'checked':'';?> >4</input>
	               	</td>
		      	<?php if (!empty($q1Error)): ?>
	      		<span class="help-inline"><?php echo $q1Error;?></span>
		      	<?php endif;?>
		</div>
	</div>
      </tr>
    </table>
        </ul>
        
        <ul class="choices">
            <table width="50%" align="center">
      <tr>
        <div class="control-group <?php echo !empty($q2Error)?'error':'';?>">
	<h4>DESARROLLO Y RESULTADOS</h4>
		<div class="controls">
			<td>
				<input name="q2" type="radio" value=1
	        		<?php echo ($q2 == 1)?'checked':'';?> >1</input>
	        	</td>
	        	<td>
	                    	<input name="q2" type="radio" value=2
	                    	<?php echo ($q2 == 2)?'checked':'';?> >2</input>
	               	</td>
	               	<td>
				<input name="q2" type="radio" value=3
	        		<?php echo ($q2 == 3)?'checked':'';?> >3</input>
	        	</td>
	        	<td>
	                    	<input name="q2" type="radio" value=4
	                    	<?php echo ($q2 == 4)?'checked':'';?> >4</input>
	               	</td>
		      	<?php if (!empty($q2Error)): ?>
	      		<span class="help-inline"><?php echo $q2Error;?></span>
		      	<?php endif;?>
		</div>
	</div>
      </tr>
    </table>
        </ul>
        
        <ul class="choices">
            <table width="50%" align="center">
      <tr>
        <div class="control-group <?php echo !empty($q3Error)?'error':'';?>">
	<h4>CLARIDAD DE IDEAS</h4>
		<div class="controls">
			<td>
				<input name="q3" type="radio" value=1
	        		<?php echo ($q3 == 1)?'checked':'';?> >1</input>
	        	</td>
	        	<td>
	                    	<input name="q3" type="radio" value=2
	                    	<?php echo ($q3 == 2)?'checked':'';?> >2</input>
	               	</td>
	               	<td>
				<input name="q3" type="radio" value=3
	        		<?php echo ($q3 == 3)?'checked':'';?> >3</input>
	        	</td>
	        	<td>
	                    	<input name="q3" type="radio" value=4
	                    	<?php echo ($q3 == 4)?'checked':'';?> >4</input>
	               	</td>
		      	<?php if (!empty($q3Error)): ?>
	      		<span class="help-inline"><?php echo $q3Error;?></span>
		      	<?php endif;?>
		</div>
	</div>
      </tr>
    </table>
        </ul>
        
        <ul class="choices">
            <table width="50%" align="center">
      <tr>
        <div class="control-group <?php echo !empty($q4Error)?'error':'';?>">
	<h4>RESPUESTAS A PREGUNTAS</h4>
		<div class="controls">
			<td>
				<input name="q4" type="radio" value=1
	        		<?php echo ($q4 == 1)?'checked':'';?> >1</input>
	        	</td>
	        	<td>
	                    	<input name="q4" type="radio" value=2
	                    	<?php echo ($q4 == 2)?'checked':'';?> >2</input>
	               	</td>
	               	<td>
				<input name="q4" type="radio" value=3
	        		<?php echo ($q4 == 3)?'checked':'';?> >3</input>
	        	</td>
	        	<td>
	                    	<input name="q4" type="radio" value=4
	                    	<?php echo ($q4 == 4)?'checked':'';?> >4</input>
	               	</td>
		      	<?php if (!empty($q4Error)): ?>
	      		<span class="help-inline"><?php echo $q4Error;?></span>
		      	<?php endif;?>
		</div>
	</div>
      </tr>
    </table>
    
        </ul>
        
        <div class="form-actions">
		<button class="button" onclick="returnScore()">Calificar</button>
	</div>
	
	<div class="form-actions">
						<a class="btn" href="mis_proyectos_j.php">Regresar</a>
					</div>
        
</form>
  
</body>

</html>
