<?PHP

session_start();

$_SESSION["TipoUsuario"] = 2;
header("Location: pagina_inicio_p.php");

?>
