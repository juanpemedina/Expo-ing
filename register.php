<?PHP

session_start();

$dbhost = "localhost";
$dbuser = "alberto";
$dbpass = "root";
$dbname = "CMar 22! 74!";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn)
{
	die("No hay Conexión: ".mysqli_connect_error());
}

$name = $_POST["nombre"];
$lastn = $_POST["apellido"];
$tipou = $_POST["tusuario"];
$mail = $_POST["correo"];
$pass = $_POST["password"];

$queryAl=mysqli_query($conn,"SELECT * FROM R_Alumno WHERE Matricula = '$mail'");
$queryPr=mysqli_query($conn, "SELECT * FROM R_Profesor WHERE Nomina = '$mail'");
$queryJu=mysqli_query($conn, "SELECT * FROM R_Juez WHERE Id_Juez = '$mail'");

$nAl = mysqli_num_rows($queryAl);
$nPr = mysqli_num_rows($queryPr);
$nJu = mysqli_num_rows($queryJu);


if ($nAl == 1)
{
	echo "Un usuario ya usa este correo";
}
else if ($nPr == 1)
{
	echo "Un usuario ya usa este correo";
}
else if ($nJu == 1)
{
	echo "Un usuario ya usa este correo";
}
else
{
	if ($tipou == "Estudiante")
	{
		$result = mysqli_query($conn, "INSERT INTO R_Alumno(Matricula, Contrasenia, NombreAl, ApellidoAl) VALUES('$mail', '$pass', '$name', '$lastn')");
		echo "Est";
	}
	else if ($tipou == "Profesor")
	{
		$result = mysqli_query($conn, "INSERT INTO R_Profesor(Nomina, Contrasenia, NombrePr, ApellidoPr) VALUES('$mail', '$pass', '$name', '$lastn')");
	}
	else if ($tipou == "Juez")
	{
		$result = mysqli_query($conn, "INSERT INTO R_Juez(Id_Juez, Contrasenia, NombreJu, ApellidoJu) VALUES('$mail', '$pass', '$name', '$lastn')");
		echo "Adios";
	}
	if ($result) {
		header("Location: login.html");	
	}
	else {
		echo "Usuario No Creado";
	}
}

?>
