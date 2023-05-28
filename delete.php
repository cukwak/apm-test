<?php
session_start();    

$id = $_GET['id'];

$conn = mysqli_connect("localhost", "test", "1234", "sm");
mysqli_set_charset($conn, 'utf8');  
$sql = "DELETE FROM post WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

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
?>