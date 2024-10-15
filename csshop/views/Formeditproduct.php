<?php include 'header.php';
$pid = $_GET['pid'];
$stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
$stmt->execute([$pid]);
$product = $stmt->fetch();
?>

<main>
  <article style="padding: 100px 160px 100px;">
    <h1> Edit Product Information</h1>
    <form action="../routes/editproduct.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="pid" value="<?= $pid ?>">
      <div class="mb-3 row">
        <label for="pname" class="col-sm-2 col-form-label">Product Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="pname" value="<?= $product['pname'] ?>" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="pdetail" class="col-sm-2 col-form-label">Detail</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="pdetail" rows="3" required><?= $product['pdetail'] ?></textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <div class="input-group w-25">
            <input type="text" class="form-control" name="price" value="<?= $product['price'] ?>" required>
            <span class="input-group-text"> THB</span>
          </div>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="image" accept="image/*">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </form>

  </article>
  <?php include 'footer.php'; ?>