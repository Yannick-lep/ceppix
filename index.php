<?php
require_once("./inc/autoloader.php");
/* UserController::getUserByEmail();
FilmController::getFilmsByCast(); */

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    echo '<a href="./fakerouter.php?ctrl=user&meth=logout">Logout</a>';
} else {
    include_once("./public/templates/register.html.php");
    include_once("./public/templates/login.html.php");
    
}

