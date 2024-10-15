<?php
include "../routes/connect.php";

session_start();

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Status</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-4">
          <?php
          if (!empty($row)) {
            $_SESSION["level"] = $row["level"];
            $_SESSION["username"] = $row["username"];

            echo '<div class="alert alert-success text-center" role="alert">';
            echo 'Login successful! Welcome, ' . $_SESSION["fullname"] . '.<br>';
            echo '</div>';
            echo '<div class="text-center mt-3">';
            echo '<a href="../views/mpage.php" class="btn btn-primary">Go to Dashboard</a>';
            echo '</div>';
          } else {
            echo '<div class="alert alert-danger text-center" role="alert">';
            echo 'Login failed! Invalid username or password.';
            echo '</div>';
            echo '<div class="text-center mt-3">';
            echo '<a href="../views/login-form.php" class="btn btn-secondary">Try Again</a>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>