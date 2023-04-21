<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/jueces_de_pro.css">
</head>
<header>
  <h1>Asignacion de Jueces</h1>
  <nav>
    <a href="pagina_inicio_a.php">Home</a>
    <a href="about.html">About</a>
    <a href="jueces_de_proyectos.php">Jueces de Proyectos</a>
    <a href="asigna_rol.php">Asignar Roles</a>
  </nav>
</header>
<section id='steezy'>

  <body>
    <div class="input-container">
      <input type="text" name="text" class="input" placeholder="Buscar Proyecto">
      <span class="icon">
        <svg width="19px" height="19px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path opacity="1" d="M14 5H20" stroke="#000" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path opacity="1" d="M14 8H17" stroke="#000" stroke-width="1.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
            <path d="M21 11.5C21 16.75 16.75 21 11.5 21C6.25 21 2 16.75 2 11.5C2 6.25 6.25 2 11.5 2" stroke="#000"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path opacity="1" d="M22 22L20 20" stroke="#000" stroke-width="3.5" stroke-linecap="round"
              stroke-linejoin="round"></path>
          </g>
        </svg>
      </span>
    </div>

    <table>
      <tr>
        <td>
          <h1>Proyectos</h1>
        </td>
        <td>
          <h1>Descripcion</h1>
        </td>
        <td>
          <h3>Juez 1</h3>
        </td>
        <td>
          <h3>Juez 2</h3>
        </td>
        <td>
          <h3>Juez 3</h3>
        </td>
        <td>
          <h3>Juez 4</h3>
        </td>
        <td>
          <h3>Juez 5</h3>
        </td>
        <td>
          <button>Asignacion Automatica</button>
        </td>
      </tr>
      <tr>
        <td>
          <img src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto Ejemplo</h2>
          <p>Descripción del proyecto ejemplo</p>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>

        <td>
          <button>Asignar Manualmente</button>
        </td>
      </tr>

      <tr>
        <td>
          <img src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto Ejemplo</h2>
          <p>Descripción del proyecto ejemplo</p>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>

        <td>
          <button>Asignar Manualmente</button>
        </td>
      </tr>
      <tr>
        <td>
          <img src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto Ejemplo</h2>
          <p>Descripción del proyecto ejemplo</p>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>

        <td>
          <button>Asignar Manualmente</button>
        </td>
      </tr>
      <tr>
        <td>
          <img src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto Ejemplo</h2>
          <p>Descripción del proyecto ejemplo</p>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>
        <td>
          <h3>Juez Ejemplo</h3>
        </td>

        <td>
          <button>Asignar Manualmente</button>
        </td>
      </tr>
    </table>
  </body>

  <script>
    $(function () {
      $(window).scroll(function () {
        var winTop = $(window).scrollTop();
        if (winTop >= 30) {
          $("body").addClass("sticky-header");
        } else {
          $("body").removeClass("sticky-header");
        }//if-else
      });//win func.
    });//ready func.
  </script>

</html>
