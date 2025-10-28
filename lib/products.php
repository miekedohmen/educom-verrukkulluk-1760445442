"<?php

class products {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerProducts($products_id) {

        $sql = "select * from products where id = $products_id";
        
       $result = mysqli_query(mysql: $this->connection, query: $sql);

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    }
}

