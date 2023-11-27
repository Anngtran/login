<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'login-project';
    

    //set DSN -database Source Name
    $dsn = 'mysql:host='. $host . '; dbname=' . $dbname;
   
    $connect = new mysqli($host, $user, $password, $dbname);
    $sql = "SELECT prd_id , prd_name, image, price, quantity, description, brand_id FROM products";
    $result = $connect->query($sql);

    try {
        //create a PDO instance
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

    }   catch(PDOException $e) {
        echo "Connected failed:" . $e->getMessage();

    }

?>
