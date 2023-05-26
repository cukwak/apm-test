<?php
$conn = mysqli_connect('localhost', 'test', '1234','test');

$sql = "INSERT INTO post(title, description created)
        VALUES '{$_POST['title']}',
                '{$_POST['description']}',
                NOW()
        )";
$result = mysqli_query($conn,$sql);
if($result == false){
    echo "<script>
            alert('post failed');
          </script>";
}else{
    echo"<script> location.replace('index.php'); </script>;";
}
echo $sql;
?>