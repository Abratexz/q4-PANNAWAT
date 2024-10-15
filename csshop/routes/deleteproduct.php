<?php include "../routes/connect.php";

try {
    $pid = $_GET['pid'];
    $imageStmt = $pdo->prepare("SELECT image FROM product WHERE pid = ?");
    $imageStmt->execute([$pid]);
    $imageRow = $imageStmt->fetch();


    $stmt = $pdo->prepare("DELETE FROM product WHERE pid = ?");
    if ($stmt->execute([$pid])) {
        if ($imageRow && file_exists("../img/" . $imageRow['image'])) {
            unlink("../img/" . $imageRow['image']);
        }
        header("location: ../views/mpage.php");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
