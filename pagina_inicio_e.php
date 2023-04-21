<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Estudiante</title>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--Montserrat font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/pagina_inicio.css" />
    <script src="https://unpkg.com/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="JavaScript/menu.js"></script>
  </head>
  <body>   
    <section>
      <!-- MOBILE NAVIGATION -->
      <div id="mobile-nav" class="w3-bar-block w3-hide w3-hide-large w3-hide-medium w3-sticky">
        <a href="#about" class="w3-bar-item w3-button w3-center w3-hover-none w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green" onclick="toggleNavigation()">ABOUT</a>
        <a href="#resume" class="w3-bar-item w3-button w3-center w3-hover-none w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green" onclick="toggleNavigation()">RESUME</a>
        <a href="#contact" class="w3-bar-item w3-button w3-center w3-hover-none w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green" onclick="toggleNavigation()">CONTACT</a>
      </div>

      <!-- SOCIAL SECTION -->
      <section class="image-section w3-quarter w3-fixed w3-padding-small">
        <!--IMAGE/AVATAR-->
        <img src="images/avatar.png" class="w3-circle w3-border w3-border-sand" style="border-width: 3px !important;"/>
        <!--SCIAL NETWORK BUTTONS-->
        <div class="links w3-margin-top w3-padding-small">
          <a class="icon-link w3-text-sand w3-hover-text-amber" href="#facebook" target="_blank">
              <i data-feather="facebook"></i>
          </a>
          <a class="icon-link w3-text-sand w3-hover-text-amber" href="#instagram" target="_blank">
             <i data-feather="instagram"></i>
          </a>
          <a class="icon-link w3-text-sand w3-hover-text-amber" href="#twitter" target="_blank">
             <i data-feather="twitter"></i>
          </a>
          <a class="icon-link w3-text-sand w3-hover-text-amber" href="#linkedin" target="_blank">
             <i data-feather="linkedin"></i>
          </a>
        </div>
        <!--CV Upload BUTTON-->
        <div class="w3-container w3-padding-16">
          <a href="registro.php" class="w3-amber w3-hover-amber w3-button w3-round-small w3-hover-deep-orange w3-padding-large">
            <i data-feather="arrow-up" style="vertical-align: -0.35em;"></i>
            <span class="w3-margin-left download-text">Registrar Proyecto</span>
          </a>
        </div>
      </section>

      <!--CV CONTENT SECTION-->
      <section class="w3-threequarter w3-padding-large w3-right">
        <!--DESKTOP NAVIGATION-->
        <div class="w3-container w3-padding-large w3-border-bottom w3-hide-small">
          
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#" class="center">Pagina de Inicio</a>
            <a href="registro.php" class="center">Registrar</a>
            <a href="#" class="center">Mis Proyectos</a> <!--FALTA CONECTAR ESTE BOTON-->
            <a href="proyectos1.php" class="center">Proyectos</a>
            <a href="about.html" class="center">About</a>
          </div>

          <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="center">&#9776; Menu</span>

          <a href="#about" class="w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green w3-right w3-hide-small" style="border-width: 2px !important;" onclick="toggleNavigation()">ABOUT</a>
          <a href="#faq" class="w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green w3-right w3-hide-small" style="border-width: 2px !important;" onclick="toggleNavigation()">FAQ</a>
          <a href="#anuncios" class="w3-bar-item w3-button w3-hover-none w3-border-white w3-bottombar w3-hover-border-green w3-hover-text-green w3-right w3-hide-small" style="border-width: 2px !important;" onclick="toggleNavigation()">ANUNCIOS</a>
        </div>
        <div class="content-container w3-margin-top-2">
          <!--HOME SECTION-->
          <div id="home" class="home w3-container w3-margin-top-4 w3-cursive">
            <h1>Bienvenido a Expo-Ingenierias</h2>
            <h2>2023</h3>
            <img src="images/expo.png">
          </div>

          <!--ABOUT SECTION-->
          <div id="about" class="w3-container w3-margin-top-20-percent w3-cursive w3-large">
            <h2 class="w3-border-bottom w3-border-amber" style="border-width: 3px !important;">ABOUT</h2>
            <p class="w3-margin-top-2"> 
              En la Escuela de Ingeniería y Cienciasdel Tec de Monterrey estamos convencidos 
              de que el ingenio humano es lo que transforma al mundo.
            </p>
          </div>

          <!--Anuncios-->
          <div id="anuncios" class="w3-container w3-margin-top-20-percent w3-cursive">
            <h2 class="w3-border-bottom w3-border-amber" style="border-width: 3px !important;">Anuncios</h2>
            <div class="w3-container w3-margin-top-2 w3-cursive">

              <!--Announcements-->
              <h4 class="w3-border-amber">¡Bienvenidos a la feria de ingeniería!</h4>
              <div class="">
                <h5>General</h5>
                <p>March 2023 - Present</p>
                <ul class="w3-ul" style="font-weight: 500;">
                  <li>Recuerden mantener la distancia social y seguir las medidas de higiene en todo momento</li>
                </ul>
              </div>
              <div class="">
                <h4>¡Atención estudiantes!</h4>
                <h5>Alumnos</h5>
                <p>March 2023 - Present</p>
                <ul class="w3-ul" style="font-weight: 500;">
                  <li>El plazo para el registro de proyectos ha sido extendido hasta el próximo viernes</li>
                </ul>
              </div>
            </div>

          <!--FAQ-->
          <div id="faq" class="w3-container w3-margin-top-20-percent w3-cursive">
            <h2 class="w3-border-bottom w3-border-amber" style="border-width: 3px !important;">FAQ</h3>
            <section class="faq-container">
    
              <div class="faq-one">
                <h3 class="faq-page">¿Cómo registro mi proyecto?</h3>
                <div class="faq-body">
                  <p>El registro de proyecto se lleva a cabo en la parte de arriba de la pagina oficial, no podras estar registrado hasta que tu profesor autoricé el proyecto</p>
                </div>
              </div>
              <hr class="hr-line">

              <div class="faq-two">
                <h3 class="faq-page">¿Donde veo los proyectos de la feria?</h3>
                <div class="faq-body">
                  <p>En la sección de Proyectos, ubicada a un lado de registrar proyecto</p>
                </div>
              </div>
              <hr class="hr-line">

              <div class="faq-three">
                <h3 class="faq-page">¿Dónde veo mi lugar?</h3>
                <div class="faq-body">
                  <p>En la parte inferior podrás visualizar la ubicación de los proyectos, encuentra el nombre dle tuyo y acude a tu stand</p>
                </div>
              </div>
            </section>
            <script src="JavaScript/faq.js"></script>
          </div>
      </section>      
    </section>
    <script>
      // Function to toggle mobile navigation
      function toggleNavigation() {
        let nav = document.getElementById("mobile-nav");
        if (nav.classList.contains('w3-show')) {
          nav.classList.remove('w3-show');
        } else { 
          nav.classList.add('w3-show');
        }
      }
    </script>
    <script>
      // Script to load feather icons
      feather.replace()
    </script>
  </body>
</html>
