<?php
require_once('db_credentials.php');

header('Content-Type: application/json');

$searchTerm = $_GET['term'] ?? '';

if (empty($searchTerm)) {
    echo json_encode([]); // Return empty array if no search term
    exit;
}

$query = "SELECT id, name, muscle_group FROM musclemap_exercises WHERE name ILIKE $1 OR muscle_group ILIKE $1";
$params = ["%" . $searchTerm . "%"];

$result = pg_query_params($db, $query, $params);

$exercises = [];
while ($row = pg_fetch_assoc($result)) {
    $exercises[] = $row;
}

pg_free_result($result);

echo json_encode($exercises);
?>
