<?php
$recipes = get_all_recipes();
$categories = array_unique(array_column($recipes, 'category'));
$hard_recipes = array_filter($recipes, fn($r) => $r['difficulty'] === 'nehéz');
?>

<h1 class="text-3xl font-bold mb-6">Receptgyűjtemény statisztika</h1>

<table class="table-auto border-collapse w-full text-left shadow-md">
    <thead>
    <tr class="bg-gray-100">
        <th class="border px-4 py-2">Mutató</th>
        <th class="border px-4 py-2">Érték</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="border px-4 py-2">Összes recept</td>
        <td class="border px-4 py-2"><?= count($recipes) ?></td>
    </tr>
    <tr>
        <td class="border px-4 py-2">Kategóriák száma</td>
        <td class="border px-4 py-2"><?= count($categories) ?></td>
    </tr>
    <tr>
        <td class="border px-4 py-2">Átlagos elkészítési idő</td>
        <td class="border px-4 py-2"><?= round(get_average_cooking_time()) ?> perc</td>
    </tr>
    <tr>
        <td class="border px-4 py-2">Legnehezebb receptek száma</td>
        <td class="border px-4 py-2"><?= count($hard_recipes) ?></td>
    </tr>
    </tbody>
</table>
