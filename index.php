<?php
require_once("./inc/autoloader.php");
var_dump(__DIR__."/controller/UserController.php");
UserController::getUserByEmail();
FilmController::getFilmsByCast();
/* include_once("./public/templates/register.html.php"); */