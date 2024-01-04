<?php
include('../views/default/header.php')
?>
<?php require "../config/config.php" ?>
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


?>


<div class="mx-3">
    <form method="POST" action="register.php">
        <div class="mb-3">
            <label for="InputName" class="form-label">Name </label>
            <input type="text" name="name" class="form-control" id="InputName" >
        </div>
        <div class="mb-3">
            <label for="InputEmail1" class="form-label">Email </label>
            <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </form>
</div>