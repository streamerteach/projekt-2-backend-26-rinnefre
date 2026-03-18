<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Allt möjligt viktigt som vi använder ofta, sessionshantering, form validation etc.

// En funktion som tar bort whitespace, backslashes (escape char) och gör om < till html safe motsvarigheter
if (!function_exists('test_input')) {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

// Databaskonfiguration
$servername = "localhost";
$dbname = "rinnefre";
$db_username = "rinnefre";
include "hemlis.php";


//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$db_username,$db_password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>