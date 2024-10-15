<?php include 'header.php'; ?>
<?php
$stmt = $pdo->prepare("SELECT * FROM member");
$stmt->execute();
?>
    <main>
    <article style="padding: 100px 160px 100px;">
    <h2>Members List</h2>
    <table class="table table-bordered text-center">
        <tr class="table-dark">
            <th>รหัสลูกค้า</th>
            <th>ชื่อลูกค้า</th>
            <th>Username</th>
            <th>ที่อยู่</th>
            <th>เบอร์โทร</th>
            <th>Email</th>
        </tr>
        <?php
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['mid'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['address'] . " บาท</td>";
            echo "<td>" . $row['mobile'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
      </article>
      
<?php include 'footer.php'; ?>