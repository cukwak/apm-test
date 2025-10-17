<?php
session_start();
$conn = mysqli_connect('localhost', 'test', '1234','sm');
mysqli_set_charset($conn, 'utf8'); 

// Prepared Statement 사용으로 SQL Injection 방지
$sql = "INSERT INTO post(title, description, writer, created) VALUES (?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['description'], $_SESSION['username']);

$result = mysqli_stmt_execute($stmt);
if($result == false){
    echo "<script>
            alert('post failed');
          </script>";
        error_log(mysqli_error($conn));
}else{
    echo"<script> location.replace('main.php'); </script>;";
    $_SESSION['title'] = $_POST['title'];
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>