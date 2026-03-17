<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Användarnamn">
    <input type="password" name="password" placeholder="Lösenord">
    <input type="submit" value="Logga in">
</form>

<?php include "model_login.php"?>

<!-- ToDo: visa up login/registereringsinformation -->