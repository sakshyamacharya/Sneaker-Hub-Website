<nav class="navbar navbar-expand-lg bg-light mt-5">
  <div class="container-fluid"> 
    <a href="../index.php">
      <img src="http://localhost/sneaker_hub/images/logo.png" style="width: 100px; height: 100px;" alt="Sneaker Hub Logo" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/sneaker_hub/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/sneaker_hub/home/aboutus.php">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/sneaker_hub/home/allproducts.php">All Products</a>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/sneaker_hub/home/cart.php">View Cart</a>
        </li>
    
        <?php if (isset($_SESSION['user_id'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/sneaker_hub/login/logout.php">Logout</a>
      </li>
    <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/sneaker_hub/login/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost/sneaker_hub/login/register.php">Register</a>
      </li>
    <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

