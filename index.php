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
?>

<!--
Project: MuscleMap
Hosted on: https://cs4640.cs.virginia.edu/tmq6ed/musclemap/
Contributors:
- Andy Phan (tmq6ed): index.php, login.php, signup.php, home.php, header.php, footer.php, exercise.php, style.css,
                      Config.php, Database.php, AuthController.php, ExerciseController.php, MuscleMapController.php,
                      populate-database.php, view-database.php, exercise.js, home.js, signup.js
- Kevin Arleen (xsu4ju): workout-plan.php, workout-progress.php, workout-tracker.php, edit-workout-plan.php,
                         WorkoutModel.php, WorkoutController.php, home.js
-->