<?php

class WorkoutModel {

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getWorkoutPlan($user_id, $day_of_week) {
        $query = "
            SELECT
                e.name AS exercise_name,
                e.id AS exercise_id,
                e.muscle_group
            FROM
                musclemap_user_workout_plans wp
            JOIN
                musclemap_user_exercises wpe ON wp.id = wpe.plan_id
            JOIN
                musclemap_exercises e ON wpe.exercise_id = e.id
            WHERE
                wp.user_id = $1
                AND wp.name = $2";
        $params = array($user_id, $day_of_week);

        $result = pg_query_params($this->db, $query, $params);

        $workout_data = [];
        while ($row = pg_fetch_assoc($result)) {
            $workout_data[] = $row;
        }
        pg_free_result($result);
        return $workout_data;
    }

    public function getExercises($user_id, $day_of_week) {
         $query = "
            SELECT
                e.name AS exercise_name,
                e.id AS exercise_id,
                e.muscle_group
            FROM
                musclemap_user_workout_plans wp
            JOIN
                musclemap_user_exercises wpe ON wp.id = wpe.plan_id
            JOIN
                musclemap_exercises e ON wpe.exercise_id = e.id
            WHERE
                wp.user_id = $1
                AND wp.name = $2";
        $params = array($user_id, $day_of_week);

        $result = pg_query_params($this->db, $query, $params);

        $exercises = [];
        while ($row = pg_fetch_assoc($result)) {
            $exercises[] = $row;
        }
        pg_free_result($result);
        return $exercises;
    }

    public function getAllExercises() {
        $query = "SELECT id, name, muscle_group FROM musclemap_exercises";
        $result = pg_query($this->db, $query);

        $exercises = [];
        while ($row = pg_fetch_assoc($result)) {
            $exercises[] = $row;
        }
        pg_free_result($result);
        return $exercises;
    }

        public function searchExercises($keyword) {
        $query = "
            SELECT id, name, muscle_group
            FROM musclemap_exercises
            WHERE name ILIKE $1 OR muscle_group ILIKE $1
        ";
        $params = array("%" . $keyword . "%");
        $result = pg_query_params($this->db, $query, $params);

        $exercises = [];
        while ($row = pg_fetch_assoc($result)) {
            $exercises[] = $row;
        }
        pg_free_result($result);
        return $exercises;
    }

    public function saveWorkoutProgress($user_id, $exercise_id, $weight, $reps) {
        $query = "
            INSERT INTO musclemap_user_exercises (plan_id, exercise_id, sets, reps, weight)
            VALUES (
                (SELECT id FROM musclemap_user_workout_plans WHERE user_id = $1 LIMIT 1),
                $2,
                1,  -- Placeholder for sets
                $3,
                $4
            )
        ";
        $params = array($user_id, $exercise_id, $reps, $weight);
        $result = pg_query_params($this->db, $query, $params);

        if ($result) {
            pg_free_result($result);
            return "Workout data saved!";
        } else {
            $error = "Error saving workout data: " . pg_last_error($this->db);
            return $error;
        }
    }

    public function getPlanId($user_id, $day_of_week) {
        $query = "SELECT id FROM musclemap_user_workout_plans WHERE user_id = $1 AND name = $2";
        $params = array($user_id, $day_of_week);
        $result = pg_query_params($this->db, $query, $params);

        if ($row = pg_fetch_assoc($result)) {
            pg_free_result($result);
            return $row['id'];
        } else {
            pg_free_result($result);
            return null; // Plan doesn't exist
        }
    }

     public function createWorkoutPlan($user_id, $day_of_week) {
            $query = "INSERT INTO musclemap_user_workout_plans (user_id, name) VALUES ($1, $2) RETURNING id";
            $params = array($user_id, $day_of_week);
            $result = pg_query_params($this->db, $query, $params);

            if ($result) {
                $row = pg_fetch_row($result);
                $plan_id = $row[0];
                pg_free_result($result);
                return $plan_id;
            } else {
                // Log or handle the error as needed
                error_log("Error creating workout plan: " . pg_last_error($this->db));
                return null;
            }
        }

     public function addExerciseToPlan($plan_id, $exercise_id) {
        $query = "INSERT INTO musclemap_user_exercises (plan_id, exercise_id) VALUES ($1, $2)";
        $params = array($plan_id, $exercise_id);
        $result = pg_query_params($this->db, $query, $params);

        if ($result) {
            pg_free_result($result);
            return true;
        } else {
            error_log("Error adding exercise to plan: " . pg_last_error($this->db));
            return false;
        }
    }

    public function removeExerciseFromPlan($plan_id, $exercise_id) {
        $query = "DELETE FROM musclemap_user_exercises WHERE plan_id = $1 AND exercise_id = $2";
        $params = array($plan_id, $exercise_id);
        $result = pg_query_params($this->db, $query, $params);

        if ($result) {
            pg_free_result($result);
            return true;
        } else {
            error_log("Error removing exercise from plan: " . pg_last_error($this->db));
            return false;
        }
    }
}
?>
