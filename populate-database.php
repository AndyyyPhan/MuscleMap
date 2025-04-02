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
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_user_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_exercise_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_workout_plan_seq;");
// pg_query($db, "DROP SEQUENCE IF EXISTS musclemap_user_exercise_seq;");

// // Create sequences
// pg_query($db, "CREATE SEQUENCE musclemap_user_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_exercise_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_workout_plan_seq;");
// pg_query($db, "CREATE SEQUENCE musclemap_user_exercise_seq;");

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

echo "Done!";