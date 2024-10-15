<?php
include 'header.php';

?>


<main>
  <article style="padding: 100px 160px 100px;">
    <div class="container mt-5">
        <h2 class="text-center">Users Orders</h2>
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $stmt = $pdo->prepare("SELECT DISTINCT o.username, m.name FROM orders o JOIN member m ON o.username = m.username ORDER BY m.name ASC");
                    $stmt->execute();

                    while ($row = $stmt->fetch()) {
                        echo '<tr>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td><a href="orderdetail.php?username=' . $row['username'] . '" class="btn btn-primary">View Orders</a></td>';
                        echo '</tr>';
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="3">Error: ' . $e->getMessage() . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</article>
<?php include 'footer.php'?>
