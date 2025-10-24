<?php
require_once 'app/data.php';
require_once 'app/functions.php';
require_once 'app/view_functions.php';
$page = $_GET['page'] ?? 'home';

include 'view/partials/header.template.php';

switch ($page) {

    case 'recipes':
        $filter_difficulty = $_GET['difficulty'] ?? null;
        $filter_category = $_GET['category'] ?? null;
        $recipes = get_all_recipes();
        $page_title = "Receptek listája";
        if ($filter_difficulty) {
            $recipes = filter_recipes_by_difficulty($filter_difficulty);
            $page_title .= " – " . ucfirst($filter_difficulty);
        }
        if ($filter_category) {
            $recipes = filter_recipes_by_category($filter_category);
            $page_title .= " – " . ucfirst($filter_category);
        }
        include 'view/pages/recipes.template.php';
        break;

    case 'submit':
        $submitted = false;
        $result = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $submitted = true;
            $result = $_POST;
        }
        include 'view/pages/submit.template.php';
        break;

    case 'home':
    default:
        include 'view/pages/home.template.php';
        break;
}

include 'view/partials/footer.template.php';
