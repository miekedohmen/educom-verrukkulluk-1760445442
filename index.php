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
$prod = new products(connection: $db->getConnection());
$user = new USER($db->getConnection());
$kitchentype = new kitchentype($db->getConnection());
$ingredients = new ingredients(connection : $db->getConnection());
$recipeinfo = new recipeinfo(connection: $db->getConnection());
$recipeData = new recipe ($db->getConnection());

/// VERWERK 
$data = $prod->selecteerProducts(products_id: 4);
$userData= $user->selecteerUser(3);
$kitchentypeData = $kitchentype->selecteerKitchentype(3);
$ingredientsData= $ingredients->selecteerIngredients(3);
$productsData = $prod->selecteerProducts(3);
$recipeinfoData = $recipeinfo->selecteerRecipeinfo(9,'B');
$nonihelpt = $recipeinfo->deleteFavorites(9, 3);
$waarderingData = $recipeData->selecteerWaardering(9,3);
$stappenData = $recipeData->selecteerStappen(9,3);
$opmerkingenData = $recipeData->selecteerOpmerkingen(9,3);


/// RETURN
echo '<pre>productData:<br>';
print_r($productsData);
echo "<br><br>user:<br>";
print_r($userData);
echo "<br><br>kitchentypeData:<br>";
print_r($kitchentypeData);
echo "<br><br>ingredientData:<br>";
print_r($ingredientsData);
echo "<br><br>recipeinfoData:<br>";
print_r($recipeinfoData);
echo "<br><br>recipeData";
print_r($recipeData);
echo "<br><br>waarderingData:<br>";
print_r($waarderingData);
echo "<br><br>stappenData:<br>";
print_r($stappenData);
echo "<br><br>opmerkingenData<br>";
print_r($opmerkingenData);

