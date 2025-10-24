<?php

$recipes = [
    [
        'id' => 1,
        'name' => 'Gulyásleves',
        'category' => 'leves',
        'time' => 90,
        'difficulty' => 'közepes',
        'portion' => 4
    ],
    [
        'id' => 2,
        'name' => 'Tiramisu',
        'category' => 'desszert',
        'time' => 30,
        'difficulty' => 'könnyű',
        'portion' => 6
    ],
    [
        'id' => 3,
        'name' => 'Rántott hús',
        'category' => 'főétel',
        'time' => 45,
        'difficulty' => 'közepes',
        'portion' => 4
    ]
];
$json_file = __DIR__ . '/recipes.json';

if (!file_exists($json_file)) {
    file_put_contents($json_file, json_encode($recipes, JSON_PRETTY_PRINT));
}
;
