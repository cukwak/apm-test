<?php
session_start();

unset($_SESSION['userID']);
unset($_SESSION['userName']);
unset($_SESSION['userPW']);

echo "<script>
        location.replace('index.php');
        </script>";
?>
