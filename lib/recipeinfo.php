<?php

class recipeinfo{

    private $connection;
    private $prod;
    public function __construct($connection) {
        $this->connection = $connection;
    } 
  
    public function selecteerRecipeinfo($recipe_id, $record_type)
    {
        $sql = "select * from recipe_info where recipe_id = $recipe_id AND record_type = '$record_type'";
        
       $result = mysqli_query($this-> connection, $sql);

       while($row = mysqli_fetch_assoc( $result ))
        {
            
            if ($row['record_type'] == 'F' || $row['record_type'] == 'O')
            {
                $user = $this->selecteerUser($row['user_id']) ;
                $recipeinfo[] = 
                [
                    'id'=>$row['id'],
                    'record-type'=>$row['record_type'],
                    'user_id'=>$row['user_id'],
                    'numeric_field'=>$row['numeric_field'],
                    'text_field'=>$row['text_field']
                ]; 
            }
            
            else {
                $recipeinfo[] = [
                    'id'=>$row['id'],
                    'record-type'=>$row['record_type'],
                    'user_id'=>$row['user_id'],
                    'numeric_field'=>$row['numeric_field'],
                    'text_field'=>$row['text_field']
                ];
            }
        }

     return $recipeinfo;

    }

     private function selecteerUser ($user_id) {
        $user = $this->prod->selecteerUser($user_id);
        return $user;

    }
}