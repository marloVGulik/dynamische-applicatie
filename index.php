<?php
require("./Data/HTML/headerP1.html");
echo "<title>HOME</title>";
require("./Data/HTML/headerP2.html");

require("./Data/database.php");
$statement = $conn->prepare('SELECT `name`, `avatar`, `color`, `health`, `attack`, `defense` FROM characters ORDER BY `name`');
$statement->execute();
$result = $statement->fetchAll();
$statement = $conn->prepare('SELECT COUNT(*) FROM characters');
$statement->execute();
$count = $statement->fetchAll();
?>

<div class="container siz-9">
    <h1>All <?= $count[0][0] ?> characters</h1>
</div>
<div class="container siz-9">
    <?php 
        
        foreach ($result as $character) {
            echo '<a href="character.php/?name=' . urlencode($character['name']) . '"><div class="container siz-6" style="border-color: ' . $character['color'] . '">';
            echo '<h2>' . $character['name'] . '</h2>';
            echo '<img src="/dynamische-applicatie/Data/Game/Avatars/' . $character['avatar'] . '" class="profilepicture" alt="' . $character['avatar'] . '">';
            echo '<ul class="profilestats">';
            echo '<li class="profilestat">Health: ' . $character['health'] . '</li>';
            echo '<li class="profilestat">Attack: ' . $character['attack'] . '</li>';
            echo '<li class="profilestat">Defense: ' . $character['defense'] . '</li>';
            echo '</ul>';
            echo '</div></a>';
        }
    ?>
</div>

<?php 
require("./Data/HTML/footer.html");
?>