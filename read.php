<?php
session_start();
$id  = $_GET['data'];
$conn = mysqli_connect("localhost", "test", "1234","sm");
mysqli_set_charset($conn, 'utf8');

// Prepared Statement 사용으로 SQL Injection 방지
$sql = "SELECT * FROM post WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$arr = mysqli_fetch_array($result);

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title><?=$_SESSION['title']?></title>
    <link rel="stylesheet" href="css/read.css">
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
    <div class="write">
    <table>
    <tr><th>
        <a href="main.php">
        <input type="button" value="back"onclick="alert">
    </a></th><th>
        <input type="button" value="delete"onclick="deleteConfirm()">
    </a></th></tr>
    </table>
    </div>

    
    <div class="container">
        <form class="post">
            <h3><?=htmlspecialchars($arr['title'], ENT_QUOTES, 'UTF-8')?></h3>
            <span><?=htmlspecialchars($arr['description'], ENT_QUOTES, 'UTF-8')?></span>
        </form>
    </div>
    <script>
        function deleteConfirm() {
            if (confirm("Really delete this post?")) {
                if ("<?=htmlspecialchars($arr['writer'], ENT_QUOTES, 'UTF-8')?>" === "<?=htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8')?>") {
                    location.href = "delete.php?id=<?=htmlspecialchars($id, ENT_QUOTES, 'UTF-8')?>";
                } else {
                    alert("You have no authority");
                    location.replace('main.php');
                }
            } else {
                alert("Canceled.");
            }
        }
    </script>
</body>
</html>