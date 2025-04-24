<?php
$host = "localhost";
$port = "5432";
$database = "tmq6ed";
$user = "tmq6ed";
$password = "Te4guKTfhOcj"; 

$db = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

if ($db) {
    echo "Connected to database<br>\n";
} else {
    die("Failed to connect to database");
}

// $result = pg_query($db, "
//     SELECT tablename 
//     FROM pg_catalog.pg_tables 
//     WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema';
// ");

$result = pg_query($db, "SELECT DISTINCT muscle_group FROM musclemap_exercises;");

$rows = pg_fetch_all($result);

// $query = "UPDATE musclemap_exercises SET muscle_group = 'Quads' WHERE muscle_group = 'Quadriceps'";
// $result = pg_query($db, $query);

// if ($result) {
//     echo "Muscle group updated from 'Quadriceps' to 'quads'.";
// } else {
//     echo "Error: " . pg_last_error($db);
// }

echo "<pre>";
print_r($rows);
echo "</pre>";
?>