<?php
$sql = "SELECT * FROM profiles";

$result = $conn->query($sql);

$row = $result ->fetch();

print_r($row);

print($row['username']);
// ToDo: Kör SQL kod på databasen