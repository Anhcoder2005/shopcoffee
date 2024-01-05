<?php //require('../ShopCoffee/views/default/header.php') ?>
<?php require('../ShopCoffee/config/config.php') ?>

<?php 
    if(isset($_POST['submit'])){
        if(empty($_POST['email']) OR empty('password')){
            echo "<script>altert('Du lieu khong duoc de trong')</script>";
        }else{
            $email = $_POST['email'];
            $password = $_POST['password'];

           $login = $conn->query("SELECT * FROM user WHERE email = '$email'");

            $login->execute();

            $fetch = $login->fetch(PDO::FETCH_ASSOC);

            if($login->rowCount() > 0 ){
                if(password_verify($password, $fetch['userPassword'])){
                    
                    
                    $_SESSION['username'] = $fetch['user_name'];
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['user_id'] = $fetch['id'];

                    echo "<script>window.location.href='".APPURL."' </script>";
                }else{
                    echo "<script>alert('email or password is wrong');</script>";
                }
            }else{
                echo "<script>alert('email or password is wrong');</script>";
            }

        }
    }
?>


<?php require('../ShopCoffee/views/auth/login.php');