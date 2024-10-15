<?php
include('connect.php');
sleep(1);
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $stmt = $pdo->prepare("SELECT username FROM member WHERE username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "denied";  
    } else {
        echo "okay";  
    }
}
?>