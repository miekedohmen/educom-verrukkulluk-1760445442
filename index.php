<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once("./lib/database.php");
require_once("./lib/products.php");
require_once("./lib/user.php");
require_once("./lib/kitchentype.php");
require_once("./lib/ingredients.php");
require_once("./lib/recipeinfo.php");
require_once("./lib/recipe.php");

// /// INIT
$db = new database();
$recipeData = new recipe ($db->getConnection());


/// VERWERK 
$recipes = $recipeData->selectRecipe ();

/// RETURN
echo "<pre>";
var_dump($recipes);
