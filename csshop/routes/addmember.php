<?php
include "../routes/connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$maxFileSize = 2 * 1024 * 1024; // Set maximum file size (2MB)

try {
    $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email, image, level) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->bindParam(7, $_FILES["image"]["name"]);
    $stmt->bindParam(8, $_POST["level"]); 

    if (isset($_FILES['image'])) {

        if ($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE) {
            echo "The uploaded file exceeds the upload_max_filesize.";
        } else {
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $check = getimagesize($_FILES["image"]["tmp_name"]);

            if ($check !== false) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    if ($stmt->execute()) {
                        header("Location: ../views/mpage4.php");
                        exit();
                    } else {
                        echo "Error inserting member data.";
                    }
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "File is not an image.";
            }
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
