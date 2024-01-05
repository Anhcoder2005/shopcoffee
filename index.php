

<?php include('views/default/header.php'); ?>

<?php 

// function dd($value)
// {
//     echo "<pre>";
//     var_dump($value);
//     echo "</pre>";

//     die();
// }

// dd($_SERVER['REQUEST_URI']); 

$request = $_SERVER['REQUEST_URI'];

// echo $request

?>


<?php require('route.php') ?>


