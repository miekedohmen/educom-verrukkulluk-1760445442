<?php

class Ingredients {

    private $connection;
    private $prod;
    public function __construct($connection) {
        $this->connection = $connection;
        $this->prod = new products($this->connection);
    } 
  
    public function selecteerIngredients($recipe_id) {

        $sql = "select * from ingredients where recipe_id = $recipe_id";
        
       $result = mysqli_query($this-> connection, $sql);

       $ingredients = [];

       while($row = mysqli_fetch_assoc( $result)){
        $product= $this->selecteerIngredientsProducts($row["products_id"]);
        $ingredients [] = [
            "id"=> $row["id"] ,
            "recipe_id"=> $row["id"], 
            "products_id"=> $row["products_id"],
            "amount"=> $row["amount"],
            "name"=> $product["name"],
            "description" => $product["description"],
            "product_amount" => $product["amount"],
            "price_amount" => $product["price_amount"],
            "packaging_amount" => $product["packing_amount"],
            "calories_unit" => $product["calories_unit"],
        ] ;

        };

        return $ingredients;
    }

    private function selecteerIngredientsProducts ($products_id) {
        $ingredientsProducts = $this->prod->selecteerProducts($products_id);
        return $ingredientsProducts;

    }

}