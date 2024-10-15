<?php
include('connect.php');

if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
    $keyword = $_GET['keyword'];



    $stmt = $pdo->prepare("SELECT name, image FROM member WHERE name LIKE ?");
    $searchTerm = '%' . $keyword . '%';  
    $stmt->bindParam(1, $searchTerm);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        echo "<table border='1'class='table table-bordered text-center'>";
        echo "<tr class='table-dark'><th>Member Name</th><th>Image</th></tr>";

        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td><img src='../img/" .$row['image'] . "' width='200'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<span style='display: block;text-align: center;'>" . "No members found." . "</span>";
    }
} else {
    echo "<span style='display: block;text-align: center;'>" . "No input." . "</span>";
}
?>
