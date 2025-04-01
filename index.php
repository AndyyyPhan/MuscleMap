<!-- https://cs4640.cs.virginia.edu/tmq6ed/MuscleMap -->

<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

spl_autoload_register(function($classname) {
    include __DIR__ . "/../../src/musclemap/controllers/$classname.php";
});

$musclemap = new MuscleMapController($_GET);
$musclemap -> run();