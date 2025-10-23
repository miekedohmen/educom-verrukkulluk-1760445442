<?php

class Ingredients {

    private $connection;
    private $prod;
    public function __construct($connection) {
        $this->connection = $connection;
        $this->prod = new products($this->connection);
    } 
  
    public function selecteerIngredients($recipe_id) {

        $sql = "select * from ingredients where id = $recipe_id";
        
       $result = mysqli_query($this-> connection, $sql);

       $ingredients = [];

       while($row = mysqli_fetch_assoc( $result)){
        $product= $this->selecteerIngredientsProducts($row["product_id"]);
        $ingredients [] = [
            "id"=> $row["id"] ,
            "recipe_id"=> $row["id"], 
            "products_id"=> $row["product_id"],
            "amount"=> $row["amount"],
            "products_info"=> $product
        ] ;

        };

        return $ingredients;
    }

    private function selecteerIngredientsProducts ($products_id) {
        $prod = new products($this->connection);
        $ingredientsProducts = $prod->selecteerProducts($products_id);
        return $ingredientsProducts;

    }

}