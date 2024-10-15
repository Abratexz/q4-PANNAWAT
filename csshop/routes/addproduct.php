<?php include "../routes/connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$maxFileSize = 2 * 1024 * 1024;
try {
    $stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price, image) VALUES (?, ?, ?, ?)");


    $stmt->bindParam(1, $_POST["pname"]);
    $stmt->bindParam(2, $_POST["pdetail"]);
    $stmt->bindParam(3, $_POST["price"]);
    $stmt->bindParam(4, $_FILES["image"]["name"]);

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
                        header("Location: ../views/mpage.php");
                        exit();
                    } else {
                        echo "Error inserting product data.";
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
