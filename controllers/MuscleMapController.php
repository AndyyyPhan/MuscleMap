<?php

class MuscleMapController {
    public function __construct($input) {
        $this->input = $input;
    }

    public function run() {

        $command = $this->input["command"] ?? "home";

        switch($command) {
            case "login":
            case "signup":
            case "logout":
                $controller = new AuthController($this->input);
                $controller->run();
                break;
            case "exercise":
            case "get-exercises-json":
                $controller = new ExerciseController($this->input);
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