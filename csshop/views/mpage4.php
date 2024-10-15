<?php include 'header.php';

?>
<main>
  <article style="padding: 100px 160px 100px;">
    <h1>Member Information</h1>
    <div class="text-end">
      <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin'): ?>
      <a class="btn btn-outline-primary fw-bold" href="Formaddmember.php">+ เพิ่มข้อมูล Member</a>
      <?php endif; ?>
    </div>
    <div class="container">
      <?php
      $stmt = $pdo->prepare("SELECT * FROM member");
      $stmt->execute();
      ?>
      <?php while ($row = $stmt->fetch()) : ?>
        <div class="d-flex align-items-center">
          <a href="mpageMemberDetail.php?mid=<?= $row["mid"] ?>"><img src='../img/<?= $row["image"] ?>' width='100'></a>
          <div class="ms-3 flex-grow-1">
            <strong><?= $row["name"] ?></strong><br>
            <?= $row["address"] ?><br>
            <?= $row["email"]?>
          </div>
          <div class="d-flex">
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin'): ?>
              <a class="btn btn-primary" href='Formeditmember.php?mid=<?= $row["mid"] ?>'>แก้ไข</a>
              <a class="btn btn-danger" href='../routes/deletemember.php?mid=<?= $row["mid"] ?>'
                onclick="return confirm('ต้องการจะลบหรือไม่ <?= $row['mid']; ?> ? ')">ลบ</a>
            <?php endif; ?>
          </div>
        </div>
        <hr>
      <?php endwhile; ?>
    </div>
  </article>

  <?php include 'footer.php'; ?>