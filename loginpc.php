<?php
$id = $_POST['id'];
$password = $_POST['password'];

$conn =  mysqli_connect("localhost", "test", "1234", "sm");
mysqli_set_charset($conn, 'utf8');
$sql = "SELECT * FROM users where id = '$id' && password = '$password';";
$result = mysqli_query($conn, $sql);
$list = mysqli_num_rows($result);
$arr = mysqli_fetch_array($result);

echo"<br><br>";
if($list) {
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

?>