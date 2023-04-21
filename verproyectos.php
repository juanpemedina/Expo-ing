<?php
session.start();
?>

<!DOCTYPE html>

<html>

<head>
  <title> Ver Proyectos </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/miproyectostyle.css">
</head>

<body>
  <img src="images/check.png" width="50" alt="Check" class="Check" align="right">
  <img src="images/calif.png" width="50" alt="Calif" class="Calif" align="right">
  <h1> Proyecto BIO </h1>

  <table align="center">
    <tr>
      <td> Nombre del Proyecto - </td>
      <td> Área Estratégica - </td>
      <td> Nivel de Desarrollo </td>
    </tr>
  </table>
  <p align="center"><img src="images/imgProyecto.jpg" width="400" alt="Proyecto" class="Proyecto"></p>

  <form>
    <p> Escribr una Descipción: </p>
    <p align="center"> <textarea name="comentario" rows="5" cols="70"> DESCRIPCION </textarea> </p>
  </form>

  <h2> Integrantes </h2>
  <table>
    <tr>
      <td> Nombre de Integrante - </td>
      <td> Matricula de Integrante </td>
    </tr>
    <tr>
      <td> Nombre de Integrante - </td>
      <td> Matricula de Integrante </td>
    </tr>
  </table>
  <h2> Profesor </h2>
  <p> Nombre de Profesor </p>

  <table align="center">
    <tr>
      <td> <img src="images/poster.jpg" width="200" alt="Poster" class="Poster"> </td>
      <td> <img src="images/video.jpg" width="200" alt="Video" class="Video"> </td>
    </tr>
    <tr>
      <td> <strong> POSTER </strong> </td>
      <td> <strong> VIDEO </strong> </td>
    </tr>
  </table>

  <table border='0' width='480px' cellpadding='0' cellspacing='0' align='center'>
    <tr>
      <h2 align="center">Jueces</h2>
    </tr>
    <tr>
      <td>Nombre</td>
      <td>Nombre</td>
      <td>Nombre</td>
    </tr>
    <tr>
      <td>Correo</td>
      <td>Correo</td>
      <td>Correo</td>
    </tr>
  </table>

</body>

</html>
