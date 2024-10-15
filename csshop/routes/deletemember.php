<?php include "connect.php"; ?>
<?php
try {
$mid = $_GET['mid'];
$imageStmt = $pdo->prepare("SELECT image FROM member WHERE mid = ?");
$imageStmt->execute([$mid]);
$imageRow = $imageStmt->fetch();


$stmt = $pdo->prepare("DELETE FROM member WHERE mid = ?");
if ($stmt->execute([$mid])) { 
    if ($imageRow && file_exists("../img/" . $imageRow['image'])) {
        unlink("../img/" . $imageRow['image']);
    }
    header("location: ../views/mpage4.php"); 
}

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>