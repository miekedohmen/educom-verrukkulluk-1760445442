<?php

class kitchentype {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerKitchentype($kitchentype_id)  {

        $sql = "select * from kitchen_type where id = $kitchentype_id";
        
       $result = mysqli_query($this->connection,$sql);

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    }
}

