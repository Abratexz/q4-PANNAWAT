<?php
include "connect.php";

try {
    $stmt = $pdo->prepare("SELECT image FROM member WHERE mid = ?");
    $stmt->execute([$_POST['mid']]);
    $member = $stmt->fetch();

    $mid = $_POST['mid'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $sql = "UPDATE member SET username = ?, name = ?, address = ?, mobile = ?, email = ?, level = ?";
    $params = [$username, $name, $address, $mobile, $email, $level];

    if (!empty($_POST['password'])) {
        $sql .= ", password = ?";
        $params[] = $_POST['password'];
    }
    if (isset($_FILES['image']) && $_FILES['image']['error'] != UPLOAD_ERR_NO_FILE) {
        if ($_FILES['image']['error'] == UPLOAD_ERR_INI_SIZE) {
            echo "Uploaded file exceeds upload_max_filesize.";
            exit();
        } else {
            $target_dir = "../img/";
            $image_name = basename($_FILES["image"]["name"]);
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                if (!empty($member['image']) && file_exists($target_dir . $member['image'])) {
                    unlink($target_dir . $member['image']);
                }
                $sql .= ", image = ?";
                $params[] = $image_name;
            } else {
                echo "Error: Failed to upload the new image. File upload error code: " . $_FILES['image']['error'];
                exit();
            }
        }
    }
    $sql .= " WHERE mid = ?";
    $params[] = $mid;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    header("Location: ../views/mpage4.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
