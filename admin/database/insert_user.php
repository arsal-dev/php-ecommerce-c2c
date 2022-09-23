<?php

        include './database/db_connect.php';

        if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $address = $_POST['address'];
          $pass = $_POST['pass'];
          $cpass = $_POST['cpass'];

          if(empty($name)){
            $error = 'Please Enter Your Name';
          }
          elseif(empty($email)){
            $error = 'Please Enter Your Email';
          }
          elseif(empty($phone)){
            $error = 'Please Enter Your Phone';
          }
          elseif(empty($address)){
            $error = 'Please Enter Your Address';
          }
          elseif(empty($pass)){
            $error = 'Please Enter Your New Password';
          }
          elseif(empty($cpass)){
            $error = 'Please Enter Your Confirm Password';
          }
          elseif(strlen($pass) < 8){
            $error = 'Your password must be greater then or equal to 8';
          }
          elseif($pass != $cpass){
            $error = 'Password and Confirm password do not match';
          }
          else {

            $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

            if ($result->num_rows > 0) {
              $error = 'Email already exist!';
            } else {
              $newPass = password_hash($pass, PASSWORD_DEFAULT);
            
              $conn->query("INSERT INTO `users`(`name`, `email`, `phone`, `address`, `role`, `password`) VALUES ('$name','$email','$phone','$address', 1, '$newPass')") or die($conn->error);

              $succ = 'User Created Successfully Please <a class="text-info" href="../signin.php">Login</a>';
            }
          }
        }
    ?>