<<?php
$all = get_all_recipes();

$difficulty = $_GET['difficulty'] ?? '';
$category = $_GET['category'] ?? '';

$recipes = $all;

if ($difficulty) {
    $recipes = filter_recipes_by_difficulty($difficulty);
}
if ($category) {
    $recipes = array_filter($recipes, fn($r) => $r['category'] === $category);
}

$categories = array_unique(array_column($all, 'category'));
?>




<h1 class="text-2xl font-bold mb-4 text-indigo-700">Receptek</h1>
<form method="get" class="flex flex-wrap gap-2 mb-6">
    <input type="hidden" name="page" value="recipes">

    <select name="category" class="border rounded p-2">
        <option value="">Kategória</option>
        <?php foreach ($categories as $c): ?>
            <option value="<?= htmlspecialchars($c) ?>" <?= $c === $category ? 'selected' : '' ?>>
                <?= ucfirst($c) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <select name="difficulty" class="border rounded p-2">
        <option value="">Nehézség</option>
        <option value="könnyű" <?= $difficulty === 'könnyű' ? 'selected' : '' ?>>Könnyű</option>
        <option value="közepes" <?= $difficulty === 'közepes' ? 'selected' : '' ?>>Közepes</option>
        <option value="nehéz" <?= $difficulty === 'nehéz' ? 'selected' : '' ?>>Nehéz</option>
    </select>
    <button class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">Szűrés</button>
</form>




<?php if (empty($recipes)): ?>
    <p class="text-gray-600">Nincs találat.</p>
<?php else: ?>



    <table class="w-full border border-gray-300 bg-white shadow-sm">
        <thead class="bg-gray-100">
        <tr>
            <th class="border px-4 py-2 text-left">Név</th>
            <th class="border px-4 py-2 text-left">Kategória</th>
            <th class="border px-4 py-2 text-left">Idő (perc)</th>
            <th class="border px-4 py-2 text-left">Nehézség</th>
            <th class="border px-4 py-2 text-left">Adag</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recipes as $r): ?>
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2"><?= htmlspecialchars($r['name']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($r['category']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($r['time']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($r['difficulty']) ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($r['portion']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
