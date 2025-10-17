<?php
$id = $_POST['id'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "test", "1234", "sm");
mysqli_set_charset($conn, 'utf8');

// Prepared Statement 사용으로 SQL Injection 방지
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$arr = mysqli_fetch_array($result);

echo"<br><br>";
// 암호화된 비밀번호 검증
if($arr && password_verify($password, $arr['password'])) {
    session_start();
    $_SESSION['username'] = $arr['username'];
    $_SESSION['id'] = $id;
    $_SESSION['password'] = $password;
    echo "<script>
        alert('Successfully logined.');
        location.replace('main.php');
        </script>";
}else{
    echo "<script>
        alert('login failed');
        location.replace('index.php');
        </script>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>