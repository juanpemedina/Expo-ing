<?PHP

session_start();

$_SESSION["TipoUsuario"] = 3;
header("Location: pagina_inicio_j.php");

?>
