<?php


    define("HOSTNAME", "localhost");

    define("DBNAME", 'shopcoffee');

    define("USER", 'root');

    define("PASS", '');

    

    try {
        
        $conn = new PDO("mysql: host=". HOSTNAME ."; dbname=".DBNAME.";", USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {

        die($e->getMessage());
    }

?>