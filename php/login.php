<?php 
session_start(); 
require 'functions.php';
// if (isset($_COOKIE['id']) && isset($_COOKIE['key'])){
//     $id = $_COOKIE['id'];
//     $name = $_COOKIE['key'];

//     $result = mysqli_query($db, "SELECT name FROM users WHERE id = $id;");
    
//     $name_in_db = mysqli_fetch_assoc($result);
//     if ($name == hash('sha256', $name_in_db['name'])){
//         $_SESSION['login'] = true;
//     }
// }

// if (isset($_SESSION['login'])){
//     header("Location: ../index.php");
//     exit;
// }



// if (isset($_POST["login"])){
//     $name = strtolower(stripslashes($_POST['name']));
//     $password = mysqli_real_escape_string($db, $_POST['password']);
//     $result = mysqli_query($db, "SELECT * FROM users WHERE name = '$name'");
    
//     if ($data = mysqli_fetch_assoc($result)){ //mysqli_num_rows($result) == 1
//         if (password_verify($password, $data['password'])){

//             $_SESSION['login'] = true;

//             if (isset($_POST['remember'])){
//                 setcookie('id', $data['id'], time() + 7200);
//                 setcookie('key', hash('sha256', $name), time() + 7200);
//             }

//             header("Location: ../index.php");
//             exit;
//         }
//     }

//     $error = true;

// }

if (isset($_COOKIE['key']) && isset($_COOKIE['random'])){
    $id = $_COOKIE['key'];
    $name = $_COOKIE['random'];
    
    $result = mysqli_query($db, "SELECT * FROM users WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
    
    if ($name == hash('sha256', $data['name'])){
        $_SESSION['login'] = true;
        $_SESSION['cid'] = $data['id'];
    }

}

if (isset($_SESSION['login'])){
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['login'])){
    $name = strtolower(stripslashes($_POST['name']));
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $result = mysqli_query($db, "SELECT * FROM users WHERE name = '$name'");

    if (mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);

        if(password_verify($password, $data['password'])){

            // set session
            $_SESSION['login'] = true;
            $_SESSION['cid'] = $data['id'];

            //check cookie_id
            $conn = mysqli_connect('localhost', 'root', '', 'todolist');
            $check_cookie_id = mysqli_query($conn, "SELECT * FROM `cookie_id` WHERE `user_id` = {$data['id']}");

            if(mysqli_num_rows($check_cookie_id) == 0){
                $query = "INSERT INTO `cookie_id` VALUES ('', '{$data['id']}')";
                mysqli_query($conn, $query);
            }

            if (isset($_POST['remember'])){
                setcookie('key', $data['id'], time() + 60);
                setcookie('random', hash('sha256', $name), time() + 60);
            }


            // redirect
            header("Location: ../index.php");
            exit;
        }

    }
    $error = true;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="loginContainer">
        <div class="navloginregis">
            <h1 class="mainloginregis">Login</h1>
            <a href="registration.php">Registrate</a>
        </div>

        <?php if(isset($error)): ?>
            <h4 style="color:red; font-style:italic;">Username / Password Salah!</h4>
        <?php endif; ?>
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
                <li class="rememberMe">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">remember me</label>
                </li>
                <li>
                    <button type="submit" name="login">Login!</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>