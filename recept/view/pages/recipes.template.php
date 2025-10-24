<h1>Új recept felvétele</h1>

<form method="post">
    <p><input type="text" name="name" placeholder="Név" required></p>
    <p><input type="text" name="category" placeholder="Kategória" required></p>
    <p><input type="number" name="time" placeholder="Elkészítési idő (perc)" required></p>
    <p><input type="text" name="difficulty" placeholder="Nehézség (könnyű/közepes/nehéz)" required></p>
    <p><input type="number" name="portion" placeholder="Adag (1–20)" required></p>
    <p><button type="submit">Küldés</button></p>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "<h2>Beküldött adatok:</h2>";
    echo "<ul>";
    echo "<li><strong>Név:</strong> " . htmlspecialchars($_POST['name']) . "</li>";
    echo "<li><strong>Kategória:</strong> " . htmlspecialchars($_POST['category']) . "</li>";
    echo "<li><strong>Idő:</strong> " . htmlspecialchars($_POST['time']) . " perc</li>";
    echo "<li><strong>Nehézség:</strong> " . htmlspecialchars($_POST['difficulty']) . "</li>";
    echo "<li><strong>Adag:</strong> " . htmlspecialchars($_POST['portion']) . "</li>";
    echo "</ul>";
}
?>
