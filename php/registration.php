<?php 

require 'functions.php';

if (isset($_POST['register'])){
    if (register($_POST) > 0){
        echo "
            <script>
                alert('You Registered!');
                document.location.href = 'login.php';
            </script>
        ";
    }else{
        echo "
        <script>
            alert('Something Wrong, You Failed to Register! Try Again..');
        </script>
    ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="registrationContainer">
        <div class="navloginregis">
            <a href="login.php">Login</a>
            <h1 class="mainloginregis">Registrate</h1>
        </div>

        <form action="" method="post" class="formloginregis">
            <ul>
                <li>
                    <label for="name">username</label>
                    <input type="text" name="name" id="name">
                </li>
                <li>
                    <label for="email">email</label>
                    <input type="email" name="email" id="email">
                </li>
                <li>
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="confirmPassword">confirm password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword">
                </li>
                <li>
                    <button type="submit" name="register">Register!</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>