<?php

class recipe {

    private $connection;

public function __construct(mysqli $connection) {
        $this->connection = $connection;
    }
    public function selectRecipe($recipe_id) {

        $sql = "select * from recipe_db where id = $recipe_id";

        $result = mysqli_query(mysql: $this->connection, query: $sql);
        
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $ingredients = $this->selecteerIngredients($row["id"]);

        $price = $this->calcPrice($ingredients);

        $recipe[] = [
            "id"=> $row["id"],
            "title"=> $row["title"],
            "description"=> $row["description"],
            "picture"=> $row["picture"],
            "amount_people"=> $row["amount_people"],
            "ingredients" => $ingredients,
            "price"=> $price, 
        ];

        return $recipe;
    }
  
    private function selecteerUser($user_id) {
        $user = new user($this->connection);
        $user = $user->selecteerUser($user_id);
        return $user;
    }

    private function selecteerIngredients ($recipe_id) {
        $ingr = new ingredients($this->connection);
        $ingredients = $ingr->selecteerIngredients($recipe_id);
        return $ingredients;
    }
       
    private function calcPrice($ingredients) {
        $price = 0;
        foreach ($ingredients as $ingredient) {
            $price += $ingredient["price_amount"];
        }
        return $price;
    }

    private function selectRate ($recipe_id){
        $recipeInfo = new $recipeInfo($this->connection);
        $rate = $recipeInfo->selecteerRecipeInfo($recipe_id,'W');
        return $rate;
    }

    private function selectComments ($recipe_id, $user_id) {
        $recipeInfo = new $recipeInfo($this->connection);
        $comments = $recipeInfo->selecteerRecipeInfo($recipe_id,'O');
        return $comments;
    }

    private function selecteerStappen($recipe_id){
       $recipeInfo = new $recipeInfo($this->connection);
       $stappen = $recipeInfo->selecteerRecipeInfo($recipe_id,'B');
       return $stappen;
    }


    private function selecteerKitchentype ($kitchentype_id) {
        $selecteerKitchenType = new kitchenType ($this->connection);
        $kitchenType->kitchen_type->selecteerKitchenType($kitchentype_id);
        return $kitchenType;
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