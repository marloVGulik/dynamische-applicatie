<?php
require("./Data/HTML/headerP1.html");


$user = "character-bot";
$pass = "YSd8F1fYQtZ7DJz1";
$conn = new PDO('mysql:host=localhost;dbname=characters', $user, $pass);
$statement = $conn->prepare('SELECT * FROM characters WHERE `name` = :inputName');
$statement->execute([":inputName" => urldecode($_GET['name'])]);
$result = $statement->fetchAll();

if(count($result) != 1) {
    echo "<h1>ERROR!</h1>";
}


echo "<title>" . $result[0]['name'] . "</title>";
require("./Data/HTML/headerP2.html");

?>

<a class="container siz-9" href="/dynamische-applicatie/">
    <h1>BACK TO HUB</h1>
</a>
<div class="container siz-9">
    <img src="/dynamische-applicatie/Data/Game/Avatars/<?= $result[0]['avatar'] ?>" class="profilePicLarge" style="border-color: <?= $result[0]['color'] ?>" alt="<?= $result[0]['avatar'] ?>">
    <h1><?= $result[0]['name']; ?></h1>
    <p><?= $result[0]['bio']; ?></p>
    <ul class="container siz-12" style="border-color: <?= $result[0]['color'] ?>">
        <li>Health: <?= $result[0]['health'] ?></li>
        <li>Attack: <?= $result[0]['attack'] ?></li>
        <li>Defense: <?= $result[0]['defense'] ?></li>
        <li>Weapon: <?= $result[0]['weapon'] ?></li>
        <li>Armor: <?= $result[0]['armor'] ?></li>
    </ul>
</div>


<?php 
require("./Data/HTML/footer.html");
?>