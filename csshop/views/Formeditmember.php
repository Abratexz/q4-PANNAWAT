<?php include 'header.php'; 
$mid = $_GET['mid'];
$stmt = $pdo->prepare("SELECT * FROM member WHERE mid = ?");
$stmt->execute([$mid]);
$member = $stmt->fetch();
?>

<main>
  <article style="padding: 100px 160px 100px;">
    <h1> Add Member Information</h1>
    <form action="../routes/editmember.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="mid" value="<?= $mid ?>">
      <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="username" value="<?= $member['username'] ?>" required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control w-25" name="password">
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="name" value="<?= $member['name'] ?>" required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">ที่อยู่</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="address" rows="3"required><?= $member['address'] ?></textarea>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="mobile" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="mobile" value="<?= $member['mobile'] ?>"required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control w-25" name="email"value="<?= $member['email'] ?>" required>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
        <div class="col-sm-10">
          <input type="file" class="form-control" name="image" accept="image/*">
        </div>
      </div>
      <div class="mb-3 row">
          <label for="level" class="col-sm-2 col-form-label">Level</label>
          <div class="col-sm-10">
          <select class="form-select" name="level" required>
            <option value="" disabled selected>Choose...</option>
            <option value="user" <?= $member['level'] == 'user' ? 'selected' : '' ?>>user</option>
            <option value="admin"<?= $member['level'] == 'admin' ? 'selected' : '' ?>>admin</option>
          </select>
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

