<?php
function get_all_recipes(): array
{
    $json_file = __DIR__ . '/../data/recipes.json';

    $json_content = file_get_contents($json_file);
    $recipes = json_decode($json_content, true);

    if ($recipes === null) {
        return [];
    }
    return $recipes;
}
function filter_recipes_by_difficulty(string $difficulty): array{
    $all = get_all_recipes();
    return array_filter($all, fn($r) => $r['difficulty'] === $difficulty);
}
function filter_recipes_by_category(string $category): array{
    $all = get_all_recipes();
    return array_filter($all, fn($r) => $r['category'] === $category);
}
function get_average_cooking_time(): float{
    $recipes = get_all_recipes();
    $total = array_sum(array_column($recipes, 'time'));
    return count($recipes) > 0 ? $total / count($recipes) : 0;
}
function validate_recipe(array $data): array{
    $errors = [];
    if (strlen(trim($data['name'] ?? '')) < 3) {
        $errors['name'] = 'A név legalább 3 karakter legyen.';
    }
    $valid_categories = ['előétel', 'leves', 'főétel', 'köret', 'saláta', 'desszert', 'sütemény', 'ital'];
    if (!in_array($data['category'] ?? '', $valid_categories)) {
        $errors['category'] = 'Érvénytelen kategória.';
    }
    $time = (int)($data['time'] ?? 0);
    if ($time <= 0 || $time > 500) {
        $errors['time'] = 'Az idő 1 és 500 perc között legyen.';
    }
    $valid_difficulties = ['könnyű', 'közepes', 'nehéz'];
    if (!in_array($data['difficulty'] ?? '', $valid_difficulties)) {
        $errors['difficulty'] = 'Érvénytelen nehézségi szint.';
    }
    $portion = (int)($data['portion'] ?? 0);
    if ($portion < 1 || $portion > 20) {
        $errors['portion'] = 'Az adag 1 és 20 között legyen.';
    }
    return $errors;
}
