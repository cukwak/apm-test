<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['password']);

echo "<script>
        location.replace('index.php');
        </script>";
?>
