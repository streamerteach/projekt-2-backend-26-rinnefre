<?php
include "model_account.php";

// debug variable if needed
// $strunt_variable = "hej på er";
// print($strunt_variable);

// make sure we actually fetched something
if (!$row) {
    echo "<p>Inga uppgifter hittades för användaren.</p>";
} else {
?>

<h3>Här är ditt konto:</h3>
<form action="profile.php" method="GET">
    Namn: <input type="text" name="realname" value="<?=htmlspecialchars($row['realname'])?>"><br>
    Bio: <input type="text" name="bio" value="<?=htmlspecialchars($row['bio'])?>"><br>
    Lösenord: <input type="password" name="password" value=""><br>
    <input type="submit" value="Uppdatera konto">
</form>

<?php
}
