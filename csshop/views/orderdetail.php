<?php
include 'header.php'; 


$username = $_GET['username'];
?>

<main>
  <article style="padding: 100px 160px 100px;">
    <div class="container mt-5">
        <h2 class="text-center">Order Details for <?= $username; ?></h2>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Product Img</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price per Unit (THB)</th>
                    <th>Total Price (THB)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $stmt = $pdo->prepare("
                    SELECT 
                    o.ord_id, o.ord_date, o.status, p.image,
                    p.pname, o.quantity, p.price, (o.quantity * p.price) AS total_price 
                    FROM orders o
                    JOIN product p ON o.pid = p.pid
                    WHERE o.username = ?
                    ORDER BY o.ord_date DESC
                    ");
                    $stmt->execute([$username]);
                    $grandTotal = 0; 
                    while ($row = $stmt->fetch()) {
                        $grandTotal += $row['total_price'];
                        echo '<tr>';
                        echo '<td>' . $row['ord_id'] . '</td>';
                        echo '<td>' . $row['ord_date'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td><img src="../img/' . $row["image"] . '" width="100"></td>';
                        echo '<td>' . $row['pname'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['price'] . '</td>';
                        echo '<td>' . $row['total_price'] . '</td>';
                        echo '</tr>';
                    }

                    echo '<tr class="font-weight-bold">';
                    echo '<td colspan="6" align="right">Grand Total:</td>';
                    echo '<td>' . $grandTotal . ' THB</td>';
                    echo '</tr>';

                } catch (PDOException $e) {
                    echo '<tr><td colspan="7">Error: ' . $e->getMessage() . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="orderlist.php" class="btn btn-primary">Back to Orders List</a>
    </div>
            </article>
            <?php include 'footer.php'?>