<?php
require_once("./inc/autoloader.php");
/* UserController::getUserByEmail();
FilmController::getFilmsByCast(); */

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . "/public/templates");
$twig = new \Twig\Environment($loader, [
    "cache" => false
]); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ceppix</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">CEPPIX
                                <span class="visually-hidden">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Films</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Series</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Separated link</a>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-sm-2" type="search" placeholder="Search">
                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])) {
            echo '<div>Bonjour ' . $_SESSION['usernom'] . ' 🫶 <img style="width:50px" src="./public/assets/avatar/thumbnail/' . $_SESSION['userid'] . '.webp"></div>';

            echo '<a href="./fakerouter.php?ctrl=user&meth=logout">Logout</a><br><br>';
            // formulaire de recherche
            echo SearchController::formSearch($twig);
            echo SearchController::resultSearch($twig);

            // afficher 10 films
            echo FilmController::getRandomFilms($twig);
            // affficher 10 series
            //include_once("./public/templates/previewSeries.html.php");
            echo SerieController::previewSeries($twig);
            echo PokemonController::randomPokemon($twig);
        } else {
            include_once("./public/templates/register.html.php");
            include_once("./public/templates/login.html.php");
        }
        ?>
    </main>
    <footer>
        <?php echo ChuckController::randomJoke($twig); ?>
    </footer>
</body>

</html>
