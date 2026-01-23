<?php
require_once("../controller/UserController.php");
//pour appeller un methode ou une propriété static dans une class 
// j'utilise ::
UserController::register();
header("Location: ../index.php");