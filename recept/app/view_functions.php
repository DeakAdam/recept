<?php
function render_recipe_card(array $recipe): string {
    return "
    <div>
        <h3>" . htmlspecialchars($recipe['name']) . "</h3>
        <p>Kategória: " . htmlspecialchars($recipe['category']) . "</p>
        <p>Elkészítési idő: " . format_cooking_time($recipe['time']) . "</p>
        <p>Nehézség: " . render_difficulty_badge($recipe['difficulty']) . "</p>
        <p>Adag: " . htmlspecialchars($recipe['portion']) . "</p>
        <hr>
    </div>
    ";
}




function render_difficulty_badge(string $difficulty): string {
    return ucfirst(htmlspecialchars($difficulty));
}
function format_cooking_time(int $minutes): string {
    $hours = intdiv($minutes, 60);
    $mins = $minutes % 60;

    if ($hours > 0 && $mins > 0) {
        return "$hours óra $mins perc";
    } elseif ($hours > 0) {
        return "$hours óra";
    } else {
        return "$mins perc";
    }
}
