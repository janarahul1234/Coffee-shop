<?php 

include "./config.php";

$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, md5($_POST["password"]));

$sql = "SELECT username FROM customers WHERE username = '$username'";
$result = mysqli_query($conn, $sql) or die("Query failed!");

if(mysqli_num_rows($result) > 0){
    echo "User is alrady exists!";
}
else
{
    $sql = "INSERT INTO customers(username, email, password)
            VALUES ('$username', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        header("Location: ../login.php");
    }
    else {
        die("Query failed!");
    }
}

mysqli_close($conn);