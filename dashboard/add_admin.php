<?php 

// Check admin
session_start();
!isset($_SESSION["admin"]) ? header("Location: ../") : "";
!isset($_SESSION["admin"]) ? header("Location: ../login.php") : null;

$current_file = $_SERVER["PHP_SELF"];

if(isset($_POST["create_admin"]))
{
    include "../backend/config.php";

    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));

    $sql = "SELECT username FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $sql) or die("Query failed!");

    if(mysqli_num_rows($result) > 0){
        $message = "Admin is alrady exists!";
    }
    else
    {
        $sql = "INSERT INTO admin(first_name, last_name, username, password)
                VALUES ('$first_name', '$last_name', '$username', '$password')";

        if(mysqli_query($conn, $sql)){
            $message = "Create admin successfuly!";
        }
        else {
            die("Query failed!");
        }
    }

    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======== TITLE ======== -->
    <title>Coffee shop | Add admin</title>
</head>
<body>
    <h1>Add admin</h1>

    <!-- Add Admin Form -->
    <form action="<?php echo $current_file ?>" method="post">
        <label for="first_name">First name:</label><br/>
        <input type="text" name="first_name" id="first_name" required /><br/><br/>

        <label for="last_name">Last name:</label><br/>
        <input type="text" name="last_name" id="last_name" required /><br/><br/>

        <label for="username">User name:</label><br/>
        <input type="text" name="username" id="username" required /><br/><br/>

        <label for="password">Password:</label><br/>
        <input type="password" name="password" id="password" required /><br/><br/>

        <input type="submit" value="Create admin" name="create_admin">
    </form>

    <!-- Message -->
    <p><?php echo isset($message) ? $message : "" ?></p>
</body>
</html>