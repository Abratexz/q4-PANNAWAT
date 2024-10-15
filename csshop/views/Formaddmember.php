<?php include 'header.php'; ?>

<main>
  <article style="padding: 100px 160px 100px;">
    <h1> Add Member Information</h1>
    <form action="../routes/addmember.php" method="post" enctype="multipart/form-data">
      <div class="mb-3 row">
        <label for="username" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="username" required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control w-25" name="password" required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="name" required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="address" class="col-sm-2 col-form-label">ที่อยู่</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="address" rows="3" required></textarea>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="mobile" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
          <input type="text" class="form-control w-25" name="mobile" required>
        </div>
      </div>
      
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control w-25" name="email" required>
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
            <option value="user">user</option>
            <option value="admin">admin</option>
          </select>
          </div>
      </div>
      <div class="row">
        <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </div>
    </form>
  </article>
  
  <?php include 'footer.php'; ?>

