<?php 
include 'functions.php';
$id = $_GET['id'];

if (delete($id) > 0){
    echo '
        <script>
            alert("Data Deleted!");
            document.location.href = "../index.php";
        </script>
    ';

}else{
    echo '
    <script>
        alert("Data Failed to Delete");
        document.location.href = "../index.php";
    </script>
';
}



?>