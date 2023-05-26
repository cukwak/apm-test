<?php
session_start();
$conn = mysqli_connect('localhost', 'test', '1234','test');

$sql = "INSERT INTO post(username,title, description created)
        VALUES ('{$_SESSION['username']},                
                '{$_POST['title']}',
                '{$_POST['description']}',
                NOW()
        )";
$result = mysqli_query($conn,$sql);
if($result == false){
    echo "<script>
            alert('post failed');
          </script>";
}else{
    echo"<script> location.replace('main.php'); </script>;";
}
?>