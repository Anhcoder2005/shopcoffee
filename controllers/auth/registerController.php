<?php //require('../ShopCoffee/views/default/header.php')
?>
<?php require('../ShopCoffee/config/config.php') ?>
<?php 
    if(isset($_SESSION['username'])) {
        header("location: ".APPURL."");
      }


    if(isset($_POST['submit'])){
        if(empty($_POST['name']) OR empty($_POST['email']) OR empty('password')){
            echo "<script>alert('some inputs are empty');</script>";
        }else{
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $insert = $conn->prepare("INSERT INTO user(user_name, email, userPassword) VALUES (:user_name, :email, :userPassword)");
            $insert->execute([
                ':user_name'  => $name,
                ':email' => $email,
                ':userPassword' => password_hash($password, PASSWORD_DEFAULT),
            ]);

            echo "<script>window.location.href='".APPURL."/auth/login.php' </script>";
        }
    }



    require('../ShopCoffee/views/auth/register.php')
?>


