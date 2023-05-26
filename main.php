<?php
session_start();
$conn = mysqli_connect('localhost', 'test', '1234','test');
mysqli_set_charset($conn, 'utf8'); 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Board</title>
    <link rel="stylesheet" href="css/main.css">
    <h3>Sever Management</h3><hr>
</head>
<body>
    <div class="user-info">
        <span>
           <? echo "username; ".$row['username'];?>
        </span>
        <a href="logout.php">
        <input type="button" value="logout" onclick="alert">
        </a>
    </div>
        <div class = "write">
            <a href="post.html">
            <input type ="button" value="Post">
            </a>
        </div>
    <div class="container">
        <div class="post">
            <div class="title">첫 번째 게시물</div>
            <div class="content">
                첫 번째 게시물 내용입니다.
            </div>
            <div class="date">작성일: 2023-05-26</div>
        </div>
    </div>
</body>
</html>
