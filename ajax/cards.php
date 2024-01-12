<?php 
session_start();
include '../php/functions.php';
$keyword = $_GET['keyword'];

$assignments = search($keyword, $_SESSION['cid']);

?>


<?php foreach($assignments as $assignment): ?>
    <div class='card <?= color($assignment["due"]);?>'>
        <div class="tugas">
            <div class="title"><?= $assignment['title']?></div>
            <span class="block"></span>
            <p class="description"><?= $assignment['description']?></p>
        </div>

        <div class="tugas-info">
            <div class="nama-pelajaran">
                <span>Nama Pelajaran</span>
                <div><?= $assignment['subject']?></div>
            </div>

            <div class="due-date">
                <span>Due-date</span>
                <div class="time"><?= date('l, d-M-Y', $assignment['due']) ?></div>
            </div>
        </div>
        <div class="action">
            <a href="php/change.php?id=<?= $assignment['id']?>" class="change">Change</a>
            <a href="php/delete.php?id=<?= $assignment['id']?>" class="delete" onclick='return confirm("Apakah anda ingin menghapusnya?")'><i class="fa-solid fa-trash-can"></i></a>
        </div>
    </div>
<?php endforeach; ?>