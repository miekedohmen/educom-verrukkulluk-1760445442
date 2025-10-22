<?php

class product {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerProducts($products_id) {

        $sql = "select * from products where id = $products_id";
        
       $result = mysqli_query(mysql: $this->connection, query: $sql);

       if (!$result) {
        die("Query failed:". mysqli_error ($this->connection));
       }   

        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    }
}

