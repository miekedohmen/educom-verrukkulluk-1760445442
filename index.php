<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

require_once("./lib/database.php");
require_once("./lib/products.php");
require_once("./lib/user.php");
require_once("./lib/kitch")

// /// INIT
$db = new database();
$prod = new product(connection: $db->getConnection());
$user = new USER($db->getConnection());

/// VERWERK 
$data = $prod->selecteerProducts(products_id: 4);
$userData= $user->selecteerUser(3);

/// RETURN
echo '<pre>';
print_r($data);
echo '</pre>';