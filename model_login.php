<?php require_once "handy_methods.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Grab and sanitize input
$username = isset($_POST['username']) ? test_input($_POST['username']) : '';
$passhash = isset($_POST['passhash']) ? test_input($_POST['passhash']) : '';

if ($username !== '' && $passhash !== '') {
    try {
        $sql = "SELECT * FROM profiles WHERE username = :username LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC); // ✅ PDO fetch

        if ($user && password_verify($passhash, $user['passhash'])) {
         $_SESSION['username'] = $username;
         var_dump($_SESSION);
    header("Location: profile.php");
    exit();
} else {
    echo "Felaktig användarnamn eller lösenord";
}

    } catch (PDOException $e) {
        echo "Database error: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "Vänligen fyll i både användarnamn och lösenord.";
}