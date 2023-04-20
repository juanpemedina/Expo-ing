<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/proyectos2.css">
</head>
<header>
  <h1>BIO</h1>
</header>
<section id='steezy'>

  <body>

    <table>
      <tr>
        <td>
            <h1>Escoger</h1>
        </td>
        <td>
          <h1>Proyectos</h1>
        </td>
        <td>
          <h1>Descripcion</h1>
        </td>
        <td>
          <button>Borrar</button>
        </td>
      </tr>
      <tr>
        <td>
          <input type="checkbox" />
        </td>
        <td>
          <img id="foto" src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto</h2>
          <p>Nivel de desarrollo</p>
        </td>
        <td>
          <a href="miproyecto.php" class="btn btn-primary">Ver</a>
        </td>
      </tr>

      <tr>
        
        <td>
          <input type="checkbox" />
        </td>
        <td>
          <img id="foto" src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto</h2>
          <p>Nivel de desarrollo</p>
        </td>
        <td>
          <a href="miproyecto.php" class="btn btn-primary">Ver</a>
        </td>
      </tr>
      <tr>
        
        <td>
          <input type="checkbox" />
        </td>
        <td>
          <img id="foto" src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto</h2>
          <p>Nivel de desarrollo</p>
        </td>
        <td>
          <a href="miproyecto.php" class="btn btn-primary">Ver</a>
        </td>

      </tr>
      <tr>
      
        <td>
          <input type="checkbox" />
        </td>
        <td>
          <img id="foto" src="/images/imgProyecto.jpg">
        </td>
        <td>
          <h2>Proyecto</h2>
          <p>Nivel de desarrollo</p>
        </td>
        <td>
          <a href="miproyecto.php" class="btn btn-primary">Ver</a>
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
