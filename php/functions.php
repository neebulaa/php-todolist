<?php 
$db = mysqli_connect("localhost", "root", '', "todolist");

function getQuery($query){
    global $db;
    $result = mysqli_query($db, $query);

    $array = [];

    while ($data = mysqli_fetch_assoc($result)){
        $array[] = $data;
    }

    return $array;
}

function add($post, $user_cid){
    global $db;
    $title = htmlspecialchars($post['TITLE']);
    $description = htmlspecialchars($post['DESCRIPTION']);
    $subject = htmlspecialchars($post['SUBJECT']);
    $due = htmlspecialchars(strtotime($post['DUE']));

    $text_query = "INSERT INTO `list-tugas` VALUES ('', '$user_cid', '$title', '$description', '$subject', '$due')";

    mysqli_query($db, $text_query);

    return mysqli_affected_rows($db);
}

function search($keyword, $cid){
    $text_query = "SELECT * FROM `list-tugas` WHERE 
    `list-tugas`.`user_id` = $cid AND (title LIKE '%$keyword%' OR
    description LIKE '%$keyword%' OR
    subject LIKE '%$keyword%' OR
    due LIKE '%$keyword%');
    ";

    return getQuery($text_query);
}


function delete($id){
    global $db;
    mysqli_query($db, "DELETE FROM `list-tugas` WHERE id = $id");
    return mysqli_affected_rows($db);
}


function change($post, $id){
    global $db;
    $title = htmlspecialchars($post['TITLE']);
    $description = htmlspecialchars($post['DESCRIPTION']);
    $subject = htmlspecialchars($post['SUBJECT']);
    $due = htmlspecialchars(strtotime($post['DUE']));

    $text_query = "UPDATE `list-tugas` SET title = '$title', description = '$description', subject = '$subject', due = '$due' WHERE id = $id";

    mysqli_query($db, $text_query);

    return mysqli_affected_rows($db);
}

// color system for each card

function color($time){
    $difference = $time - time();
    $pink = 60*60*24*3;
    $biru = 60*60*24*7;
    $hijau = 60*60*24*14;
    // $putih = 60*60*24*14;

    if ($difference > $hijau){
        return "putih";
    }else if ($difference > $biru){
        return 'hijau';
    }else if ($difference > $pink){
        return 'biru';
    }else if ($difference <= $pink && $difference > 0){
        return 'pink';
    }else{
        return 'merah';
    }
}



// register function

function register($post){
    global $db;

    $name = strtolower(stripslashes($post['name']));

    // pengecekan apakah ada name seperti berikut di dalam database

    $name_in_db = getQuery("SELECT * FROM users WHERE name = '$name'");

    if ($name_in_db != []){
        echo '
            <script>
                alert("Username has been taken, please use others..");
            </script>
        ';
        return false;
    }

    $email = strtolower($post['email']);

    $password = mysqli_real_escape_string($db, $post['password']);
    $password2 = mysqli_real_escape_string($db, $post['confirmPassword']);

    if ($password != $password2){
        echo '
            <script>
                alert("Password Confirmation doesn\'t match");
            </script>
        ';
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO users VALUES ('', '$name', '$email', '$password')");

    return mysqli_affected_rows($db);

}
?>