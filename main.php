<?php
session_start();
$conn = mysqli_connect('localhost', 'test', '1234','sm');
mysqli_set_charset($conn, 'utf8'); 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Board</title>
    <link rel="stylesheet" href="css/main.css">
    <h2>Server Management</h2><hr>
</head>
<body>
    <div class="user-info">
        <table>
        <tr>
            <th><?=$_SESSION['username']?></th>
            <th><a href="logout.php">
                <input type="button" value="logout" onclick="alert">
            </a></th>
        </tr>
        </table>
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
            <?php
            $sql = "SELECT * FROM post ORDER BY id DESC"; 
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);   
            if($result) {   
                while ($arr = mysqli_fetch_array($result)) {
                $listNum = $arr['id'];
            ?>
            <tr>
                <th><?=$count--?></th>  
                <th><a href="read.php?data=<?=$listNum?>"><?=htmlspecialchars($arr['title'], ENT_QUOTES, 'UTF-8')?></a></th>
                <th><?=htmlspecialchars($arr['writer'], ENT_QUOTES, 'UTF-8')?></th>
                <th><?=htmlspecialchars($arr['created'], ENT_QUOTES, 'UTF-8')?></th>
            </tr>
            <?php
                }
            }?>
            </table>
        </div>
        
    </div>
</body>
</html>
