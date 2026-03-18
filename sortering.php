<?php

require 'handy_methods.php';

$query = "SELECT * FROM users";

if (isset($_GET['sort']) && $_GET['sort'] == 'salary') {
    $query .= " ORDER BY salary DESC";
}

$stmt = $pdo->query($query);
$profiles = $stmt->fetchAll();

foreach ($profiles as $p) {
    echo "<div>";
    echo "<h3>" . htmlspecialchars($p['username']) . "</h3>";
    echo "<p>Stad: " . htmlspecialchars($p['city']) . "</p>";


    if (isset($_SESSION['user_id'])) {
        echo "<p>Årslön: " . $p['salary'] . " kr</p>";
        echo "<p>E-post: " . $p['email'] . "</p>";
    } else {
        echo "<p><em>Logga in för att se lön och kontaktinfo.</em></p>";
    }
    echo "</div><hr>";
}
?>