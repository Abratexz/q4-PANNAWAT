<?php
include 'connect.php'; // Include database connection

// Get the product ID from the URL parameter
$pid = $_GET['pid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Order Details</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Order Details for Product ID: <?= htmlspecialchars($pid); ?></h2>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Fetch order details for the specified product ID
                    $stmt = $pdo->prepare("
                        SELECT 
                        o.ord_id, m.name AS customer_name, o.ord_date, o.quantity
                        FROM orders o
                        JOIN member m ON o.username = m.username
                        WHERE o.pid = ?
                        ORDER BY o.ord_date DESC
                    ");
                    $stmt->execute([$pid]);

                    while ($row = $stmt->fetch()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['ord_id']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['customer_name']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['ord_date']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['quantity']) . '</td>';
                        echo '</tr>';
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="4">Error: ' . $e->getMessage() . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="route.php" class="btn btn-secondary">Back to Product List</a>
    </div>
</body>
</html>
