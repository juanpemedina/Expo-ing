<!DOCTYPE html>

<html>

<head>
  <title> Caso </title>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="css/cas0_prof_and_juez.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
 
<body>
  <section class="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="images/prueba.png" alt="logo" width="200"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="signup.html">Sign up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.html">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <section class="form-caso">
    <img src="images/expo.png" alt="logo" class="logo">
    <h2>¿Cómo desea entrar hoy?</h2>
    <button onclick="window.location.href = 'pagina_inicio_p.php'" class="buttons">Docente </button> 
    <button onclick="window.location.href = 'pagina_inicio_j.php'" class="buttons">Juez</button> 
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>


</html>
