<?php
session_start();
?>

<!DOCTYPE html>

<html>

<head>
  <title> Mi Proyecto </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/miproyectostyle.css">
</head>

<body>
  <h1> Mi Proyecto </h1>
  <table align="center" <tr>
    <td> Nombre del Proyecto - </td>
    <td> Área Estratégica - </td>
    <td> Nivel de Desarrollo </td>
    <td> <img src="images/pendiente.png" width="10"> </td>
    </tr>
  </table>
  <p align="center"><img src="images/imgProyecto.jpg" width="400"></p>
  <!--ESTO SOLO SALE A PROYECTOS AUTORIZADOS
  <form>
    <p> Escribr una Descipción: </p>
    <input type="text" />
  </form>
  -->
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
  <!--ESTO SOLO SALE A PROYECTOS AUTORIZADOS
  <table>
    <tr>
      <td> <img src="poster.jpg" width="200" alt="Poster" class="Poster"> </td>
      <td> <img src="video.jpg" width="200" alt="Video" class="Video"> </td>
    </tr>
    <tr>
      <td> <strong> POSTER </strong> </td>
      <td> <strong> VIDEO </strong> </td>
    </tr>
  </table>
  -->
  <!--ESTO SOLO SALE A PROYECTOS CALIFICADOS
  <h1> Calificaciones </h1>
  <p> #Calificación# <br>
    COMENTARIO DEL JUEZ <br>
    NOMBRE DEL JUEZ
  </p>
  <p> #Calificación# <br>
    COMENTARIO DEL JUEZ <br>
    NOMBRE DEL JUEZ
  </p>
  -->
</body>

</html>
