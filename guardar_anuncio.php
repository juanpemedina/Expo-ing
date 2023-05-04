<?php
include 'database.php';
$pdo = database::connect();

if (isset($_POST['anuncio'])) {
  $anuncio = $_POST['anuncio'];
  $titulo = $_POST['titulo'];
  $id_admin = 'Ad0000000'; // El id del administrador actual, por ejemplo.

  $sql = "INSERT INTO R_Anuncios (Titulo, Texto, Id_Admin) VALUES (:titulo, :texto, :id_admin)";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':titulo', $titulo);
  $stmt->bindParam(':texto', $anuncio);
  $stmt->bindParam(':id_admin', $id_admin);
  
  if ($stmt->execute()) {
    header("Location: pagina_inicio_a.php?success=1#anuncios");
  } else {
    echo "Error al publicar el anuncio: " . $stmt->errorInfo()[2];
  }
}

?>
