<?php
session_start();
define("ROOT", $_SERVER["REQUEST_URI"]);
require_once("src/variables.php");
require_once("views/layout/header.php");
if (
    !isset($_GET["c"]) and
    file_exists("controllers/Theme.php")
) {
    require_once("controllers/Theme.php");
    $controller = new Theme();
} elseif (
    isset($_GET["c"]) and
    file_exists("controllers/" . ucfirst($_GET["c"]) . ".php")
) {
    require_once("controllers/" . ucfirst($_GET["c"]) . ".php");
    $controller = ucfirst($_GET["c"]);
    $data = $_GET;
    unset($data["c"]);
    if (!empty($_POST)) {
        $controller = new $controller($_POST);
    } else {
        $controller = new $controller($data);
    }
} else {
    require_once("views/404.php");
}


require_once("views/layout/footer.php");
