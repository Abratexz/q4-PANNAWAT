<?php include 'header.php'; ?>

<main>
    <article style="padding: 100px 160px 100px;">
        <h1>Search Members</h1>
        <form method="get">
            <div class="input-group w-50 mx-auto shadow-lg">
                <input type="text" name="keyword" class="form-control rounded-pill-start border-1" placeholder="Enter member name or email">
                <button type="submit" class="btn btn-primary rounded-pill-end">ค้นหา</button>
            </div>
        </form>
        <div class="container mt-4">
            <?php
            if (isset($_GET["keyword"]) && !empty($_GET["keyword"])) {
                $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
                $value = '%' . $_GET["keyword"] . '%';
                $stmt->bindParam(1, $value);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch()) :
            ?>
                        <div class="d-flex align-items-center mb-3">
                            <a href="mpageMemberDetail.php?mid=<?= $row["mid"] ?>">
                                <img src='../img/<?= $row["image"] ?>' width='100'>
                            </a>
                            <div class="ms-3 flex-grow-1">
                                <strong><?= $row["name"] ?></strong><br>
                                <?= $row["address"] ?><br>
                                <?= $row["email"] ?>
                            </div>
                        </div>
                    <div class="d-flex">
                        <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin'): ?>
                        <a class="btn btn-primary" href='Formeditmember.php?mid=<?= $row["mid"] ?>'>แก้ไข</a>
                        <a class="btn btn-danger" href='../routes/deletemember.php?mid=<?= $row["mid"] ?>'
                            onclick="return confirm('ต้องการจะลบหรือไม่ <?= $row['mid']; ?> ? ')">ลบ</a>
                        <?php endif; ?>
                    </div>
            <?php
                    endwhile;
                } else {
                    echo "<p class='text-center'>No members found.</p>";
                }
            }
            ?>
        </div>
    </article>


<?php include 'footer.php'; ?>
