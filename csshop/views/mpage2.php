<?php include 'header.php'; ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();
?>
    <main>
    <article style="padding: 100px 160px 100px;">
    <h2>Product List</h2>
    <table class="table table-bordered text-center">
        <tr class="table-dark">
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียด</th>
            <th>ราคา</th>
        </tr>
        <?php
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['pid'] . "</td>";
            echo "<td>" . $row['pname'] . "</td>";
            echo "<td>" . $row['pdetail'] . "</td>";
            echo "<td>" . $row['price'] . " บาท</td>";
            echo "</tr>";
        }
        ?>
    </table>
      </article>
      
<?php include 'footer.php'; ?>