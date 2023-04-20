<?php


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
			header("Location: index.php");
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
  <section class="form-registro">
    <form class="form">
      <h1>Registra los datos de tu proyecto aqui</h1>
      <input type="text" class="input" placeholder="Nombre del proyecto">
      <input type="text" class="input" placeholder="Descripcion">
      
      <select name="Areas" id="Area_estrategica" class="input" placeholder="Area">
        <option value="Selecciona">Selecciona tu Area Estrategica</option>
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


      <select name="Nivel" id="Nivel_desarrollo" class="input">
        <option value="Selecciona">Selecciona tu Nivel de Desarrollo</option>
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
            
      <input type="text" class="input" placeholder="Inserta el link de tus archivos multimedia">

      <select name="profesores" id="prof" class="input" placeholder="Area"> <!--FALTA BUSQUEDA PROFESOR-->
        <option value="profesores">Selecciona tu a tu profesor</option>
        <option value="prof1">profesor1</option>
        <option value="prof2">profesor2</option>
        <option value="prof3">profesor3</option>
        <option value="prof4">profesor4</option>
      </select>

      <select name="profesores" id="prof" class="input" placeholder="Area">
        <option value="Ufs">Selecciona tu Unidad de Formacion</option>
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

      <select name="alumnos" id="alumn" class="input" placeholder="Area"> <!--FALTA BUSQUEDA ESTUDIANTE-->
        <option value="Ufs">Selecciona a tu compañeros</option>
        <option value="a0174352">Hector Kings</option>
        <option value="a018471">Cesar war</option>
        <option value="a0146194">JP</option>
        <option value="a0147592">San Santos</option>
      </select>

      <div id="estudiantes">
        <div class="estudiante">
          <label for="estudiante1">Estudiante 1:</label>
          <input type="text" id="estudiante1" name="estudiante1">
        </div>
      </div>

      <button id="add-estudiante">Agregar estudiante</button>

      <button>
        <div class="svg-wrapper-1">
          <div class="svg-wrapper">
            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0h24v24H0z" fill="none"></path>
              <path
                d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
                fill="currentColor"></path>
            </svg>
          </div>
        </div>
        <span>Registrar Proyecto</span>
      </button>



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
