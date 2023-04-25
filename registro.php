<?php

session_start();
$user = $_SESSION["Usuario"];

	require 'database.php';

		$nombError = null;
		$descError = null;
		$multError = null;
		$areaError = null;
		$ufError = null;
		$nivelError = null;
		$nomiError = null;
		$matriError = null;
		$matri2Error = null;
		$matri3Error = null;
		$matri4Error = null;
	if ( !empty($_POST)) {

		$nomb = $_POST['nomb'];
		$desc = $_POST['desc'];
		$mult = $_POST['mult'];
		$area = $_POST['area'];
		$uf = $_POST['uf'];
		$nivel = $_POST['nivel'];
		$nomi = $_POST['nomi'];
		$matri = $_POST['matri'];
		$matri2 = $_POST['matri2'];
		$matri3 = $_POST['matri3'];
		$matri4 = $_POST['matri4'];
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

		if (empty($matri2)) {
			$matriError = 'Por favor selecciona a los integrantes';
			$valid = false;
		}

		if (empty($matri3)) {
			$matriError = 'Por favor selecciona a los integrantes';
			$valid = false;
		}

		if (empty($matri4)) {
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

			$sql2 = 'INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES ("' . $user . '", (SELECT MAX(Id_Proyecto) FROM R_Proyecto))';
			$pdo->query($sql2);


$sql11 = "INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES (:matri, (SELECT MAX(Id_Proyecto) FROM R_Proyecto))";
$q2 = $pdo->prepare($sql11);
$q2->bindParam(':matri', $matri);
$q2->execute();

$sql12 = "INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES (:matri2, (SELECT MAX(Id_Proyecto) FROM R_Proyecto))";
$q22 = $pdo->prepare($sql12);
$q22->bindParam(':matri2', $matri2);
$q22->execute();


$sql13 = "INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES (:matri3, (SELECT MAX(Id_Proyecto) FROM R_Proyecto))";
$q23 = $pdo->prepare($sql13);
$q23->bindParam(':matri3', $matri3);
$q23->execute();


$sql14 = "INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES (:matri4, (SELECT MAX(Id_Proyecto) FROM R_Proyecto))";
$q24 = $pdo->prepare($sql14);
$q24->bindParam(':matri4', $matri4);
$q24->execute();




//$slq4 = 'INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES ("' . $matri . '", (SELECT MAX (Id_Proyecto) FROM R_Proyecto))';
//			$pdo->query($sql4);



//			$slq3 = 'INSERT INTO R_Alumno_Proyecto (Matricula, Id_Proyecto) VALUES ("' . $matri . '", (SELECT MAX (Id_Proyecto) FROM R_Proyecto))';
//			$pdo->query($sql3);

			Database::disconnect();
			header("Location: pagina_inicio_e.php");
		}
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>Registro</title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/registrostyle.css">
</head>

<body>

<section class="w3-threequarter w3-padding-large w3-right"> <!--NO FUNCIONA BIEN EL SIDEBAR-->
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">

          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="pagina_inicio_e.php" class="center">Pagina de Inicio</a>
            <a href="#" class="center">Registrar</a>
            <a href="#" class="center">Mis Proyectos</a> <!--FALTA CONECTAR ESTE BOTON-->
            <a href="proyectos1.php" class="center">Proyectos</a>
            <a href="about.html" class="center">About</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>

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


      <div class="control-group <?php echo !empty($matriError)?'error':'';?>"> <!--¿CÓMO METO LA Id_Proyecto DEL QUE APENAS VOY A CREAR A R_Alumno_Proyecto-->
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
<div class="control-group <?php echo !empty($matriError)?'error':'';?>"> <!--¿CÓMO METO LA Id_Proyecto DEL QUE APENAS VOY A CREAR A R_Alumno_Proyecto-->
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
					      	<?php if (($matriError) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div>
<div class="control-group <?php echo !empty($matriError)?'error':'';?>"> <!--¿CÓMO METO LA Id_Proyecto DEL QUE APENAS VOY A CREAR A R_Alumno_Proyecto-->
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
					      	<?php if (($matriError) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div><div class="control-group <?php echo !empty($matriError)?'error':'';?>"> <!--¿CÓMO METO LA Id_Proyecto DEL QUE APENAS VOY A CREAR A R_Alumno_Proyecto-->
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
					      	<?php if (($matriError) != null) ?>
					      		<span class="help-inline"><?php echo $matriError;?></span>
						</div>
					</div>




          <div class="form-actions">
				<button type="nomit" class="btn btn-success">Agregar Proyecto</button>
	</div>

    </form>

  </section>


</body>

<script>
  // Obtener los elementos del DOM
  var estudiantesContainer = document.getElementById("estudiantes");
  var addEstudianteBtn = document.getElementById("add-estudiante");

  // Contador para llevar la cuenta de los estudiantes
  var contadorEstudiantes = 1;

  // Función para agregar un nuevo estudiante
  function agregarEstudiante() {
    contadorEstudiantes++;

    // Crear el nuevo elemento HTML para el estudiante
    var nuevoEstudiante = document.createElement("div");
    nuevoEstudiante.classList.add("estudiante");

    var label = document.createElement("label");
    label.htmlFor = "estudiante" + contadorEstudiantes;
    label.innerHTML = "Estudiante " + contadorEstudiantes + ":";

    var input = document.createElement("input");
    input.type = "text";
    input.id = "estudiante" + contadorEstudiantes;
    input.name = "estudiante" + contadorEstudiantes;

    nuevoEstudiante.appendChild(label);
    nuevoEstudiante.appendChild(input);

    // Agregar el nuevo elemento al contenedor de estudiantes
    estudiantesContainer.appendChild(nuevoEstudiante);
  }

  // Agregar un evento click al botón "Agregar estudiante"
  addEstudianteBtn.addEventListener("click", agregarEstudiante);

</script>

</html>
