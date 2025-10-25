<h1>Új recept felvétele</h1>
<form method="post">
    <p><input type="text" name="name" placeholder="Név"></p>
    <p><input type="text" name="category" placeholder="Kategória"></p>
    <p><input type="number" name="time" placeholder="Elkészítési idő (perc)"></p>
    <p><input type="text" name="difficulty" placeholder="Nehézség"></p>
    <p><input type="number" name="portion" placeholder="Adag"></p>
    <p><button type="submit">Küldés</button></p>
</form>




<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>Beküldött adatok:</h2>";
    echo "<ul>";
    echo "<li>Név: " . htmlspecialchars($_POST['name']) . "</li>";
    echo "<li>Kategória: " . htmlspecialchars($_POST['category']) . "</li>";
    echo "<li>Elkészítési idő: " . htmlspecialchars($_POST['time']) . " perc</li>";
    echo "<li>Nehézség: " . htmlspecialchars($_POST['difficulty']) . "</li>";
    echo "<li>Adag: " . htmlspecialchars($_POST['portion']) . "</li>";
    echo "</ul>";
}
?>
