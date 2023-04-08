<?php 
    include("database/database.php");  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);

        if(empty($user)){
            echo "Please enter a username!";
        }elseif(empty($pass)) {
            echo "Please enter a password!";
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (user, password)
                    VALUES ('$user','$hash')";
            try {
                mysqli_query($connection, $sql);
                echo "You are now register!";
            } catch(mysqli_sql_exception) {
                echo "You not register!";
            }
        }
    }

    mysqli_close($connection);
?>