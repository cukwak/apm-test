<?php
session_start();    

$id = $_GET['id'];

$conn = mysqli_connect("localhost", "test", "1234", "sm");
mysqli_set_charset($conn, 'utf8');

// Prepared Statement 사용으로 SQL Injection 방지
$sql = "DELETE FROM post WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
$result = mysqli_stmt_execute($stmt);

if($result) {
    echo 
    "<script>
    alert('Delete a post.'); location.replace('main.php');
    </script>";
}else{
    echo 
    "<script>
    alert('Delete failed.'); location.replace('main.php');
    </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>