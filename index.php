<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once("./lib/database.php");
require_once("./lib/products.php");
require_once("./lib/user.php");
require_once("./lib/kitchentype.php");
require_once("./lib/ingredients.php");

// /// INIT
$db = new database();
$prod = new product(connection: $db->getConnection());
$user = new USER($db->getConnection());
$kitchentype = new kitchentype($db->getConnection());
$ingredients = new ingredients(connection : $db->getConnection());

/// VERWERK 
$data = $prod->selecteerProducts(products_id: 4);
$userData= $user->selecteerUser(3);
$kitchentypeData = $kitchentype->selecteerKitchentype(3);
$ingredientsData= $ingredients->selecteerIngredients(3);
$recipeinfoData= $recipeinfo->selecteerRecipeinfo(2);

/// RETURN
echo '<pre>';
print_r($recipeinfoData);
echo '</pre>';