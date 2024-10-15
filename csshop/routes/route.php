<?php
include 'connect.php'; // Include database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Product List</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Product List</h2>
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Number of Orders</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Fetch all products and count the number of orders for each product
                    $stmt = $pdo->prepare("
                        SELECT 
                            p.pid, p.pname, p.price, 
                            COUNT(o.ord_id) AS order_count
                        FROM orders o
                        JOIN product p ON o.pid = p.pid
                        GROUP BY p.pid
                    ");
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['pid']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['pname']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['price']) . ' THB</td>';
                        echo '<td><a href="order_details.php?pid=' . urlencode($row['pid']) . '">' . $row['order_count'] . ' Orders</a></td>';
                        echo '</tr>';
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="4">Error: ' . $e->getMessage() . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
