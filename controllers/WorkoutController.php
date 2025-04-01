<?php

require_once(__DIR__ . '/../models/WorkoutModel.php');


class WorkoutController {

    private $input;
    private $db;
    private $user_id;
    private $workoutModel;

    public function __construct($input, $db) { // Added $db parameter
        $this->input = $input;
        $this->user_id = $_SESSION["user_id"] ?? null;  // Get user ID from session
        $this->db = $db; // Use the injected database connection
        $this->workoutModel = new WorkoutModel($this->db);
    }

    public function run() {
        if (!$this->user_id) {
            header("Location: index.php?command=login");
            exit();
        }

        $command = $this->input["command"] ?? "showWorkoutPlan";

        switch ($command) {
            case "saveWorkoutProgress":
                $this->saveWorkoutProgress();
                break;
            case "showWorkoutProgress":
                $this->showWorkoutProgress();
                break;
            case "editWorkoutPlan":
                $this->editWorkoutPlan();
                break;
            case "updateWorkoutPlan":
                $this->updateWorkoutPlan();
                break;
            case "showWorkoutPlan":
            default:
                $this->showWorkoutPlan();
                break;
        }
    }

    public function showWorkoutPlan() {
        $day_of_week = $this->input["daySelect"] ?? 'M'; // Default to Monday
        $workout_data = $this->workoutModel->getWorkoutPlan($this->user_id, $day_of_week);
        include(__DIR__ . "/../views/workout-plan.php");// Include the view
    }

    public function showWorkoutProgress() {
        $day_of_week = $this->input["daySelect"] ?? 'M'; // Default to Monday
        $exercises = $this->workoutModel->getExercises($this->user_id, $day_of_week);
        include(__DIR__ . "/../views/workout-progress.php"); // Include the view
    }

    public function saveWorkoutProgress() {
        $day_of_week = $this->input["daySelect"] ?? 'M'; // Default to Monday

        // Validate Required Parameters exist
        $exercise_id = $this->input["exercise_id"] ?? null;
        $weight = $this->input["weight"] ?? null;
        $reps = $this->input["reps"] ?? null;

        if (empty($exercise_id) || empty($weight) || empty($reps)) {
            $error = "Missing Workout Information. Please complete the form!";
            $exercises = $this->workoutModel->getExercises($this->user_id, $day_of_week);
            include(__DIR__ . "/../views/workout-progress.php");
            return;
        }

        //Validate input (example)
        if (!is_numeric($weight) || !is_numeric($reps)) {
            $error = "Weight and reps must be numbers.";
            $exercises = $this->workoutModel->getExercises($this->user_id, $day_of_week);
            include(__DIR__ . "/../views/workout-progress.php");
            return;
        }

        $result = $this->workoutModel->saveWorkoutProgress($this->user_id, $exercise_id, $weight, $reps);

        if (strpos($result, 'Error') === 0) {
            $error = $result;
            $exercises = $this->workoutModel->getExercises($this->user_id, $day_of_week);
        }
        else {
            $success = $result; // Assign success message
        }

        $this->showWorkoutProgress(); // Display updated workout progress
    }

    public function editWorkoutPlan() {
        $day_of_week = $this->input["daySelect"] ?? 'M';

        // Get the Plan ID
        $plan_id = $this->workoutModel->getPlanId($this->user_id, $day_of_week);

        // If the plan doesn't exist create one!
        if (!$plan_id) {
            $plan_id = $this->workoutModel->createWorkoutPlan($this->user_id, $day_of_week);
        }

        // Get the Workout Table Data
        $workout_data = $this->workoutModel->getWorkoutPlan($this->user_id, $day_of_week);
        // Get ALL of the exercise to pull from for the form
        $all_exercises = $this->workoutModel->getAllExercises();

        include(__DIR__ . "/../views/edit-workout-plan.php");
    }

    public function updateWorkoutPlan() {
        $day_of_week = $this->input["daySelect"] ?? 'M'; // Default to Monday

        // Get the Plan ID
        $plan_id = $this->workoutModel->getPlanId($this->user_id, $day_of_week);

        // If the plan doesn't exist create one!
        if (!$plan_id) {
            $plan_id = $this->workoutModel->createWorkoutPlan($this->user_id, $day_of_week);
        }

        // Add any new exercises:
        $add_exercises = $this->input["add_exercises"] ?? []; // Get exercises to add from the multi select

        foreach ($add_exercises as $exercise_id) {
            $this->workoutModel->addExerciseToPlan($plan_id, $exercise_id);
        }

        // Delete any removed exercises:
        $remove_exercises = $this->input["remove_exercises"] ?? []; // Get exercises to remove from the from

        foreach ($remove_exercises as $exercise_id) {
            $this->workoutModel->removeExerciseFromPlan($plan_id, $exercise_id);
        }

        $this->showWorkoutPlan();
    }
}