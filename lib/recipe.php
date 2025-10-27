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
        public function calcPrice($recipe_id) {

            $sql = "SELECT SUM(ri.amount * p.price_amount) AS total_price FROM recipe_ingredients ri JOIN products p ON ri.product_id = p.id WHERE ri.recipe_id = $recipe_id";

            $result = mysqli_query($this->connection, $sql);

            if (!$result) {
                die("Query failed: " . mysqli_error($this->connection));
            }

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            return $row['total_price'];
        }

        public function selecteerWaardering($recipe_id, $user_id) {

            $sql = "SELECT * FROM recipe_info WHERE recipe_id = $recipe_id AND user_id = $user_id AND record_type = 'W'";

            $result = mysqli_query($this->connection, query: $sql);
        }

        public function selecteerStappen($recipe_id) {
            
            $sql = "SELECT * FROM recipe_info WHERE recipe_id = $recipe_id AND record_type= 'B' ";
            
            $result = mysqli_query($this->connection, query: $sql);

            if (!$result) {
                die("Query failed:" . mysqli_error($this->connection));
            }

            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }

        public function selecteerOpmerkingen($recipe_id, $user_id) {
            
            $sql = "SELECT * FROM recipe_info WHERE recipe_id = $recipe_id AND user_id = $user_id AND record_type= 'O'";

            $result = mysqli_query(mysql: $this->connection, query: $sql);
        }

       public function selecteerKitchentype($kitchentype_id)  {

        $sql = "select * from kitchen_type where id = $kitchentype_id";
        
       $result = mysqli_query($this->connection,$sql);

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

        private function determineFavorites ($recipe_id, $user_id) {
            
            $recipeInfo = new RecipeInfo ($this->connection);

            $favoriteInfo = $recipeInfo->selecteerRecipeinfo($recipe_id, 'F');

            if (is_array($favoriteInfo)){

                foreach ($favoriteInfo as $favorite) {

                    if ($favorite['user_id'] == $user_id){

                        return true;
                    }
                }
            }
            
            return false;
        }
}