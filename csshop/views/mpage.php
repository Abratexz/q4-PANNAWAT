<?php include 'header.php';
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']=array();
  }
?>
<main>
  <article style="padding: 100px 160px 100px;">
    <h1>Product Information</h1>
    <div>
      <span>
          <?php 
          echo 'Username: ' . $_SESSION['username'] . '<br>';
          echo 'Level: ' . $_SESSION['level']; 
          ?>
      </span>
    </div>
    <div class="text-end">
      <a class="btn btn-outline-primary"href="cart.php?action=">สินค้าในตะกร้า (<?=sizeof($_SESSION['cart'])?>)</a>
      <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin'): ?>
      <a class="btn btn-outline-primary fw-bold" href="Formaddproduct.php">+ เพิ่มข้อมูล Product</a>
      <?php endif; ?>
    </div>
    <div class="container">
      <?php
      $stmt = $pdo->prepare("SELECT * FROM product");
      $stmt->execute();
      ?>
      <?php while ($row = $stmt->fetch()) : ?>
        <div class="d-flex align-items-center mb-3">
          <a href="mpageDetail.php?pid=<?= $row["pid"] ?>"><img src='../img/<?= $row["image"] ?>' width='100'></a>
          <div class="ms-3 flex-grow-1">
            <strong><?= $row["pname"] ?></strong><br>
            <?= $row["pdetail"] ?><br>
          </div>
          <div class="d-flex align-items-center">
            <form class="d-flex align-items-center gap-2" method="post" action="cart.php?action=add&pid=<?=$row["pid"]?>&pname=<?=$row["pname"]?>&price=<?=$row["price"]?>">
            <span class="mx-5"><?= $row["price"] . ".00THB" ?></span>
            <input class="form-control"type="number" name="qty" value="1" min="1" max="9">
            <input class="btn btn-primary" type="submit" value="ซื้อ">	
            </form>
            <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin'): ?>
              <a class="btn btn-primary" href='Formeditproduct.php?pid=<?= $row["pid"] ?>'>แก้ไข</a>
              <a class="btn btn-danger" href='../routes/deleteproduct.php?pid=<?= $row["pid"] ?>'
                onclick="return confirm('ต้องการจะลบหรือไม่ <?= $row['pid']; ?> ? ')">ลบ</a>
            <?php endif; ?>

          </div>
        </div>
        <hr>
      <?php endwhile; ?>
    </div>
  </article>

  <?php include 'footer.php'; ?>