<?php
require_once("./inc/autoloader.php");
/* UserController::getUserByEmail();
FilmController::getFilmsByCast(); */

if(isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
    echo '<div>Bonjour '.$_SESSION['usernom'].' 🫶</div>';
    echo '<a href="./fakerouter.php?ctrl=user&meth=logout">Logout</a>';
    // afficher 10 films
    include_once("./public/templates/previewFilms.html.php");
} else {
    include_once("./public/templates/register.html.php");
    include_once("./public/templates/login.html.php");
}

