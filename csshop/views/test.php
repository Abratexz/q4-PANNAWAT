<?php include '../routes/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Results</title>

</head>
<body>
    <h2>Query Results</h2>
    
    <h3>Books Available by Group</h3>
<table border='1'>
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Customer name</th>
            <th>Total Spent</th>

            
        </tr>
    </thead>
<tbody>
    <?php
    try {
        $stmt = $pdo->prepare("SELECT u.user_id, u.name, SUM(op.total_price) AS total_spent
FROM Order_prd op
JOIN User u ON op.user_id = u.user_id
WHERE op.status = 'completed' 
AND DATE(op.date_time) >= '2024-09-01' 
AND DATE(op.date_time) < '2024-10-00'
GROUP BY u.user_id
ORDER BY total_spent DESC
LIMIT 3;
");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($results) > 0) {
            foreach ($results as $row) {
                echo "<tr>
                        <td>" . $row['user_id'] . "</td>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['total_spent'] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No income found for this date</td></tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
</tbody>

</table>





</body>
</html>