
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/mis_proyectos_j.css">
</head>

<body>
<section>
  <h1>Projects</h1>

  <div class="container">
  
  <?php
								   	include 'database.php';
								   	$pdo = Database::connect();
								   	$sql = 'SELECT * FROM R_Proyecto natural join R_Edicion natural join R_Area_Estrategica natural join R_Unidad_Formacion natural join R_Nivel_Desarrollo ORDER BY Id_Proyecto';
				 				   	foreach ($pdo->query($sql) as $row) {
				 				   	echo '<div class="item" id=' .$row['Id_Proyecto'] . '>';
								      	echo '<div class="text">';
										echo '<h3>'. $row['NombrePy'] . '</h3>';
										echo '<p>'. $row['Id_Proyecto'] . '</p>';
									  	echo '<p>'. $row['Nivel'] . '</p>';
								      	echo '</div>';
								      	echo '<div class="button">View More</div>';
								    	echo '</div>'; #SOLO IMPRIME 2 PROYECTOS DE LOS 8
									
								    }
								   	Database::disconnect();
				  				?>
				  				
    <div class="item" id="1"> <!--LO DE ARRIBA DEPENDE DE ESTO-->
      <img src="https://www.enter.co/wp-content/uploads/2017/10/robotica-en-sofa-2017.jpg" alt="">
      <div class="text">
        <h3>PROJECT 1</h3>
          <p>Short Description</p>
      </div>
      <div class="button">View More</div>
    </div>




  <!-- Modal -->
  <div id="preview" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <img id="img" src="">
      <div id="details">
        <h3 id="title"></h3>
        <p id="info">Some text</p>
        <div class="button" id="live">Calificar</div>
      </div>
    </div>
  </div>
</section>
  <script src="JavaScript/mis_proyectos_j.js"></script>
</body>
</html>
