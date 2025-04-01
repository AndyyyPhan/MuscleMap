<?php

require_once(__DIR__ . '/../models/Database.php');

class MuscleMapController {
    private $input;
    private $db;

    public function __construct($input, $db) {
        session_start();
        $this->input = $input;
        $this->db = new Database();
    }

    public function run() {

        $command = $this->input["command"] ?? "home";

        switch($command) {
            case "login":
            case "signup":
            case "logout":
                $controller = new AuthController($this->input, $this->db);
                $controller->run();
                break;
            case "exercise":
            case "get-exercises-json":
                $controller = new ExerciseController($this->input, $this->db);
                $controller->run();
                break;
            case "showWorkoutPlan":
                case "saveWorkoutProgress":
                case "showWorkoutProgress":
                case "editWorkoutPlan":
                case "updateWorkoutPlan":
                    $controller = new WorkoutController($this->input, $this->db->getConnection());
                    $controller->run();
                    break;
            default:
                $this->showHomePage();
                break;
        }
    }

    public function showHomePage() {
        include(__DIR__ . "/../views/home.php");
    }
}