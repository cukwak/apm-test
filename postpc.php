<?php
session_start();
$conn = mysqli_connect('localhost', 'test', '1234','sm');

$sql = "INSERT INTO post(title, description, writer, created)
        VALUES ('{$_POST['title']}',
                '{$_POST['description']}',
                '{$_SESSION['username']},
                NOW()
        )";
$result = mysqli_query($conn,$sql);
if($result == false){
    echo "<script>
            alert('post failed');
          </script>";
        error_log(mysqli_error($conn));
}else{
    echo"<script> location.replace('main.php'); </script>;";
    $_SESSION['title'] = $_POST['title'];
}
?>