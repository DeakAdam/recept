<?php
$recipes = get_all_recipes();
$categories = array_unique(array_column($recipes, 'category'));
$hard_recipes = array_filter($recipes, fn($r) => $r['difficulty'] === 'nehéz');
?>
<h1 class="text-2xl font-bold mb-6 text-indigo-700">Receptgyűjtemény statisztika</h1>

<table class="w-full border border-gray-300 bg-white shadow-sm">
    <thead class="bg-gray-100">
    <tr>
        <th class="border px-4 py-2 text-left">Mutató</th>
        <th class="border px-4 py-2 text-left">Érték</th>
    </tr>
    </thead>
    <tbody>
    <tr class="hover:bg-gray-50">
        <td class="border px-4 py-2">Összes recept</td>
        <td class="border px-4 py-2"><?= count($recipes) ?></td>
    </tr>
    <tr class="hover:bg-gray-50">
        <td class="border px-4 py-2">Kategóriák száma</td>
        <td class="border px-4 py-2"><?= count($categories) ?></td>
    </tr>
    <tr class="hover:bg-gray-50">
        <td class="border px-4 py-2">Átlagos elkészítési idő</td>
        <td class="border px-4 py-2"><?= round(get_average_cooking_time()) ?> perc</td>
    </tr>
    <tr class="hover:bg-gray-50">
        <td class="border px-4 py-2">Legnehezebb receptek száma</td>
        <td class="border px-4 py-2"><?= count($hard_recipes) ?></td>
    </tr>
    </tbody>
</table>
