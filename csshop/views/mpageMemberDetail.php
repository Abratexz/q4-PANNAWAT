<?php include "header.php";
$stmt = $pdo->prepare("SELECT * FROM member WHERE mid = ?");
$stmt->bindParam(1, $_GET["mid"]);
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
        <h2>ชื่อ <?=$row["name"]?></h2>
        ที่อยู่ <?=$row["address"]?><br>
        email <?=$row["email"]?><br><br>
      </div>
    </div>
  </article>

  <?php include 'footer.php'; ?>