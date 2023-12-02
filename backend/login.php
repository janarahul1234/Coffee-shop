<?php 


// Database configuration
include "./config.php";

session_start();

if(isset($_POST["login"])){
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = md5($_POST["password"]);

    $codeWord = "-admin";
    $admin = !strcmp(explode(" ", $username)[0], $codeWord);

    if($admin){
        // Admin
        $username = str_replace($codeWord." ", "", $username);
        $sql = "
            SELECT first_name, last_name, username FROM admin 
            WHERE username = '{$username}' AND password = '{$password}'
        ";
        $result = mysqli_query($conn, $sql) or die("Query falied");
    
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION["admin"] = $row["username"];
                $_SESSION["first_name"] = $row["first_name"];
                $_SESSION["last_name"] = $row["last_name"];
            }
            header("Location: ../dashboard/"); // Dashboard
        }
        else{
            echo "Invalid username or password!";
        }
    }
    else{
        // Customer
        $sql = "
            SELECT customer_id, username FROM customers 
            WHERE username = '{$username}' AND password = '{$password}'
        ";
        $result = mysqli_query($conn, $sql) or die("Query falied");
    
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                $_SESSION["customer_id"] = $row["customer_id"];
                $_SESSION["customer"] = $row["username"];
            }
            header("Location: ../"); // Home page
        }
        else{
            echo "Invalid username or password!";
        }
    }
}