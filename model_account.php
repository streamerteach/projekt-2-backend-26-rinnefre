<?php

if (!isset($_SESSION['username'])) {
    $row = false;
} else {
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM profiles WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}


// print_r($row);
