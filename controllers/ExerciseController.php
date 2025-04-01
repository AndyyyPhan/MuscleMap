<?php

class ExerciseController {
    private $input;

    public function __construct($input) {
        $this->input = $input;
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
        include(__DIR__ . '/../views/exercise.php');
    }

    private function returnExerciseJSON() {
        header('Content-Type: application/json');

        $muscle = $this->input['muscle'] ?? 'biceps';

        // 🚧 Later: Pull this from a DB using a DB model
        // Example: $db = new DB(); $exercises = $db->getExercisesByMuscle($muscle);
        $exercises = $this->getSampleExercises($muscle);

        echo json_encode($exercises);
    }

    // Temporary data for now — replace with database query later
    private function getSampleExercises($muscle) {
        $data = [
            'biceps' => [
                ['name' => 'Bicep Curl', 'difficulty' => 'Beginner', 'description' => 'Curl dumbbells to your shoulder.'],
                ['name' => 'Hammer Curl', 'difficulty' => 'Intermediate', 'description' => 'Keep palms neutral during curl.'],
                ['name' => 'Preacher Curl', 'difficulty' => 'Advanced', 'description' => 'Use a preacher bench for isolation.'],
            ],
            'triceps' => [
                ['name' => 'Tricep Dip', 'difficulty' => 'Beginner', 'description' => 'Lower body using a bench or dip bars.'],
                ['name' => 'Skullcrusher', 'difficulty' => 'Intermediate', 'description' => 'Lower barbell behind your head.'],
                ['name' => 'Overhead Tricep Extension', 'difficulty' => 'Advanced', 'description' => 'Use dumbbells or cable.'],
            ]
        ];

        return $data[strtolower($muscle)] ?? [];
    }
}
