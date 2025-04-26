<?php

require_once(__DIR__ . '/../models/Database.php');

class ExerciseController {
    private $input;
    private $db;

    public function __construct($input, $db) {
        $this->input = $input;
        $this->db = $db;
    }

    public function run() {
        $command = $this->input['command'] ?? 'exercise';

        switch ($command) {
            case 'get-exercises-json':
                $this->returnExerciseJSON();
                break;

            default:
                $this->showExercisePage();
                break;
        }
    }

    private function showExercisePage() {
        $muscle_group = ucfirst(strtolower($this->input['muscle'] ?? 'all'));

        if ($muscle_group === 'all') {
            $exercises = $this->db->query("SELECT * FROM musclemap_exercises");
        } else {
            $exercises = $this->db->query("SELECT * FROM musclemap_exercises WHERE muscle_group = $1", $muscle_group);
        }

        include(__DIR__ . '/../views/exercise.php');
    }

    private function returnExerciseJSON() {
        header('Content-Type: application/json');
    
        $exercises = $this->db->query("SELECT id, name, description, difficulty, muscle_group FROM musclemap_exercises ORDER BY muscle_group, name");
    
        echo json_encode($exercises, JSON_PRETTY_PRINT);
    }
}
