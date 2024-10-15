<?php
include "connect.php";

try {
    $stmt = $pdo->prepare("SELECT image FROM product WHERE pid = ?");
    $stmt->execute([$_POST['pid']]);
    $product = $stmt->fetch();

    $pid = $_POST['pid'];
    $pname = $_POST["pname"];
    $pdetail = $_POST["pdetail"];
    $price = $_POST["price"];

    if (isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
        echo "NO FILES";
        if ($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE) {
            echo "Uploaded file exceeds upload_max_filesize ";
            exit();
        } else if (basename($_FILES["image"]["name"]) !== $product['image']) {
            $target_dir = "../img/";
            $image_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;


            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                if (!empty($product['image']) && file_exists($target_dir . $product['image'])) {
                    unlink($target_dir . $product['image']);
                }
                $stmt = $pdo->prepare("UPDATE product SET pname = ?, pdetail = ?, price = ?, image = ? WHERE pid = ?");
                $stmt->execute([$pname, $pdetail, $price, $image_name, $pid]);
            } else {
                echo "Error: Failed to upload the new image. File upload error code: " . $_FILES['image']['error'];
                exit();
            }
        } else {
            $stmt = $pdo->prepare("UPDATE product SET pname = ?, pdetail = ?, price = ? WHERE pid = ?");
            $stmt->execute([$pname, $pdetail, $price, $pid]);
        }
    } else {
        $stmt = $pdo->prepare("UPDATE product SET pname = ?, pdetail = ?, price = ? WHERE pid = ?");
        $stmt->execute([$pname, $pdetail, $price, $pid]);
    }

    echo "ข้อมูลได้รับการแก้ไขสำเร็จ!";
    header("Location: ../views/mpage.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
