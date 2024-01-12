<?php 
include 'functions.php';
$id = $_GET['id'];
$tugas = getQuery("SELECT * FROM `list-tugas` WHERE id = $id")[0];

if (isset($_POST['changeSubmit'])){
    if (change($_POST, $id) > 0){
        echo '
            <script>    
                alert("Data Changed");
                document.location.href = "../index.php";
            </script>
        
        ';
    }else{
        echo '
            <script>
                alert("Data Failed to change. Check Again (No Changes means you failed to change WKWK!). ");
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
                    <input type='text' name='TITLE' id='judul' value="<?= $tugas['title']?>" placeholder="Type here.." autocomplete="OFF">
                </div>
                <p class="description">
                    <label for="deskripsi">Assignment Description</label>
                    <textarea name="DESCRIPTION" id="deskripsi" placeholder="Description.."><?= $tugas['description']?></textarea>
                </p>
            </div>

            <div class="tugas-info">
                <div class="nama-pelajaran">
                    <label for="pelajaran">Nama Pelajaran</label>
                    <input type="text" name="SUBJECT" value="<?= $tugas['subject']?>" id="pelajaran" placeholder="Science.." autocomplete="OFF">
                </div>

                <div class="due-date">
                    <label for="due-date">Due-Date</label>
                    <input type="text" name="DUE" value="<?= date('d M Y', $tugas['due'])?>" id='due-date' placeholder="Ex: 6 march 2022" autocomplete="OFF">
                </div>
            </div>
            <button type="submit" name="changeSubmit" class="submitBTN">Change</button>
        </div>
    </form>
</body>
</html>