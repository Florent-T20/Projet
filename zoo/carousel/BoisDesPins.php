<?php
  require_once('../../back/access.php');

$host = 'localhost';
$dbname = 'projet_web_2425';
$user = 'root';
$pass = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Erreur de connexion à la base de données : " . $e->getMessage());
}

?>  


<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Le Bois des Pins</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="styles/carousel.css" rel="stylesheet">
  </head>
  <body>

    <!-- NE PAS PRENDRE EN COMPTE POUR LE MOMENT -->

    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <!-- FIN -->



<!-- DEBUT HEADER -->

    <!-- DEBUT BOUTON MODE CLAIR/NUIT -->

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    <!-- FIN BOUTON MODE CLAIR/NUIT -->
    

<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand">Bois des Pins</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../Projet.html">Home</a>
          </li>

          <!-- A PERSONNALISER -->
          <li class="nav-item">
            <a class="nav-link" href="../../profil.php">Profil</a>
          </li>

        </ul>

        <!-- RECHERCHE SUR LA PAGE -->
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="SearchInput">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        
      </div>
    </div>
  </nav>
</header>


<!-- FIN HEADER -->



<main>

<br /><br />

  <div class="container marketing">

    <h1>Bienvenue dans le biome <i>Le Bois des Pins</i></h1>

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">

        <!-- nom de l'enclos -->
      <?php

        $stmt = $pdo->prepare("SELECT * FROM enclosures WHERE enclosure_id = 10");
        $stmt->execute();
        $enclosure = $stmt->fetch(PDO::FETCH_ASSOC);

      ?>

              <!-- on récupère tous les animaux de l'enclos -->
      <?php
        $stmt = $pdo->prepare("SELECT * FROM animals WHERE enclosure_id = 10");
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

        <h2 class="featurette-heading fw-normal lh-1"><?php echo "{$enclosure['name']}";?></h2>

        <!-- affichage des animaux (espèce+nom) de l'enclos -->
      <?php

              if ($animals) {

                  echo '<p class="lead">Vous trouverez ici les animaux suivants :</p>';

                  foreach ($animals as $index => $row) {
                    foreach ($row as $key => $value) {
                      if ($key === 'species') {
                        echo '<p class="lead">Espèce : ' . htmlspecialchars($value) . '</p>';
                      }
                      if ($key === 'name') {
                        echo '<p class="lead">Nom : ' . htmlspecialchars($value) . '</p>';
                      }
                    }
                    echo '<br />';
                  }
              } else {
                  echo "Aucun animal dans l'enclos.";
              }
      ?>

      </div>
      <div class="col-md-5">
        
        <!-- insérer caroussel -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">

          <!-- ne pas toucher ce bouton -->
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

          <!-- rajouter des boutons sous cette forme en fonction du nombre d'animaux présents dans l'enclos -->
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        
        </div>
        <div class="carousel-inner">

      <?php

        if ($animals) {
          $isFirst = true;
          foreach ($animals as $animal) {
              $activeClass = $isFirst ? ' active' : '';
              $isFirst = false;
              
              echo '
              <div class="carousel-item' . $activeClass . '">
                  <img src="' . htmlspecialchars($animal['image']) . '" width="100%" height="100%">
                  <div class="container">
                      <div class="carousel-caption text-start">
                          <h1>' . htmlspecialchars($animal['species']) . '</h1>
                      </div>
                  </div>
              </div>';
          }
        } else {
          echo '<p>Aucune image disponible pour cet enclos.</p>';
        }

      ?>


          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


      </div>
    </div>


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">

        <!-- nom de l'enclos -->
        <?php

          $stmt = $pdo->prepare("SELECT * FROM enclosures WHERE enclosure_id = 11");
          $stmt->execute();
          $enclosure = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>

        <!-- on récupère tous les animaux de l'enclos -->
        <?php
          $stmt = $pdo->prepare("SELECT * FROM animals WHERE enclosure_id = 11");
          $stmt->execute();
          $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2 class="featurette-heading fw-normal lh-1"><?php echo "{$enclosure['name']}";?></h2>

        <!-- affichage des animaux (espèce+nom) de l'enclos -->
        <?php

          if ($animals) {

              echo '<p class="lead">Vous trouverez ici les animaux suivants :</p>';

              foreach ($animals as $index => $row) {
                foreach ($row as $key => $value) {
                  if ($key === 'species') {
                    echo '<p class="lead">Espèce : ' . htmlspecialchars($value) . '</p>';
                  }
                  if ($key === 'name') {
                    echo '<p class="lead">Nom : ' . htmlspecialchars($value) . '</p>';
                  }
                }
                echo '<br />';
              }
          } else {
              echo "Aucun animal dans l'enclos.";
          }
        ?>

      </div>
      <div class="col-md-5">
        
        <!-- insérer caroussel -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">

          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>


          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        
        </div>
        <div class="carousel-inner">

          <?php

            if ($animals) {
              $isFirst = true;
              foreach ($animals as $animal) {
                  $activeClass = $isFirst ? ' active' : '';
                  $isFirst = false;
                  
                  echo '
                  <div class="carousel-item' . $activeClass . '">
                      <img src="' . htmlspecialchars($animal['image']) . '" width="100%" height="100%">
                      <div class="container">
                          <div class="carousel-caption text-start">
                              <h1>' . htmlspecialchars($animal['species']) . '</h1>
                          </div>
                      </div>
                  </div>';
              }
            } else {
              echo '<p>Aucune image disponible pour cet enclos.</p>';
            }

          ?>

          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">

        <!-- nom de l'enclos -->
      <?php

        $stmt = $pdo->prepare("SELECT * FROM enclosures WHERE enclosure_id = 12");
        $stmt->execute();
        $enclosure = $stmt->fetch(PDO::FETCH_ASSOC);

      ?>

              <!-- on récupère tous les animaux de l'enclos -->
      <?php
        $stmt = $pdo->prepare("SELECT * FROM animals WHERE enclosure_id = 12");
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

        <h2 class="featurette-heading fw-normal lh-1"><?php echo "{$enclosure['name']}";?></h2>

        <!-- affichage des animaux (espèce+nom) de l'enclos -->
      <?php

              if ($animals) {

                  echo '<p class="lead">Vous trouverez ici les animaux suivants :</p>';

                  foreach ($animals as $index => $row) {
                    foreach ($row as $key => $value) {
                      if ($key === 'species') {
                        echo '<p class="lead">Espèce : ' . htmlspecialchars($value) . '</p>';
                      }
                      if ($key === 'name') {
                        echo '<p class="lead">Nom : ' . htmlspecialchars($value) . '</p>';
                      }
                    }
                    echo '<br />';
                  }
              } else {
                  echo "Aucun animal dans l'enclos.";
              }
      ?>

      </div>
      <div class="col-md-5">
        
        <!-- insérer caroussel -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">

          <!-- ne pas toucher ce bouton -->
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

          <!-- rajouter des boutons sous cette forme en fonction du nombre d'animaux présents dans l'enclos -->
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        
        </div>
        <div class="carousel-inner">

      <?php

        if ($animals) {
          $isFirst = true;
          foreach ($animals as $animal) {
              $activeClass = $isFirst ? ' active' : '';
              $isFirst = false;
              
              echo '
              <div class="carousel-item' . $activeClass . '">
                  <img src="' . htmlspecialchars($animal['image']) . '" width="100%" height="100%">
                  <div class="container">
                      <div class="carousel-caption text-start">
                          <h1>' . htmlspecialchars($animal['species']) . '</h1>
                      </div>
                  </div>
              </div>';
          }
        } else {
          echo '<p>Aucune image disponible pour cet enclos.</p>';
        }

      ?>


          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


      </div>
    </div>


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">

        <!-- nom de l'enclos -->
        <?php

          $stmt = $pdo->prepare("SELECT * FROM enclosures WHERE enclosure_id = 13");
          $stmt->execute();
          $enclosure = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>

        <!-- on récupère tous les animaux de l'enclos -->
        <?php
          $stmt = $pdo->prepare("SELECT * FROM animals WHERE enclosure_id = 13");
          $stmt->execute();
          $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2 class="featurette-heading fw-normal lh-1"><?php echo "{$enclosure['name']}";?></h2>

        <!-- affichage des animaux (espèce+nom) de l'enclos -->
        <?php

          if ($animals) {

              echo '<p class="lead">Vous trouverez ici les animaux suivants :</p>';

              foreach ($animals as $index => $row) {
                foreach ($row as $key => $value) {
                  if ($key === 'species') {
                    echo '<p class="lead">Espèce : ' . htmlspecialchars($value) . '</p>';
                  }
                  if ($key === 'name') {
                    echo '<p class="lead">Nom : ' . htmlspecialchars($value) . '</p>';
                  }
                }
                echo '<br />';
              }
          } else {
              echo "Aucun animal dans l'enclos.";
          }
        ?>

      </div>
      <div class="col-md-5">
        
        <!-- insérer caroussel -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">

          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>


          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        
        </div>
        <div class="carousel-inner">

          <?php

            if ($animals) {
              $isFirst = true;
              foreach ($animals as $animal) {
                  $activeClass = $isFirst ? ' active' : '';
                  $isFirst = false;
                  
                  echo '
                  <div class="carousel-item' . $activeClass . '">
                      <img src="' . htmlspecialchars($animal['image']) . '" width="100%" height="100%">
                      <div class="container">
                          <div class="carousel-caption text-start">
                              <h1>' . htmlspecialchars($animal['species']) . '</h1>
                          </div>
                      </div>
                  </div>';
              }
            } else {
              echo '<p>Aucune image disponible pour cet enclos.</p>';
            }

          ?>

          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


      </div>
    </div>


    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">

        <!-- nom de l'enclos -->
      <?php

        $stmt = $pdo->prepare("SELECT * FROM enclosures WHERE enclosure_id = 14");
        $stmt->execute();
        $enclosure = $stmt->fetch(PDO::FETCH_ASSOC);

      ?>

              <!-- on récupère tous les animaux de l'enclos -->
      <?php
        $stmt = $pdo->prepare("SELECT * FROM animals WHERE enclosure_id = 14");
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>

        <h2 class="featurette-heading fw-normal lh-1"><?php echo "{$enclosure['name']}";?></h2>

        <!-- affichage des animaux (espèce+nom) de l'enclos -->
      <?php

              if ($animals) {

                  echo '<p class="lead">Vous trouverez ici les animaux suivants :</p>';

                  foreach ($animals as $index => $row) {
                    foreach ($row as $key => $value) {
                      if ($key === 'species') {
                        echo '<p class="lead">Espèce : ' . htmlspecialchars($value) . '</p>';
                      }
                      if ($key === 'name') {
                        echo '<p class="lead">Nom : ' . htmlspecialchars($value) . '</p>';
                      }
                    }
                    echo '<br />';
                  }
              } else {
                  echo "Aucun animal dans l'enclos.";
              }
      ?>

      </div>
      <div class="col-md-5">
        
        <!-- insérer caroussel -->
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">

          <!-- ne pas toucher ce bouton -->
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

          <!-- rajouter des boutons sous cette forme en fonction du nombre d'animaux présents dans l'enclos -->
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        
        </div>
        <div class="carousel-inner">

      <?php

        if ($animals) {
          $isFirst = true;
          foreach ($animals as $animal) {
              $activeClass = $isFirst ? ' active' : '';
              $isFirst = false;
              
              echo '
              <div class="carousel-item' . $activeClass . '">
                  <img src="' . htmlspecialchars($animal['image']) . '" width="100%" height="100%">
                  <div class="container">
                      <div class="carousel-caption text-start">
                          <h1>' . htmlspecialchars($animal['species']) . '</h1>
                      </div>
                  </div>
              </div>';
          }
        } else {
          echo '<p>Aucune image disponible pour cet enclos.</p>';
        }

      ?>


          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>


      </div>
    </div>


    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->



  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end">
      <a href="#">Retourner en haut de page</a>
    </p>
    <p>&copy; 2024–2024 Mathys, Florent & Erwan &middot; <a href="index.html">Retour</a></p>
  </footer>


</main>

<!-- search bar -->
<script src="scripts/SearchBar.js"></script>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>
