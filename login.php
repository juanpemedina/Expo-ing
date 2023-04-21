<?PHP

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "CMar 22! 74!";
$dbname = "Pagina_Web";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn)
{
	die("No se logro la conexión: ".mysqli_connect_error());
}

$mail = $_POST["correo"];
$pass = $_POST["password"];

$_SESSION["Usuario"] = $pass;




$queryAl=mysqli_query($conn,"SELECT * FROM R_Alumno WHERE Matricula = '$mail' and Contrasenia = '$pass'");
$queryPr=mysqli_query($conn, "SELECT * FROM R_Profesor WHERE Nomina = '$mail' and Contrasenia = '$pass'");
$queryJu=mysqli_query($conn, "SELECT * FROM R_Juez WHERE Id_Juez = '$mail' and Contrasenia = '$pass'");
$queryAd=mysqli_query($conn, "SELECT Id_Admin, Contrasenia FROM R_Administrador WHERE Id_Admin = '$mail' and Contrasenia = '$pass'");

$nAl = mysqli_num_rows($queryAl);
$nPr = mysqli_num_rows($queryPr);
$nJu = mysqli_num_rows($queryJu);
$nAd = mysqli_num_rows($queryAd);

if ($nAl == 1)
{
	$_SESSION["TipoUsuario"] = 1;
	header("Location: pagina_inicio_e.php");
}
else if ($nPr == 1)
{
	$tipou = mysqli_fetch_column($queryPr,4);
	if ($tipou == 1)
	{
		header("Location: caso_prof_and_juez.php");
	}
	else
	{
		$_SESSION["TipoUsuario"] = 2;
		header("Location: pagina_inicio_p.php");
	}
}
else if ($nJu == 1)
{
	$_SESSION["TipoUsuario"] = 3;
	header("Location: pagina_inicio_j.php");
}
else if ($nAd == 1)
{
	$_SESSION["TipoUsuario"] = 4;
	header("Location: pagina_inicio_a.php");
}
else
{
	//header("Location: login.html");
	echo "Usuario No Encontrado";
}

?>
