<?php include "header.php";
$stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
$stmt->bindParam(1, $_GET["pid"]);
$stmt->execute();
$row = $stmt->fetch();
?>

<main>
  <article style="padding: 100px 160px 100px;">
    <h1>Member Information</h1>
    <div style="display:flex">
      <div>
        <img src='../img/<?= $row["image"] ?>' width='200'>
      </div>
      <div style="padding: 15px">
        <h2>ชื่อ <?= $row["pname"] ?></h2>
        รายละเอียด <?= $row["pdetail"] ?><br>
        ราคา <?= $row["price"] ?><br><br>
      </div>
    </div>
  </article>

  <?php include 'footer.php'; ?>