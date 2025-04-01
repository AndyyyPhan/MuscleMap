<!-- https://cs4640.cs.virginia.edu/tmq6ed/MuscleMap -->

<?php

require_once(__DIR__ . "/../../src/musclemap/models/Config.php");
require_once(__DIR__ . "/../../src/musclemap/models/Database.php");
require_once(__DIR__ . "/../../src/musclemap/controllers/MuscleMapController.php");

$db = new Database();

error_reporting(E_ALL);
ini_set("display_errors", 1);

spl_autoload_register(function($classname) {
    include __DIR__ . "/../../src/musclemap/controllers/$classname.php";
});

$db = pg_connect("host=" . Config::$db["host"] . " port=" . Config::$db["port"] . " dbname=" . Config::$db["database"] . " user=" . Config::$db["user"] . " password=" . Config::$db["pass"]);

if (!$db) {
    die("Failed to connect to the database.");
}

$musclemap = new MuscleMapController($_GET, $db);
$musclemap -> run();