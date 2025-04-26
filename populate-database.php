<?php
// Connection info
$host = "localhost";
$port = "5432";
$database = "tmq6ed";
$user = "tmq6ed";
$password = "Te4guKTfhOcj"; 

$db = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

// if ($db) {
//     echo "Connected to database<br>\n";
// } else {
//     die("Failed to connect to database");
// }

// // Drop tables and sequences if they exist
// pg_query($db, "DROP TABLE IF EXISTS musclemap_user_exercises;");
// pg_query($db, "DROP TABLE IF EXISTS musclemap_user_workout_plans;");
// pg_query($db, "DROP TABLE IF EXISTS musclemap_exercises;");
// pg_query($db, "DROP TABLE IF EXISTS musclemap_users;");
// pg_query($db, "DROP TABLE IF EXISTS musclemap_workout_progress;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_user_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_exercise_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_workout_plan_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_user_exercise_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_workout_progress_seq;");

// // Create sequences
// pg_query($db, "CREATE SEQUENCE musclemap_user_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_exercise_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_workout_plan_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_user_exercise_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_workout_progress_seq;");

// // Create tables
// pg_query($db, "CREATE TABLE musclemap_users (
//     id INT PRIMARY KEY DEFAULT nextval('musclemap_user_seq'),
//     username TEXT UNIQUE NOT NULL,
//     email TEXT UNIQUE NOT NULL,
//     password TEXT NOT NULL
// );");

// pg_query($db, "CREATE TABLE musclemap_exercises (
//     id INT PRIMARY KEY DEFAULT nextval('musclemap_exercise_seq'),
//     name TEXT NOT NULL,
//     description TEXT,
//     difficulty TEXT CHECK (difficulty IN ('Beginner', 'Intermediate', 'Advanced')),
//     muscle_group TEXT NOT NULL
// );");

// pg_query($db, "CREATE TABLE musclemap_user_workout_plans (
//     id INT PRIMARY KEY DEFAULT nextval('musclemap_workout_plan_seq'),
//     user_id INT REFERENCES musclemap_users(id),
//     name TEXT NOT NULL,
//     created_at TIMESTAMP DEFAULT NOW()
// );");

// pg_query($db, "CREATE TABLE musclemap_user_exercises (
//     id INT PRIMARY KEY DEFAULT nextval('musclemap_user_exercise_seq'),
//     plan_id INT REFERENCES musclemap_user_workout_plans(id),
//     exercise_id INT REFERENCES musclemap_exercises(id),
//     sets INT,
//     reps INT,
//     weight INT,
//     completed BOOLEAN DEFAULT FALSE
// );");

// Seed a few exercises (example)
// pg_query($db, "INSERT INTO musclemap_exercises (name, description, difficulty, muscle_group) VALUES
//     ('Bicep Curl', 'Classic dumbbell curl targeting the biceps', 'Beginner', 'Biceps'),
//     ('Tricep Dip', 'Bodyweight exercise targeting triceps', 'Intermediate', 'Triceps'),
//     ('Squat', 'Compound lower body exercise', 'Beginner', 'Quadriceps'),
//     ('Deadlift', 'Advanced posterior chain movement', 'Advanced', 'Back')
// ;");
// pg_query($db, "INSERT INTO musclemap_exercises (name, description, difficulty, muscle_group) VALUES
//     ('Bench Press', 'Classic chest-building barbell exercise', 'Intermediate', 'Chest'),
//     ('Pull-Up', 'Bodyweight back and biceps exercise', 'Advanced', 'Back'),
//     ('Calf Raise', 'Simple exercise targeting calf muscles', 'Beginner', 'Calves'),
//     ('Lunges', 'Lower body movement targeting quads, glutes, and hamstrings', 'Beginner', 'Quadriceps'),
//     ('Romanian Deadlift', 'Hamstring-focused hinge exercise', 'Intermediate', 'Hamstrings'),
//     ('Leg Curl', 'Machine exercise isolating the hamstrings', 'Beginner', 'Hamstrings'),
//     ('Chest Fly', 'Isolation exercise for chest muscles using dumbbells or cables', 'Intermediate', 'Chest'),
//     ('Skullcrusher', 'Lying tricep extension exercise with a barbell or dumbbells', 'Intermediate', 'Triceps'),
//     ('Overhead Tricep Extension', 'Dumbbell or cable exercise focusing on long head of triceps', 'Beginner', 'Triceps'),
//     ('Tricep Pushdown', 'Cable machine exercise isolating the triceps', 'Beginner', 'Triceps'),
//     ('Close-Grip Bench Press', 'Compound pressing movement emphasizing triceps', 'Intermediate', 'Triceps'),
//     ('Diamond Push-Up', 'Bodyweight push-up variation targeting triceps', 'Intermediate', 'Triceps')
// ;");

// pg_query($db, "CREATE TABLE musclemap_workout_progress (
//     id INT PRIMARY KEY DEFAULT nextval('musclemap_workout_progress_seq'),
//     user_id INT REFERENCES musclemap_users(id),
//     exercise_id INT REFERENCES musclemap_exercises(id),
//     day_of_week VARCHAR(5),
//     weight INT,
//     reps INT,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );");

echo "Done!";