<?php
require("./Data/HTML/headerP1.html");
echo "<title>HOME</title>";
require("./Data/HTML/headerP2.html");
?>

<div class="container siz-9">
    <h1>Alle karakters</h1>
</div>
<div class="container siz-9">
    <?php 
        $user = "character-bot";
        $pass = "YSd8F1fYQtZ7DJz1";
        $conn = new PDO('mysql:host=localhost;dbname=characters', $user, $pass);
        $statement = $conn->prepare('SELECT `name`, `avatar`, `color`, `health`, `attack`, `defense` FROM characters ORDER BY `name`');
        $statement->execute();
        $result = $statement->fetchAll();
        // print_r($result);
        
        foreach ($result as $character) {
            echo '<a href="character.php/?name=' . urlencode($character['name']) . '"><div class="container siz-5" style="border-color: ' . $character['color'] . '">';
            echo '<h2>' . $character['name'] . '</h2>';
            echo '<img src="/dynamische-applicatie/Data/Game/Avatars/' . $character['avatar'] . '" class="profilepicture">';
            echo '<ul class="profilestats">';
            echo '<li class="profilestat">' . $character['health'] . '</li>';
            echo '<li class="profilestat">' . $character['attack'] . '</li>';
            echo '<li class="profilestat">' . $character['defense'] . '</li>';
            echo '</ul>';
            echo '</div></a>';
            // print_r($character['name']);
        }
    ?>
</div>

<?php 
require("./Data/HTML/footer.html");
?>