<?php include "handy_methods.php"

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = test_input($_POST['username'] ?? '');
        $password = test_input($_POST['password'] ?? '');
        
        if ($username !== '' && $password !== '') {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO profiles (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            try {
                $stmt->execute([$username, $hashed_password]);
                echo "Registrering lyckades! Du kan nu logga in.";
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) { // Duplicate entry
                    echo "Användarnamnet är redan taget. Vänligen välj ett annat.";
                } else {
                    echo "Ett fel uppstod: " . $e->getMessage();
                }
            }
        } else {
            echo "Vänligen fyll i både användarnamn och lösenord.";
        }
    }