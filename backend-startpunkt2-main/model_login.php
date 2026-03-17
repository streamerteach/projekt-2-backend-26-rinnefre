<?php 

// login handling with diagnostics
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    
    $username = test_input($_POST['username'] ?? '');
    $password = test_input($_POST['password'] ?? '');
    
    if ($username !== '' && $password !== '') {
        $sql = "SELECT * FROM profiles WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && isset($user['password']) && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            exit();
        } else {
            echo "Felaktig användarnamn eller lösenord";
        }
    }
}
