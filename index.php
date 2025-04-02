<!-- https://cs4640.cs.virginia.edu/tmq6ed/MuscleMap -->

<?php

require_once(__DIR__ . "/../../src/musclemap/models/Config.php");
require_once(__DIR__ . "/../../src/musclemap/models/Database.php");
require_once(__DIR__ . "/../../src/musclemap/controllers/MuscleMapController.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);

spl_autoload_register(function($classname) {
    include __DIR__ . "/../../src/musclemap/controllers/$classname.php";
});

$input = array_merge($_GET, $_POST);
$musclemap = new MuscleMapController($input);
$musclemap -> run();