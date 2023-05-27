<?php
session_start();
$conn = mysqli_connect('localhost', 'test', '1234','sm');
mysqli_set_charset($conn, 'utf8'); 
$sql = "SELECT * FROM post ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);


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
            <table>
            <tr>
                <th>Num</th>
                <th>Title</th>
                <th>Writer</th>
                <th>Created</th>
            </tr>
            <? if ($result){
                while ($arr = mysqli_fetch_array($result)){
                    $list = $arr['id'];
             ?>
            <tr>
                <th><?=$count--?></th>
                <th><a href="read.php?data=<?$id?>"><?=$arr['title']?></a></th>
                <th><?=$arr['username']?></th>
                <th><?=$arr['created']?></th>
            </tr>
            <?}}?>
            </table>
        </div>
        
    </div>
</body>
</html>
