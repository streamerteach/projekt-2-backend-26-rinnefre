<?php
// Start the session
session_start();
// Allt möjligt viktigt som vi använder ofta, sessionshantering, form validation etc.

// En funktion som tar bort whitespace, backslashes (escape char) och gör om < till html safe motsvarigheter
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Databaskonfiguration
$servername = "localhost";
$dbname = "rinnefre";
$username = "rinnefre";
include "hemlis.php";


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<p>Connected successfully $servername</p>";

?>