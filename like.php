<?php

require 'handy_methods.php';

if (!isset($_SESSION['user_id']) || !isset($_POST['profile_id'])) {
    die("Åtkomst nekad");
}

$user_id = $_SESSION['user_id'];
$profile_id = $_POST['profile_id'];
$action = $_POST['action'];

if ($action == 'like') {
    $sql = "INSERT IGNORE INTO profile_likes (user_id, profile_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $profile_id]);
} else {
    $sql = "DELETE FROM profile_likes WHERE user_id = ? AND profile_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $profile_id]);
}

$sqlCount = "UPDATE users SET likes = (SELECT COUNT(*) FROM profile_likes WHERE profile_id = ?) WHERE id = ?";
$pdo->prepare($sqlCount)->execute([$profile_id, $profile_id]);

$stmt = $pdo->prepare("SELECT likes FROM users WHERE id = ?");
$stmt->execute([$profile_id]);
echo $stmt->fetchColumn();
?>