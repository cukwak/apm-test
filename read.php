<?php
session_start();
$id  = $_GET['data'];
$conn = mysqli_connect("localhost", "test", "1234","sm");
mysqli_set_charset($conn, 'utf8');
$sql = "SELECT * FROM post WHERE id = $id;";
$result = mysqli_query($conn,$sql);
$arr = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title><?=$_SESSION['title']?></title>
    <link rel="stylesheet" href="css/read.css">
    <h3>Sever Management</h3><hr>
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
    <div class="write">
    <table>
    <tr><th>
        <a href="main.php">
        <input type="button" value="back"onclick="arlert">
    </a></th><th>
        <a href="reform.php">
        <input type="button" value="reform"onclick="arlert">
    </a></th></tr>
    </table>
    </div>

    
    <div class="container">
        <div class="post">
            <div class="title">
                <?=$arr['title']
                ?>
            </div>
            <div class="content">
                <?=$arr['description']
                ?>
            </div>
            <div class="date">
                <?=$arr['created']
                ?>
            </div>
        </div>
    </div>

</body>
</html>