<?php

header('Content-Type: application/json');

$conn = new mysqli('localhost', 'root', '', 'jobs');

$result = $conn->query("SELECT title FROM jobs WHERE title LIKE '%" . $_GET['name'] . "%'")->fetch_all();

echo json_encode($result);

$conn->close();
?>