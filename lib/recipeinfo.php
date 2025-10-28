<?php

class recipeinfo{

    private $connection;
    private $user;
    public function __construct($connection) {
        $this->connection = $connection;
        $this->user = new user($connection);

    } 
  
    public function deleteFavorites($recipe_id, $user_id) {

    $sql = "DELETE FROM recipe_info WHERE recipe_id = $recipe_id AND user_id = $user_id AND record_type = 'F'";

            $result = mysqli_query($this->connection, $sql);

        }

    public function addToFavorites($recipe_id, $user_id) {

        $sql = "INSERT INTO recipe_info (record_type, user_id, recipe_id, added_date)
        VALUES ('F', $user_id, $recipe_id, NOW())";

               $result = mysqli_query($this->connection, $sql);

        }

    public function selecteerRecipeinfo($recipe_id, $record_type)
    {
        $sql = "select * from recipe_info where recipe_id = $recipe_id AND record_type = '$record_type'";
        
        $result = mysqli_query($this->connection, $sql);

        $recipeinfo = [];

       while($row = mysqli_fetch_assoc ($result)) {
        
            if ($row['record_type'] == 'F' || $row['record_type'] == 'O')
            {
                $user = $this->selecteerUser($row['user_id']) ;
                $recipeinfo[] = 
                [
                    'id'=>$row['id'],
                    'record-type'=>$row['record_type'],
                    'user_id'=>$row['user_id'],
                    'numeric_field'=>$row['numeric_field'],
                    'text_field'=>$row['text_field'],
                    'first_name'=> $user['first_name'],
                    'last_name'=> $user['last_name'],
                    'recipe_id'=> $recipe_id,
                ]; 
            }
            
            else {
                $recipeinfo[] = [
                    'id'=>$row['id'],
                    'record-type'=>$row['record_type'],
                    'user_id'=>$row['user_id'],
                    'numeric_field'=>$row['numeric_field'],
                    'text_field'=>$row['text_field'],
                    'recipe_id'=> $recipe_id,
                ];
            }
        }

     return $recipeinfo;

    }

     private function selecteerUser ($user_id) {
        $user = $this->user->selecteerUser($user_id);
        return $user;

    }
}