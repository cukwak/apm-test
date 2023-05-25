<?php
$username = $_POST['username'];
$id = $_POST['id'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "test", "1234", "test");
mysqli_set_charset($conn, 'utf8');
$sql = "INSERT INTO users (username, id, password, created)
        VALUES ('$username', '$id', '$password', now())";

if(mysqli_query($conn, $sql)){
    echo "<script>
        alert('Sucessfully registered');
        location.replace('index.php');
        </script>";
}
else{
    echo "<script>
    alert('Register failed');
    location.replace('index.php');
    </script>";
}

?>