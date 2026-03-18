<?php include "handy_methods.php" ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Min dejt site</title>
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js" defer></script>
</head>

<body>

    <div id="container">
        <?php include "header.php" ?>
        <section>

            <article>
                <h2>Välkommen till Min dejt site!</h2>
                <?php include "./view_profiles.php" ?>



                <?php 
                echo "<div class='profile-card'>";
                echo "<h3>" . htmlspecialchars($p['username']) . "</h3>";
                echo "<p>Gilla-markeringar: <span id='like-count-{$p['id']}'>{$p['likes']}</span></p>";

                if (isset($_SESSION['user_id'])) {
                    echo "<button onclick='handleLike({$p['id']}, \"like\")'>👍 Gilla</button>";
                        echo "<button onclick='handleLike({$p['id']}, \"dislike\")'>👎 Ta bort gilla</button>";
                    }
                    echo "</div>";
                ?>
            </article>

        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by Fredde<sup>&#169;</sup>
        </footer>

    </div>

    <script>
    function handleLike(profileId, action) {
    const formData = new FormData();
    formData.append('profile_id', profileId);
    formData.append('action', action);

    fetch('like.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(newCount => {
        // Uppdatera siffran på skärmen direkt utan reload!
        document.getElementById('like-count-' + profileId).innerText = newCount;
    })
    .catch(error => console.error('Error:', error));
}
</script>
</body>

</html>