<?php

class recipe {

    private $connection;

public function __construct(mysqli $connection) {
        $this->connection = $connection;
    }

    public function selectRecipe($recipe_id) {

        $sql = "select * from recipe where id = $recipe_id";

        $result = mysqli_query(mysql: $this->connection, query: $sql);
        
        if ($result) {
            die ("Query failed". mysqli_error($this->connection));
        }

        return mysqli_fetch_array ($result, MYSQL_ASSOC);
    }
  
    public function selecteerUser($user_id) {

        $sql = "select * from user where id = $user_id";
        
       $result = mysqli_query(mysql: $this->connection, query: $sql);

       if (!$result) {
        die("Query failed:". mysqli_error ($this->connection));
       }   

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    }

    public function selecteerIngredients ($recipe_id) {
        
        $sql = "select * from user where id = $recipe_id";

        $result = mysqli_query (mysql: $this->connection, query: $sql);
        
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

       public function selecteerKitchentype($kitchentype_id)  {

        $sql = "select * from kitchen_type where id = $kitchentype_id";
        
       $result = mysqli_query($this->connection,$sql);

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
}