<?php include 'header.php'; ?>

<main>
    <article style="padding: 100px 160px 100px;">
        <h1> Search Products</h1>
        <form method="get">
            <div class="input-group w-50 mx-auto shadow-lg">
                <input type=" text" name="keyword" class="form-control rounded-pill-start border-1">
                <button type="submit" class="btn btn-primary rounded-pill-end">ค้นหา</button>
            </div>

        </form>
        <div class="container mt-4">
            <?php
            if (isset($_GET["keyword"]) && !empty($_GET["keyword"])) {
                $stmt = $pdo->prepare("SELECT * FROM product WHERE pname LIKE ?");
                $value = '%' . $_GET["keyword"] . '%';
                $stmt->bindParam(1, $value);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch()) :
            ?>
                        <div class="d-flex align-items-center mb-3">
                            <a href="mpageDetail.php?pid=<?= $row["pid"] ?>">
                                <img src='../img/<?= $row["image"] ?>' width='100'>
                            </a>
                            <div class="ms-3 flex-grow-1">
                                <strong><?= $row["pname"] ?></strong><br>
                                <?= $row["pdetail"] ?><br>
                                <?= $row["price"] . ".00 THB" ?>
                            </div>
                            <div class="d-flex">
                                <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin'): ?>
                                <a class="btn btn-primary" href='Formeditproduct.php?pid=<?= $row["pid"] ?>'>แก้ไข</a>
                                <a class="btn btn-danger" href='../routes/deleteproduct.php?pid=<?= $row["pid"] ?>'
                                    onclick="return confirm('ต้องการจะลบหรือไม่ <?= $row['pid']; ?> ? ')">ลบ</a>
                                <?php elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'user'): ?>
                                <a class="btn btn-primary" href='mpage.php'>ไปยังหน้าสินค้า</a>
                                <?php endif; ?>
                            </div>
                        </div>
            <?php
                    endwhile;
                } else {
                    echo "<p class='text-center'>No products found.</p>";
                }
            }
            ?>
        </div>
    </article>



    <?php include 'footer.php'; ?>