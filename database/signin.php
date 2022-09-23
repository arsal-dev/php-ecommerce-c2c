<?php

    include './database/db_connect.php';

        session_start();

      if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];


        if(empty($email)){
          $error = 'Email Required';
        }
        elseif(empty($pass)){
          $error = "Password Required";
        }
        else {
          $result = $conn->query("SELECT id, email, password FROM `users` WHERE `email` = '$email'");
          if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $db_pass = $row['password'];

            if(password_verify($pass, $db_pass)){
                $_SESSION['id'] = $row['id'];
                header('Location: ./clientarea/index.php');
            }
            else {
                $error = 'email or password is incorrect';
            }
          }
          else {
            $error = 'email or password is incorrect';
          }
        }
      }
    ?>