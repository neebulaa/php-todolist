<?php
session_start();
include 'php/functions.php';
// check apakah dia udh login atau belum menggunakan session
if (!isset($_SESSION['login'])) {
    header("Location: php/login.php");
    exit;
}



// ambil id dari cookie_id
$cid = $_SESSION['cid'];
$assignments = getQuery("SELECT * FROM `list-tugas` WHERE `list-tugas`.`user_id` = $cid");

if (isset($_POST['searchClicked'])) {
    $keyword = $_POST['key'];
    $assignments = search($keyword, $cid);
}

if (isset($_POST['sortClicked'])) {
    $sort = $_POST['sort-select'];

    if ($sort != 'latest') {
        $sort_value = '';
        if ($sort == "duedate") {
            $sort_value = "ASC";
        } else {
            $sort_value = "DESC";
        }
        $assignments = getQuery("SELECT * FROM `list-tugas` WHERE `list-tugas`.`user_id` = $cid ORDER BY due $sort_value");
    } else {
        // asc
        $assignments = getQuery("SELECT * FROM `list-tugas` WHERE `list-tugas`.`user_id` = $cid ORDER BY id");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-list by Edwin Supaya Saya ngatur tugas Mudah..</title>
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <style>
        <?php include "style.css" ?>.author {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 50px;
        }

        .author span {
            font-size: 40px;
            margin: .5px;
            display: inline-block;
            background: linear-gradient(90deg, var(--color-text-third), rgb(243, 78, 113));
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: .2s;
            cursor: pointer;
        }

        .author span:hover {
            transform: translateY(-20px) scale(1.5);
        }
    </style>
</head>

<body>
    <a href="php/logout.php" class="logout">Logout</a>
    <div class="container">

        <div class="header">
            <h1>Todo-List</h1>
            <div class="info">
                <p>
                    Todolist pengatur Tugas - Lagi banyak tugas soalnya. By Edwin Hendly
                </p>
                <br>
                <ul>
                    List warna waktu:
                    <li>
                        1. Putih, waktu todo lebih dari 2 minggu
                    </li>
                    <li>
                        2. Hijau, waktu todo tersisa 2 minggu
                    </li>
                    <li>
                        3. Biru, waktu todo tersisa 1 minggu
                    </li>
                    <li>
                        4. Pink, waktu todo tersisa 3 hari
                    </li>
                    <li>
                        5. Merah, waktu todo sudah lewat
                    </li>
                </ul>
            </div>
        </div>

        <div class="funct">
            <a href="php/add.php"><i class="fa-solid fa-plus"></i></a>

            <div class="sort">
                <form action="" method="post">
                    <select name="sort-select" id="">
                        <option value="latest">Latest</option>
                        <option value="duedate">Due-date</option>
                        <option value="longdue">Long-due</option>
                    </select>

                    <button type="submit" name="sortClicked">Sort</button>
                </form>
            </div>

            <div class="search">
                <form action="" method="post">

                    <input type="text" name="key" id="key" placeholder="Masukkan Apapun.." autocomplete="OFF">
                    <button type="submit" name="searchClicked"><i class="fa-solid fa-magnifying-glass"></i></button>

                </form>
            </div>
        </div>


        <div class="card-lists">
            <h2 class="text"> <span>></span> KERJAKAN!</h2>

            <div class="cards" id="cards">
                <?php foreach ($assignments as $assignment) : ?>
                    <div class='card <?= color($assignment["due"]); ?>'>
                        <div class="tugas">
                            <div class="title"><?= $assignment['title'] ?></div>
                            <span class="block"></span>
                            <p class="description"><?= $assignment['description'] ?></p>
                        </div>

                        <div class="tugas-info">
                            <div class="nama-pelajaran">
                                <span>Nama Pelajaran</span>
                                <div><?= $assignment['subject'] ?></div>
                            </div>

                            <div class="due-date">
                                <span>Due-date</span>
                                <div class="time"><?= date('l, d-M-Y', $assignment['due']) ?></div>
                            </div>
                        </div>
                        <div class="action">
                            <a href="php/change.php?id=<?= $assignment['id'] ?>" class="change">Change</a>
                            <a href="php/delete.php?id=<?= $assignment['id'] ?>" class="delete" onclick='return confirm("Apakah anda ingin menghapusnya?")'><i class="fa-solid fa-trash-can"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>



        </div>

        <!-- <div class="info">
            <h2><span class="decorateh2">></span>Info</h2>

            <div class="builder">
                <div class="person">
                    <div class="img"></div>
                </div>
            </div>
        </div> -->

        .

    </div>


    <script src="js/script.js">
        // let author = document.querySelector('.author');

        // let element = [...author.textContent].map(c=>`<span>${c}</span>`).join("");

        // author.innerHTML = element;
    </script>
</body>

</html>