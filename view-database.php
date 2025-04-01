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

$result = pg_query($db, "SELECT * FROM musclemap_users;");
$rows = pg_fetch_all($result);

echo "<pre>";
print_r($rows);
echo "</pre>";
?>