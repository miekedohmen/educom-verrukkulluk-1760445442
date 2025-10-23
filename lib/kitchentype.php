<?php

class kitchentype {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerKitchentype($recipe_id)  {

        $sql = "select * from kitchentype where recipe_id = $recipe_id";
        
       $result = mysqli_query($this->connection, query: $sql);

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    }
}

