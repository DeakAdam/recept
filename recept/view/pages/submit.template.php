<h1 class="text-2xl font-bold mb-4 text-indigo-700">Új recept felvétele</h1>
<form method="post" class="max-w-md">
    <p class="mb-2"><input class="w-full border rounded p-2" type="text" name="name" placeholder="Név"></p>
    <p class="mb-2"><input class="w-full border rounded p-2" type="text" name="category" placeholder="Kategória"></p>
    <p class="mb-2"><input class="w-full border rounded p-2" type="number" name="time" placeholder="Elkészítési idő (perc)"></p>
    <p class="mb-2"><input class="w-full border rounded p-2" type="text" name="difficulty" placeholder="Nehézség (könnyű/közepes/nehéz)"></p>
    <p class="mb-4"><input class="w-full border rounded p-2" type="number" name="portion" placeholder="Adag"></p>
    <p><button class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Küldés</button></p>
</form>



<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'app/functions.php';
    $data = $_POST;
    $errors = validate_recipe($data);
    if (!empty($errors)) {
        echo '<div class="mt-4 bg-red-50 border border-red-300 text-red-700 p-3 rounded">';
        echo '<h3 class="font-semibold mb-2">Hibák:</h3><ul class="list-disc pl-5">';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul></div>';
    } else {
        $file = __DIR__ . '/recipes.json';
        $recipes = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        $recipes[] = [
                'id' => count($recipes) + 1,
                'name' => $data['name'],
                'category' => $data['category'],
                'time' => (int)$data['time'],
                'difficulty' => $data['difficulty'],
                'portion' => (int)$data['portion']
        ];
        file_put_contents($file, json_encode($recipes, JSON_PRETTY_PRINT));

        echo '<div class="mt-4 bg-green-50 border border-green-300 text-green-700 p-3 rounded">';
        echo 'Recept sikeresen hozzáadva';
        echo '</div>';
    }
}
?>
