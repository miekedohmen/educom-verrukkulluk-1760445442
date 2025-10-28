<?php

class groceries {
    private $connection;
    
    public function __construct() {
        $this->connection = $connection;
    }

    private function addGroceries($recipe_id, $user_id) {
        $ingredient = new Ingredients($this->connection);
        $ingredients = $ingredient-> selecteerIngredients($recipe_id);
        foreach ($ingredients as $ingredient) {
            $product_id = $ingredients->$product_id;
            $existing_groceries = $this->productsGroceries($product_id, $user_id);
            if ($existing_groceries !== false) {
                $this->addProducts($existing_groceries);
            }
            else {
                $this->addProducts($product_id,$user_id, $ingredient);
            }
        }
    }

    private function addToList($product_id, $user_id) {
        $addtoList = new $addtoList($this->connection);
        $addtoList->insertProductsToList($product_id, $user_id);
        return $addtoList;
    }

    private function retrieveIngredients($recipe_id){
        $ingredients = $ingredient->selecteerIngredients($recipe_id);
        return $ingredients;
    }

    private function retrieveGroceries($user_id) {
        $retrieveList = new $retrieveList($this->connection);
        $retrieveList->retrieveGroceries($user_id, $recipe_id);
        return $retrieveList;
    }

    private function addProducts ($product_id, $user_id, $amount) {
        $sql = "insert into boodschappenlijst (user_id, product_id, amount) values ($user_id, $product_id, $amount)";
        mysqli_query($this->connection);        
    }

    private function updateProducts ($product_id, $user_id){
        $sql = "update boodschappenlijst set amount = amount + 1 where product_id = $product_id and user_id = $user_id";
        mysqli_query($this->connection);
    }

}