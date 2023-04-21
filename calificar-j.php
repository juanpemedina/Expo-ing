<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <title>Calificar</title>
  <meta charset="UTF-8" />

  <link rel="stylesheet" href="css/calificajuez.css">

</head>

<header>
  <h1>Calificar Proyectos</h1>
</header>

<body>
  <!-- Comments -->
  <h1>Rubrica de Calificaciones</h1>
  <p> En este apartado podras calificar los proyectos respecto a 5 rúbricas evaluadas durante la exposición, cada una
    con un rango de calificación de 1 a 4, siendo 1 el más bajo, y 4 el más alto</p>
  <form>
    <h2>Utilidad</h2>
    <table width="50%" align="center">
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
      </tr>
      <tr>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
      </tr>
    </table>
    <h2>Impacto e Innovación</h2>
    <table width="50%" align="center">
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
      </tr>
      <tr>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
      </tr>
    </table>

    <h2>Desarrollo y Resultados</h2>
    <table width="50%" align="center">
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
      </tr>
      <tr>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
      </tr>
    </table>

    <h2>Claridad de Ideas</h2>
    <table width="50%" align="center">
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
      </tr>
      <tr>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
      </tr>
    </table>

    <h2>Respuestas a Preguntas</h2>
    <table width="50%" align="center">
      <tr>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
      </tr>
      <tr>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
        <td><input class="check" type="checkbox" /></td>
      </tr>
    </table>
    <tr>
      <input class="button" type="submit" name="" value="Calificar">
    </tr>
    </table>
  </form>
</body>

</html>
