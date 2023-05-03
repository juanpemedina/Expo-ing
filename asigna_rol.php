<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/roles.css">
</head>
<header>
  <h1>Modificar Usuarios</h1>
  <nav>
    <a href="pagina_inicio_a.php">Home</a>
    <a href="about.php">About</a>
    <a href="jueces_de_proyectos.php">Jueces de Proyectos</a>
    <a href="asigna_rol.php">Asignar Roles</a>
  </nav>
</header>

<body>
  <h1> USUARIOS </h1>
  <div class="input-container">
    <input type="text" name="text" class="input" placeholder="Buscar Usuario">
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
  <button> Borrar</button>


  <table>
    <tr>
      <td>

        <div class="container">
          <input type="checkbox" id="cbx2" style="display: none;">
          <label for="cbx2" class="check">
            <svg width="18px" height="18px" viewBox="0 0 18 18">
              <path
                d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z">
              </path>
              <polyline points="1 9 7 14 15 4"></polyline>
            </svg>
          </label>
        </div>
      </td>
      <td>
        <img src="/images/borrego.png" </td>
      <td>
        <h2>Santiago Santos</h2>
      </td>
      <td>
        <div class="customCheckBoxHolder">

          <input class="customCheckBoxInput" id="cCB1" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB1">
            <div class="customCheckBox">
              <div class="inner">Alumno</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB2" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB2">
            <div class="customCheckBox">
              <div class="inner">Profesor</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB3" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB3">
            <div class="customCheckBox">
              <div class="inner">Juez</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB4" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB4">
            <div class="customCheckBox">
              <div class="inner">Administrador</div>
            </div>
          </label>

        </div>
      </td>
    </tr>


    <tr>
      <td>

        <div class="container">
          <input type="checkbox" id="cbx2" style="display: none;">
          <label for="cbx2" class="check">
            <svg width="18px" height="18px" viewBox="0 0 18 18">
              <path
                d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z">
              </path>
              <polyline points="1 9 7 14 15 4"></polyline>
            </svg>
          </label>
        </div>
      </td>
      <td>
        <img src="/images/borrego.png" </td>
      <td>
        <h2>Hector Kings</h2>
      </td>
      <td>
        <div class="customCheckBoxHolder">

          <input class="customCheckBoxInput" id="cCB11" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB11">
            <div class="customCheckBox">
              <div class="inner">Alumno</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB22" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB22">
            <div class="customCheckBox">
              <div class="inner">Profesor</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB33" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB33">
            <div class="customCheckBox">
              <div class="inner">Juez</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB44" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB44">
            <div class="customCheckBox">
              <div class="inner">Administrador</div>
            </div>
          </label>

        </div>
      </td>
    </tr>



    <tr>
      <td>

        <div class="container">
          <input type="checkbox" id="cbx2" style="display: none;">
          <label for="cbx2" class="check">
            <svg width="18px" height="18px" viewBox="0 0 18 18">
              <path
                d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z">
              </path>
              <polyline points="1 9 7 14 15 4"></polyline>
            </svg>
          </label>
        </div>
      </td>
      <td>
        <img src="/images/borrego.png" </td>
      <td>
        <h2>Juan Pedro</h2>
      </td>
      <td>
        <div class="customCheckBoxHolder">

          <input class="customCheckBoxInput" id="cCB111" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB111">
            <div class="customCheckBox">
              <div class="inner">Alumno</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB222" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB222">
            <div class="customCheckBox">
              <div class="inner">Profesor</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB333" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB333">
            <div class="customCheckBox">
              <div class="inner">Juez</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB444" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB444">
            <div class="customCheckBox">
              <div class="inner">Administrador</div>
            </div>
          </label>

        </div>
      </td>
    </tr>


    <tr>
      <td>

        <div class="container">
          <input type="checkbox" id="cbx2" style="display: none;">
          <label for="cbx2" class="check">
            <svg width="18px" height="18px" viewBox="0 0 18 18">
              <path
                d="M 1 9 L 1 9 c 0 -5 3 -8 8 -8 L 9 1 C 14 1 17 5 17 9 L 17 9 c 0 4 -4 8 -8 8 L 9 17 C 5 17 1 14 1 9 L 1 9 Z">
              </path>
              <polyline points="1 9 7 14 15 4"></polyline>
            </svg>
          </label>
        </div>
      </td>
      <td>
        <img src="/images/borrego.png" </td>
      <td>
        <h2>Jonesy Lopez</h2>
      </td>
      <td>
        <div class="customCheckBoxHolder">

          <input class="customCheckBoxInput" id="cCB1111" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB1111">
            <div class="customCheckBox">
              <div class="inner">Alumno</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB2222" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB2222">
            <div class="customCheckBox">
              <div class="inner">Profesor</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB3333" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB3333">
            <div class="customCheckBox">
              <div class="inner">Juez</div>
            </div>
          </label>

          <input class="customCheckBoxInput" id="cCB4444" type="checkbox">
          <label class="customCheckBoxWrapper" for="cCB4444">
            <div class="customCheckBox">
              <div class="inner">Administrador</div>
            </div>
          </label>

        </div>
      </td>
    </tr>



  </table>
</body>

</html>
