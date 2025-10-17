<?php
$username = $_POST['username'];
$id = $_POST['id'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "test", "1234", "sm");
mysqli_set_charset($conn, 'utf8');

// 비밀번호 암호화
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepared Statement 사용으로 SQL Injection 방지
$sql = "INSERT INTO users (username, id, password, created) VALUES (?, ?, ?, NOW())";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $username, $id, $hashed_password);

if(mysqli_stmt_execute($stmt)){
    echo "<script>
        alert('Successfully registered');
        location.replace('index.php');
        </script>";
}
else{
    echo "<script>
    alert('Register failed');
    location.replace('index.php');
    </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>