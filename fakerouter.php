<?php
require_once("./inc/autoloader.php");
// GET ctrl=user&meth=register
if (isset($_GET['ctrl']) && !empty($_GET['ctrl'])) {
    if ($_GET['ctrl'] === "user" &&  $_GET['meth'] === "register") {
        //pour appeller un methode ou une propriété static dans une class 
        // j'utilise ::
        UserController::register();
    }
    if ($_GET['ctrl'] === "user" &&  $_GET['meth'] === "login") {
        UserController::login();
    }
}
header("Location: ./index.php");
