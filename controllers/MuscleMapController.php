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
                $controller = new AuthController($this->input);
                break;
            default:
                $this->showHomePage();
                break;
        }
    }

    public function showHomePage() {
        include "views/home.php";
    }
}