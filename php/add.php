<?php 
session_start();
include 'functions.php';

if (isset($_POST['addSubmit'])){
    if (add($_POST, $_SESSION['cid']) > 0){
        echo '
            <script>
            alert("Data Added");
            document.location.href = "../index.php";
            </script>
        ';
    }else{
        echo '
            <script>
            alert("Data Failed to Add. Check Again!");
            </script>
        ';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD PAGE</title>
    <style>
        <?php include "style.css";?>
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="card">
            <div class="img-circle"><a href="../index.php"></a></div>
            <div class="tugas">
                <div class="title">
                    <label for='judul'>Assignment Title </label>
                    <input type='text' name='TITLE' id='judul' placeholder="Type here.." autocomplete="OFF">
                </div>
                <p class="description">
                    <label for="deskripsi">Assignment Description</label>
                    <textarea name="DESCRIPTION" id="deskripsi" placeholder="Description.."></textarea>
                </p>
            </div>

            <div class="tugas-info">
                <div class="nama-pelajaran">
                    <label for="pelajaran">Nama Pelajaran</label>
                    <input type="text" name="SUBJECT" id="pelajaran" placeholder="Science.." autocomplete="OFF">
                </div>

                <div class="due-date">
                    <label for="due-date">Due-Date</label>
                    <input type="text" name="DUE" id='due-date' placeholder="Ex: 6 march 2022" autocomplete="OFF">
                </div>
            </div>
            <button type="submit" name="addSubmit" class="submitBTN">Add</button>
        </div>
    </form>
    
</body>
</html>