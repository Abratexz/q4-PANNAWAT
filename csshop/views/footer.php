<nav id="menu">
  <h2>Navigation</h2>
  <ul class="menu">
    <li class="dead"><a>Home</a></li>
    <li><a href="mpage.php">All Products</a></li>
    <li><a href="mpage2.php">Table of All Products</a></li>
    <li><a href="mpage3.php">Search Products</a></li>
    <li><a href="mpage4.php">All Member</a></li>
    <li><a href="mpage5.php">Table of All Members</a></li>
    <li><a href="mpage6.php">Search Members</a></li>
    <li><a href="cart.php">Cart</a></li>
    <?php if(isset($_SESSION['level']) && $_SESSION['level'] === 'admin'):?>
    <li><a href="orderlist.php">Order list</a></li>
    <?php endif ?>
    <li><a href="hospitalinfo.php">Hospital</a></li>
    <li><a href="registry.php">Registry</a></li>
    <li><a href="searchajax.php">SearchAjax</a></li>
    <li><a href="../routes/logout.php">Log out</a></li>

  </ul>
</nav>
<aside>
  <h2>Aside</h2>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque.
    <br><br>
  </p>
</aside>
</main>
<footer>
  <a href="#">Sitemap</a>
  <a href="#">Contact</a>
  <a href="#">Privacy</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>